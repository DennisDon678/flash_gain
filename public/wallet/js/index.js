document.querySelectorAll(".copy-link").forEach((copyLinkParent) => {
    const inputField = copyLinkParent.querySelector(".copy-link-input");
    const copyButton = copyLinkParent.querySelector(".copy-link-button");
    const text = inputField.value;

    inputField.addEventListener("focus", () => inputField.select());

    copyButton.addEventListener("click", () => {
        inputField.select();
        navigator.clipboard.writeText(text);

        inputField.value = "Copied!";
        setTimeout(() => (inputField.value = text), 2000);
    });
});

let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

eyeicon.onclick = function () {
    if (password.type == "password") {
        password.type = "text";
        eyeicon.src = "image/eye-open.png";
    } else {
        password.type = "password";
        eyeicon.src = "image/eye-close.png";
    }
};
