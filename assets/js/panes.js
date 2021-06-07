function openPane(i, u) {
  document.getElementById([i]).classList.add('active');
  window.history.pushState("object", "title", [u]);
  console.log("open pane");
  console.log([u]);

}

function closePane(i, u) {
  document.getElementById([i]).classList.remove('active');
  window.history.pushState("object", "title", [u]);
  console.log("close pane");
}
