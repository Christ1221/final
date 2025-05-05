document.getElementById("update").addEventListener("submit", function(event){
    event.preventDefault()

    const formData = new FormData(this)

    fetch("php/update.php", {
        method: 'POST',
        body: formData
    })

    alert("Edit Sucessfully")

    window.location.href = "indexmain.php"


})