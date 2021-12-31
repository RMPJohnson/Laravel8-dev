$(document).ready(function () {
    let timezone = moment.tz.guess();
    setCookie('timezone', timezone, 1);
});

function setCookie(cookie_name, value, exp_days) {
    let d = new Date();
    d.setTime(d.getTime() + (exp_days * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cookie_name + "=" + value + ";" + expires + ";path=/";
}
