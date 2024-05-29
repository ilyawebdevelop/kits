class Showmore{
  constructor({wrapperItems, wrapperPagination, eventStop}){
      this.wrapperItems = document.getElementById(wrapperItems);
      this.wrapperPagination = document.getElementById(wrapperPagination);
      this.eventStop = eventStop
      if(!this.wrapperItems || !this.wrapperPagination) return false
  }

  init(){
      this.pagination()
  }

  pagination(){
      const ajaxLinks = this.wrapperPagination.querySelectorAll(".ajax-link");
      if(!ajaxLinks) return false
      for(let i = 0; i < ajaxLinks.length; i++){
          const linkItem = ajaxLinks[i];
          linkItem.addEventListener("click", (e) => {
              e.preventDefault()
              e.target.innerHTML = "Загрузка"
              let href = e.target.getAttribute("href")
              this.ajax({href})
          });
      }
  }

  ajax({href}){

      let formData = new FormData();
      formData.append("href", href)
      formData.append("action", "show_more")
      formData.append("is-show-more", this.eventStop)
      //formData.pus

      fetch(href, {
          method: "POST",
          mode: "no-cors",
          cache: "no-cache",
          credentials: "same-origin",
          headers: {
            "Content-Type": "form-data"
          },
          body: formData
      })
      .then( response => response.text() )
      .then( result => {
        let json = {items:'',pagination:''};

        try {
            json = JSON.parse(result);
        } catch(e) {
          let html = document.createElement('div');
          html.insertAdjacentHTML('beforeend',result);

          json = {
            items: html.querySelector('#recommendations-items-wrapper').innerHTML,
            pagination: html.querySelector('#recommendations-pagination-wrapper').innerHTML
          };
        }

        const {items, pagination} = json;

        if(items) this.loadItem({items});
        if(pagination) this.loadPagination({pagination});

        console.log(json);
      } );

      console.log(href);
  }

  loadItem({items}){

      this.wrapperItems.insertAdjacentHTML('beforeend', items);
      this.parseText({html:items})
  }
  loadPagination({pagination}){
      this.wrapperPagination.innerHTML = pagination
      this.parseText({html:pagination})
  }


  parseText({html}) {

      let div = document.createElement("div")
      div.innerHTML = html;

      let scripts = div.querySelectorAll("script")

      if(!scripts) return false

      setTimeout(()=>{
          for(let i = 0; i < scripts.length; i++){
              let s = document.createElement("script")
              s.appendChild(document.createTextNode(scripts[i].innerHTML))
              document.body.appendChild(s)
          }
      }, 10)

  }
}

if (window['fsLightboxInstances'] != null) {
  if (fsLightboxInstances['doctor-video']) {
      fsLightboxInstances['doctor-video'].props.onOpen = () => {
        const video = document.querySelector('.fslightbox-container video');
        if (video) {
          video.currentTime = 0;
          video.play();
        }
      }
  }
}
