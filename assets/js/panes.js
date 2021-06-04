function openPane(i) {
  document.getElementById([i]).classList.add('active');
  console.log("open pane")
}

function closePane(i) {
  document.getElementById([i]).classList.remove('active');
  console.log("close pane")
}
