let list = document.querySelectorAll('.delete')
list.forEach(function (currentValue, number) {
    let deleteModal = document.getElementById(`deleteModal${number}`)
    currentValue.addEventListener('click', function () {
        deleteModal.style.display = "block";
        document.getElementById(`deleteCancel${number}`).addEventListener('click', function () {
            deleteModal.style.display = "none";
        })
    })
})
