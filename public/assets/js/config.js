function successNotification(msg) {
    Toastify({
        text: msg,
        duration: 2000,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #FFDB63)",
        }
    }).showToast();
}
function errorNotification(msg) {
    Toastify({
        text: msg,
        duration: 2000,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#BD483B",
        }
    }).showToast();
}

function requiredNotification(msg) {
    Toastify({
        text: msg,
        duration: 2000,
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#BD483B",
        }
    }).showToast();
}

function dataTable(id) {
    new DataTable('#'+id);
}

function loaderShow()
{
    let bodyContent = document.getElementById('body-content');
    let loader = document.querySelector('.loader-area');
    bodyContent.classList.add("d-none");
    loader.classList.remove("d-none");
}
function loaderHide()
{
    let bodyContent = document.getElementById('body-content');
    let loader = document.querySelector('.loader-area');
    bodyContent.classList.remove("d-none");
    loader.classList.add("d-none");
}