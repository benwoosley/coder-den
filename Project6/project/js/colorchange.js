function changeColor() {
  var userColor = document.getElementById("colorInput").value;
  localStorage.setItem(
    "storedValue",
    (document.body.style.backgroundColor = userColor)
  );
  document.documentElement.style.setProperty(
    "--accent",
    localStorage.storedValue
  );
}

if (localStorage.storedValue) {
  document.documentElement.style.setProperty(
    "--accent",
    localStorage.storedValue
  );
  if (document.getElementById("colorInput")) {
    document.getElementById("colorInput").value = localStorage.storedValue;
  }
}
