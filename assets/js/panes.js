function openPane(i, u) {
  var pane = document.getElementById([i]);
  pane.classList.add('active');
  pane.ariaHidden = false;
  window.history.pushState("object", "title", [u]);
  // console.log("open pane");
  // console.log([u]);
}

function closePane(i, u) {
  var pane = document.getElementById([i]);
  pane.classList.remove('active');
  pane.ariaHidden = true;
  window.history.pushState("object", "title", [u]);
  // console.log("close pane");
}

function ESCclose(evt) {
  var panes = document.querySelectorAll('.content-pane, #about-pane');
  if (evt.keyCode == 27) {
    for (var i = 0; i < panes.length; i++) {
      panes[i].classList.remove('active');
    }
    // console.log("close pane");
  }
}
