document.addEventListener('DOMContentLoaded', function() {

    document.addEventListener('contextmenu', function(event) {
      event.preventDefault();
    });

    
    document.onkeydown = function(e) {
      if ((e.ctrlKey && e.shiftKey && e.keyCode === 73) || // Ctrl+Shift+I
          (e.ctrlKey && e.shiftKey && e.keyCode === 67) || // Ctrl+Shift+C
          (e.ctrlKey && e.shiftKey && e.keyCode === 74) || // Ctrl+Shift+J
          (e.ctrlKey && e.shiftKey && e.keyCode === 75) || // Ctrl+Shift+K
          (e.ctrlKey && e.shiftKey && e.keyCode === 76) || // Ctrl+Shift+L
          (e.ctrlKey && e.shiftKey && e.keyCode === 83)) { // Ctrl+Shift+S
        return false;
      }
    };

    const elements = document.querySelectorAll('img, button, a, iframe, video, div, span, input, select, textarea, label'); // Agrega otros elementos si es necesario
    elements.forEach(function(element) {
      element.addEventListener('contextmenu', function(event) {
        event.preventDefault();
      });
    });





  });