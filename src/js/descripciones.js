addEventListener("DOMContentLoaded", function () {
    const imagen = document.querySelectorAll("#imagen");

    imagen.forEach((img) => {
        img.addEventListener("click", function () {
            const desc = this.querySelector("#desc-img");
            if (desc.classList.contains("display-none")) {

                desc.classList.remove("display-none");
                desc.classList.remove("display-none-hidden");
                desc.classList.add("show-display");
            } else {

                desc.classList.add("display-none-hidden");
                
                desc.classList.remove("show-display");

                setTimeout(() => {
                    desc.classList.add("display-none");
                }, 300);
            }
            
        });
    });

});