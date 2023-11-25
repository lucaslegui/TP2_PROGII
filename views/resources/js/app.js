    // // Función para cargar vistas dinámicamente
    // function loadView(viewName) {
    //     fetch('./views/' + viewName + '.php')
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         return response.text();
    //     })
    //     .then(data => {
    //         document.getElementById('contenidoDinamico').innerHTML = data;
    //     })
    //     .catch(error => {
    //         console.error("Error cargando " + viewName + ":", error);
    //     });
    // }

    // // Agrega un listener a cada botón
    // document.querySelectorAll('[data-load]').forEach(button => {
    //     button.addEventListener('click', function() {
    //         const viewName = button.getAttribute('data-load');
    //         loadView(viewName);
    //     });
    // });

    // //prevenir la no carga

    // document.body.addEventListener('click', function(e) {
    //     const target = e.target;
    
    //     // Verifica si el elemento clickeado (o alguno de sus ancestros) tiene el atributo data-load
    //     let loadButton = target.closest('[data-load]');
    //     if (loadButton) {
    //         const viewName = loadButton.getAttribute('data-load');
    //         loadView(viewName);
    //     }
    // });
    