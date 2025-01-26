alerta = document.querySelector(".alerta");

if (alerta) {
    setTimeout(() => {
        alerta.classList.add("quitarAlerta");
    }, 5000);

    setTimeout(() => {
        alerta.remove();
    }, 5500); 
}