var nav = document.getElementById("feed");

// Open a content pane
function openPane(i, u) {
  var pane = document.getElementById([i]);
  pane.classList.add('active');
  pane.ariaHidden = false;
  window.history.pushState("object", "title", [u]);
  nav.ariaHidden = true;
  // console.log("open pane");
  // console.log([u]);
}

// Close a content pane
function closePane(i, u) {
  var pane = document.getElementById([i]);
  pane.classList.remove('active');
  pane.ariaHidden = true;
  window.history.pushState("object", "title", [u]);
  nav.ariaHidden = false;
  // console.log("close pane");
}

// Close a content pane with the ESC hotkey
function ESCclose(evt) {
  var panes = document.querySelectorAll('.content-pane, #about-pane');
  if (evt.keyCode == 27) {
    for (var i = 0; i < panes.length; i++) {
      panes[i].classList.remove('active');
    }
    nav.ariaHidden = false;
    // console.log("close pane");
  }
}

// Check for a url on load and open the corresponding content pane
function ext() {
  var url = window.location.pathname;
  var panes = document.querySelectorAll('.content-pane');
  for (var i = 0; i < panes.length; i++) {
    var slug = panes[i].dataset.slug;
    if (url == '/' + slug) {
      openPane(slug, url);
    }
  }

}
window.onLoad = ext();
