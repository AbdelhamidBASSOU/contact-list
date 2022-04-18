let cssStyleSheet = document.getElementById("mainStyle");
function onThemeChange() {
  let path = cssStyleSheet.href.substring(
    cssStyleSheet.href.length - 9,
    cssStyleSheet.href.length
  );
  if (path === "style.css") {
    localStorage.setItem("mode", "dark")
    cssStyleSheet.href = "assets/css/style_dark.css";
    document.getElementById("theme_icon").className = "fas fa-sun";
  } else {
    localStorage.removeItem("mode")
    cssStyleSheet.href = "assets/css/style.css";
    document.getElementById("theme_icon").className = "fas fa-moon";
  }
}

document.addEventListener("DOMContentLoaded", function() {
  let mode = localStorage.getItem('mode')

  if(mode == 'dark') {
    cssStyleSheet.href = "assets/css/style_dark.css";
    document.getElementById("theme_icon").className = "fas fa-sun";
  } else {
    cssStyleSheet.href = "assets/css/style.css";
    document.getElementById("theme_icon").className = "fas fa-moon";
  }
})