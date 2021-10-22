let alert = document.getElementById('alert')
document.getElementById('alertButton').addEventListener('click', function () {
    alert.style.display = "none";
})
setTimeout(function () {
    alert.style.display = "none";
}, 5000);
