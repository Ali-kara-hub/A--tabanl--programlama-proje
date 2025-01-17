document.getElementById("loginform").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const message = document.getElementById("mesaj");

    const user = JSON.parse(localStorage.getItem("user"));

    if (user && user.email === email && user.password === password) {
        message.style.color = "green";
        message.textContent = "Giriş başarılı!";
    } else {
        message.style.color = "red";
        message.textContent = "E-posta veya şifre hatalı!";
    }
});
