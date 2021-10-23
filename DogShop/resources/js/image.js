let previewImage = document.getElementById('previewImage');
let addImage = document.getElementById('addImage');
let inputText = document.getElementById('inputText');
let image = document.getElementById('image');

previewImage.style.display = "none";

function preview(event) {
    let reader = new FileReader();

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
})
