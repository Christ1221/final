

document.getElementById("delete").addEventListener("submit", function(event){
    event.preventDefault()

    const formData = new FormData(this)

    fetch("php/delete.php", {
        method: 'POST',
        body: formData
    })

    alert("Deleted Successfully")

    window.location.reload()

})
