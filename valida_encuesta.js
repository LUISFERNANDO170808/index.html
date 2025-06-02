document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("fvalida");

  form.addEventListener("submit", (e) => {
    const nombre = form.nombre.value.trim();
    const telefono = form.telefono.value.trim();
    const sabor = parseInt(form.calificacion_sabor.value, 10);
    const variedad = form.opinion_variedad.value;
    const producto = form.producto_favorito.value.trim();

    if (
      nombre === "" || 
      telefono === "" || 
      isNaN(sabor) || sabor < 1 || sabor > 10 ||
      variedad === "" || 
      producto === ""
    ) {
      alert("Por favor, completa todos los campos correctamente.");
      e.preventDefault(); // Detiene el envío
      return;
    }

    alert("Gracias por completar la encuesta.");
  });
});
