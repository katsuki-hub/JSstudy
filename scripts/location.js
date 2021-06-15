var lang = document.querySelector("html").lang;

var opt;
if (lang === "ja") {
  opt = document.querySelector('option[value="location.html"]');
} else if (lang === "en") {
  opt = document.querySelector('option[value="location-en.html"]');
} else if (lang === "zh") {
  opt = document.querySelector('option[value="location-zh.html"]');
}
opt.selected = true;

document.getElementById("form").select.onchange = function () {
  location.href = document.getElementById("form").select.value;
}