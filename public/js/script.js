function show() {
    var x = document.getElementById('pin')
    var y = document.getElementById('cpin')
    if (x.type === "password" && y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
function showp() {
    var x = document.getElementById('pin')
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
