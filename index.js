document.getElementById('form_switch').addEventListener('change', function() {
    var formType = document.querySelector('input[name="form_type"]:checked').value;
    if (formType === "login") {
        document.getElementById('login_form').style.display = "block";
        document.getElementById('signup_form').style.display = "none";
    } else {
        document.getElementById('login_form').style.display = "none";
        document.getElementById('signup_form').style.display = "block";
    }
});
