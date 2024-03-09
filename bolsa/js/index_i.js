// JavaScript para abrir y cerrar la ventana emergente
const openPopup = document.getElementById("openPopup");
const popup = document.getElementById("popup");
let popupOpen = false;

openPopup.addEventListener("click", () => {
    if (!popupOpen) {
        popup.style.display = "block";
        popupOpen = true;
    } else {
        popup.style.display = "none";
        popupOpen = false;
    }
});

// Cierra la ventana emergente haciendo clic fuera de ella
window.addEventListener("click", (event) => {
    if (event.target === popup) {
        popup.style.display = "none";
        popupOpen = false;
    }
});
