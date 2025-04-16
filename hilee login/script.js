function showPage(pageId) {
    document.getElementById('login-page').style.display = 'none';
    document.getElementById('Sign-Up-page').style.display = 'none';
    document.getElementById('reset-password-page').style.display = 'none';
    document.getElementById(pageId).style.display = 'block';
}

function togglePassword(inputId, iconElement) {
    var passwordField = document.getElementById(inputId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        iconElement.classList.remove("fa-lock");
        iconElement.classList.add("fa-lock-open");
    } else {
        passwordField.type = "password";
        iconElement.classList.remove("fa-lock-open");
        iconElement.classList.add("fa-lock");
    }
}

function validateLogin() {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    var errorMsg = document.getElementById("login-error");
    var form = document.getElementById("sform");

    if (username === "" || password === "") {
        errorMsg.style.display = "block";
    } else {
        errorMsg.style.display = "none";
        form.onsubmit();

    }
}

function validateSignup() {
    var name = document.getElementById('signup-name').value.trim();
    var email = document.getElementById('signup-email').value.trim();
    var password = document.getElementById("create-password").value.trim();
    var errorMsg = document.getElementById("signup-error");

    if (name === "" || email === "" || password === "") {
        errorMsg.style.display = "block";
        return false; // prevent form submission
    } else {
        errorMsg.style.display = "none";
        alert("Signing up..."); // Placeholder for actual sign up logic
        return true;
    }
}

function validateResetPassword() {
    var oldPassword = document.getElementById("reset-password").value.trim();
    var email = document.getElementById("reset-email").value.trim();
    var errorMsg = document.getElementById("reset-password-error");

    if (oldPassword === "" || email === "") {
        errorMsg.style.display = "block";
        return false; // prevent form submission
    } else {
        errorMsg.style.display = "none";
        alert("Resetting password..."); // Placeholder for actual reset password logic
        return true;
    }
}

function register() {
    window.location.href = "rege.php";
}