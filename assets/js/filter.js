var checkBoxes = document.querySelectorAll("#filters label input");

function showHide(tag) {
  var works = document.querySelectorAll(".work");
  var checkbox = event.target;
  for (var i = 0; i < works.length; i++) {
    if (works[i].dataset.type == tag) {
      if (checkbox.checked == true) {
        works[i].classList.remove("hide");
        console.log('show');
      } else {
        works[i].classList.add("hide");
        console.log('hide');
      }
    }
  }
}
