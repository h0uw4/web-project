const form = document.getElementById("loginForm");
const errorMessage = document.getElementById("errorMessage");

form.addEventListener("submit", async function (event) {
    event.preventDefault();
    errorMessage.textContent = "";
    
    const formData = new FormData(form);

    try {
        const response = await fetch("../php/login.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            window.location.href = "../pages/dashboard.html"
        } else {
            errorMessage.textContent = result.message;
        }
    } catch (error) {
        errorMessage.textContent = "Something went wrong. Please try again later."
    }
});