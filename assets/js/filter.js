var checkBoxes = document.querySelectorAll("#filters label input");

function showHide(tag) {
  var works = document.querySelectorAll(".work");
  var checkbox = event.target;
  for (var i = 0; i < works.length; i++) {
    if (works[i].dataset.type == tag) {
      if (checkbox.checked == true) {
        works[i].classList.remove("hide");
        works[i].ariaHidden = false;
        // console.log('show');
      } else {
        works[i].classList.add("hide");
        works[i].ariaHidden = true;
        // console.log('hide');
      }
    }
  }
}

// Log tab index to console

// document.addEventListener('keyup', function() {console.log(document.activeElement)})
