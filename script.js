document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll("nav a");

    links.forEach(link => {
        link.addEventListener("mouseover", () => {
            document.body.style.backgroundColor = "#f0f8ff"; // Change la couleur d'arrière-plan au survol
        });
        
        link.addEventListener("mouseout", () => {
            document.body.style.backgroundColor = ""; // Restaure la couleur d'origine
        });
    });
});
