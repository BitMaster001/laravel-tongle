function NotifyUser(type, message) {
    let backgroundColor = "linear-gradient(to right, #00b09b, #96c93d)";
    switch (type) {
        case "danger":
            backgroundColor = "linear-gradient(to right, #FF6200, #FD7F2C)";
            break;
        case "error":
            backgroundColor = "linear-gradient(to right, #DC1C13, #EA4C46)";
            break;
    }
    Toastify({
        text: message,
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: backgroundColor,
    }).showToast();
}

function ShowSuccess(message) {
    NotifyUser("success", message);
}

function ShowDanger(message) {
    NotifyUser("danger", message);
}

function ShowError(message) {
    NotifyUser("error", message);
}
