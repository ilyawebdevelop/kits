let Pacient = {
  add: function(group) {
    let firstGroup = document.querySelector('.nalogi__form .pacient');
    let newGroup = firstGroup.cloneNode(true);

    Pacient.clear(newGroup);

    group.insertAdjacentElement('afterend', newGroup);

    Pacient.change();
  },
  delete: function(group) {
    group.remove();
    Pacient.change();
  },
  change: function(group, number) {
    let groups = document.querySelectorAll('.nalogi__form .pacient');
    
    if (!group) {
      [].forEach.call(groups, (group, _number) => {
        Pacient.change(group, (_number + 1));
      });

      return;
    }

    if (groups.length > 1) {
      group.classList.add('pacient--item');
    } else {
      group.classList.remove('pacient--item');
    }

    if (!number)
      number = 1;

    let numberNode = group.querySelector('.pacient_num');
    numberNode.innerHTML = 'Пациент ' + number;

    let fields = group.querySelectorAll('input[name^="fields[pacient_"]');
    [].forEach.call(fields, field => {
      field.name = field.name.replace(/[\d]+/, '');
      field.name = field.name.replace('__', '_');
      field.name = field.name.replace('pacient_', 'pacient_' + number + '_');

      if (field.name == 'fields[pacient_' + number + '_number][value]') {
        field.value = number;
      }
    });
  },
  clear: function(group) {
    let fields = group.querySelectorAll('input[data-input^="pacient_"]');
    [].forEach.call(fields, field => {
      if (field.value) {
        field.value = '';
        field.setAttribute('value', '');
      }
    });
  }
};

document.addEventListener('click', function () {
  let target = window.event.target;

  let addBtn = target.closest('.nalogi__button--add');
  let deleteBtn = target.closest('.nalogi__button--delete');

  if (!addBtn && !deleteBtn) return;

  let group = target.closest('.pacient');
  if (!group) return;

  if (addBtn)
    Pacient.add(group);

  if (deleteBtn)
    Pacient.delete(group);
});