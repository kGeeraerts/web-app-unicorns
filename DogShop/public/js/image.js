/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/image.js ***!
  \*******************************/
var previewImage = document.getElementById('previewImage');
var addImage = document.getElementById('addImage');
var inputText = document.getElementById('inputText');
var image = document.getElementById('image');
previewImage.style.display = "none";

function preview(event) {
  var reader = new FileReader();

  reader.onload = function (e) {
    previewImage.setAttribute('src', e.target.result);
    addImage.style.display = "none";
    inputText.style.display = "none";
    previewImage.style.display = "block";
  };

  reader.readAsDataURL(event.target.files[0]);
}

image.addEventListener('change', function (e) {
  preview(e);
});
/******/ })()
;