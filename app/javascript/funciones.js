document.addEventListener('click', function (e) {
  if (e.target.hasAttribute('data-close')) {
    const closeQuery = e.target.getAttribute('data-close');
    $(closeQuery).removeClass('--active');
  }
  if (e.target.hasAttribute('data-add-as-parent')) {
    e.preventDefault;
    e.target.classList.add('--loading');
    father_id = e.target.getAttribute('data-add-as-parent');
    child_id = $('#father-search__current-id').val();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let content = this.responseText;
        if (content) {
          e.target.classList.remove('--loading');
        }
        if (content == 'done') {
          e.target.classList.add('--done');
        } else {
          e.target.classList.remove('--error');
          console.log(content);
        }
      };
    }
    xhttp.open("GET", `relatioships_handler.php?child-id=${child_id}&father-id=${father_id}&action=add`, true);
    xhttp.send();
  }

  if (e.target.hasAttribute('data-add-as-child')) {
    e.preventDefault;
    e.target.classList.add('--loading');
    child_id = e.target.getAttribute('data-add-as-child');
    father_id = $('#father-search__current-id').val();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let content = this.responseText;
        if (content) {
          e.target.classList.remove('--loading');
        }
        if (content == 'done') {
          e.target.classList.add('--done');
        } else {
          e.target.classList.remove('--error');
          console.log(content);
        }
      };
    }
    xhttp.open("GET", `relatioships_handler.php?child-id=${child_id}&father-id=${father_id}&action=add`, true);
    xhttp.send();
  }

  if (e.target.hasAttribute('data-remove-as-parent')) {
    e.preventDefault;
    e.stopPropagation;
    e.target.classList.add('--loading');
    const args = e.target.getAttribute('data-remove-as-parent').split(',');
    father_id = args[0];
    child_id = args[1];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let content = this.responseText;
        if (content) {
          e.target.classList.remove('--loading');
        }
        if (content == 'done') {
          location.reload();
        } else {
          e.target.classList.remove('--error');
          console.log(content);
        }
      };
    }
    xhttp.open("GET", `relatioships_handler.php?child-id=${child_id}&father-id=${father_id}&action=remove`, true);
    xhttp.send();
  }
});

$(document).on('focus', "[data-update-id]", function (a) {
  self = a.target;
  id = self.getAttribute('data-update-id');
  $(`[data-update-id='${id}']`).addClass('--focused');
  console.log('yea');
}).on('blur', "[data-update-id]", function (e) {
  self = e.target;
  self.classList.add('--loading');
  id = self.getAttribute('data-update-id');
  value = self.innerHTML;
  update_idea(id, value, self);
  $(`[data-update-id='${id}']`).removeClass('--focused');
  $(`[data-update-id='${id}']`).html(value);
});


let shiftKey = false;
$(document).on('keydown', "[data-update-id]", function (e) {

  if (e.keyCode == 13 || e.keyCode == 16 || e.keyCode == 9) {
    e.preventDefault();
    e.stopPropagation();
  }
  if (e.keyCode == 16) {
    shiftKey = true;
  }


  // FLESHITAS
  if (e.keyCode == 38 & !shiftKey) {
    var index = $(e.target).index('[data-update-id]');
    placeCaretAtEnd(document.querySelectorAll('[data-update-id]')[index - 1]);
  }
  if (e.keyCode == 40 & !shiftKey) {
    var index = $(e.target).index('[data-update-id]');
    placeCaretAtEnd(document.querySelectorAll('[data-update-id]')[index + 1]);
  }

  // DELETE IDEA
  if (e.keyCode == 8) {
    let html = e.target.innerHTML;
    if (html == '') {
      let id = e.target.getAttribute('data-update-id');
      deleteIdea(id);
    }
  }

  // NEW BROTHER
  if (e.keyCode == 13 && !shiftKey) {
    const id = e.target.getAttribute('data-father-id');
    load_idea(id, 'brother');
    return false;
  }
  // NEW SON
  if (e.keyCode == 13 && shiftKey) {
    const id = e.target.getAttribute('data-update-id');
    load_idea(id, 'child');
    return false;
  }

  // NEW FATHER
  if (e.key == '^') {
    showFatherSearch(e.target.getAttribute('data-update-id'));
    return false;
  }

  // GO GO TO IDEA PAGE
  if (e.keyCode == 9 && !shiftKey) {
    ideaNode = e.target.nextElementSibling.click();
    return false;
  }

});

$(document).on('keyup', "[data-update-id]", function (e) {
  if (e.keyCode == 16) {
    shiftKey = false;
  }
  self = e.target;
  self.classList.add('--loading');
  id = self.getAttribute('data-update-id');
  value = self.innerHTML;
  update_idea(id, value, self);
});

$(document).on('keyup', "#father-search", function (e) {
  var xhttp = new XMLHttpRequest();
  const value = $('#father-search').val();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let content = this.responseText;
      $('#father-search__results').html(content);
    };
  }
  xhttp.open("GET", `father-search.php?id=${id}&search=${value}`, true);
  xhttp.send();
});

function showFatherSearch(id) {
  $('.father-search').addClass('--active');
  $('#father-search').focus();
  $('#father-search__current-id').val(id);
  return false;
}

function deleteIdea(id) {
  var xhttp = new XMLHttpRequest();
  var content = '';
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      content = this.responseText;
      if (content == 'done') {
        element = document.querySelector(`[data-update-id="${id}"]`);
        ideaNode = document.querySelector(`[data-idea="${id}"]`);
        var index = $(element).index('[data-update-id]');
        placeCaretAtEnd(document.querySelectorAll('[data-update-id]')[index - 1]);

        ideaNode.remove();
      } else {
        console.log(content);
      }
    }
  };
  xhttp.open("GET", `update_idea.php?id=${id}&delete=true`, true);
  xhttp.send();
  return content;
}

function update_idea(id, value, target) {
  var xhttp = new XMLHttpRequest();
  var content = '';
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      content = this.responseText;
      target.classList.remove('--loading');
      target.classList.remove('--error');
      if (content == 'error') {
        target.classList.add('--error');
      }
    }
  };
  xhttp.open("GET", `update_idea.php?id=${id}&value=${value}`, true);
  xhttp.send();
  return content;
}

function load_idea(father, type) {
  var xhttp = new XMLHttpRequest();
  let url = `idea.php?`;
  url = `${url}father=${father}`;
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let content = this.responseText;
      target = document.querySelector(`[data-idea="${father}"] > .idea__children`);
      target.insertAdjacentHTML('beforeend', content);
      newId = content.split('data-update-id="')[1].split('"')[0];
      focusChild = document.querySelector(`[data-update-id='${newId}']`);
      placeCaretAtEnd(focusChild);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function placeCaretAtEnd(el) {
  el.focus();
  if (typeof window.getSelection() != "undefined" &&
    typeof document.createRange() != "undefined") {
    var range = document.createRange();
    range.selectNodeContents(el);
    range.collapse(false);
    var sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange(range);
  } else if (typeof document.body.createTextRange != "undefined") {
    var textRange = document.body.createTextRange();
    textRange.moveToElementText(el);
    textRange.collapse(false);
    textRange.select();
  }
}