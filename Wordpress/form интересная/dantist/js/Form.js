class Form{
    constructor({formID, classErrorInput, reCAPTCHA_site_key}){
          this.formID = formID
          this.form = document.getElementById(formID);
          this.classErrorInput = classErrorInput || "form-input--input-error"
          this.reCAPTCHA_site_key = reCAPTCHA_site_key
    }

    formData(){
          return new FormData(this.form);
    }

    init(){
          if(!this.form) return false

          this.form.addEventListener("submit", (e)=>{
                e.preventDefault();
                grecaptcha.ready(() => {
                  grecaptcha.execute(this.reCAPTCHA_site_key, {action: 'submit'}).then((token) => {
                        this.send(token)
                  })
                })
          });
    }
    
    send(reCAPTCHA_token){
          this.clearErrors();
          const formData = this.formData()
          formData.append('recaptcha_token', reCAPTCHA_token)
          fetch("/wp-admin/admin-ajax.php", {
                method: "POST",
                mode: "no-cors",
                cache: "no-cache",
                credentials: "same-origin",
                headers: {
                  "Content-Type": "form-data"
                },
                body: formData
          })
          .then( response => response.json() )
          .then( json => {
                const {error, errors, success, recaptcha } = json;
                if (recaptcha) {
                  if (!recaptcha.success || recaptcha.score < 0.5) {
                        alert('reCAPTCHA v3 проверка не пройдена')
                        return
                  }
                }
                if(error) this.setErrors({errors})
                if(success) this.setSuccess()
          } );
    }

    clearErrors(){
          let errorsInputNode =  this.form.querySelectorAll(`.${this.classErrorInput}`);
          if(!errorsInputNode) return false
          for(let i = 0; i < errorsInputNode.length; i++){
                errorsInputNode[i].classList.remove(this.classErrorInput);
          }
    }

    setErrors({errors}){
         
          for(const errorKey in errors){
                const error = errors[errorKey]
                const errorInputNode = this.form.querySelector(`[data-input="${errorKey}"]`)
                if(errorInputNode) errorInputNode.classList.add(this.classErrorInput);

          }
    }

    setSuccess(){
          dataLayer.push({'event': 'sendforms'});
		  this.sendToComagic();
          this.form.reset();
          TomloprodModal.closeModal();
          TomloprodModal.openModal("success-modal");
    }
	
      sendToComagic () {
	if (!window.Comagic) {
        return;
      }
    const cFormData = this.formData();
    const fieldMap = {
        name: [
          "fields[name][value]",
        ],
        phone: [
          "fields[phone][value]",
        ],
        email: [
          "fields[email][value]"
        ],
        message: [
          "fields[clinic][value]",
          "fields[wish][value]",
          "fields[topic][value]",
          "fields[feedback][value]",
        ],
      };
    let cData = {message:''}
    for (let [name, value] of cFormData) {
        for (const key in fieldMap) {
          if (
            Object.hasOwnProperty.call(fieldMap, key) &&
            fieldMap[key].includes(name)
          ) {
            key == 'message' ? cData[key] += value + '; ' : cData[key] = value;
          }
        }
      }
      //console.log(cData);
      window.Comagic?.addOfflineRequest(cData);
    };
}
