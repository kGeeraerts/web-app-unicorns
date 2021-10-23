/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/delete.js ***!
  \********************************/
var list = document.querySelectorAll('.delete');
list.forEach(function (currentValue, number) {
  var deleteModal = document.getElementById("deleteModal".concat(number));
  currentValue.addEventListener('click', function () {
    deleteModal.style.display = "block";
    document.getElementById("deleteCancel".concat(number)).addEventListener('click', function () {
      deleteModal.style.display = "none";
    });
  });
});
/******/ })()
;