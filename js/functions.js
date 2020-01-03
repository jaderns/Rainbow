function my_display() {
  var x = document.getElementById("form_comment");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}