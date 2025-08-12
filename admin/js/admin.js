// Cargar el archivo de configuración JSON
fetch('admin/js/config.json')
  .then(response => response.json())
  .then(data => {
    const adminCode = data.adminCode;
    let index = 0;

    // Escuchar eventos de teclado
    document.addEventListener('keydown', function(event) {
      // Verificar si la tecla presionada coincide con la siguiente tecla del código admin
      if (event.code === adminCode[index]) {
        index++;
        // Verificar si se ha ingresado todo el código admin
        if (index === adminCode.length) {
          // Código admin ingresado correctamente
          console.log('admin Code entered!');
          // Redirigir a la página secreta
          window.location.href = 'secretadmin.php';
          index = 0; // Reiniciar el índice para permitir que se ingrese el código nuevamente
        }
      } else {
        // Reiniciar el índice si se presiona una tecla incorrecta
        index = 0;
      }
    });
  })
  .catch(error => {
    console.error('Error loading config.json:', error);
  });
