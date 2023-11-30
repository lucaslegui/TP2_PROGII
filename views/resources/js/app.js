//mostrar los links activos segun la pagina cargada

document.addEventListener('DOMContentLoaded', (event) => {
    
    const urlParams = new URLSearchParams(window.location.search);
    const currentPage = urlParams.get('page') || 'home';

    document.querySelectorAll('.nav-link').forEach(link => {
       
        if (link.dataset.load === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});



//carrito NO ANDA


document.addEventListener('DOMContentLoaded', () => {
   
    document.querySelectorAll('.btn.btn-primary').forEach(button => {
        button.addEventListener('click', function() {
            let idProducto = this.getAttribute('data-id');
            let cantidad = document.getElementById('cantidad-' + idProducto).value;
            agregarAlCarrito(idProducto, cantidad);
        });
    });
});


function agregarAlCarrito(idProducto, cantidad) {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'Class/Carrito.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status === 200) {
            
            actualizarCarritoModal(this.responseText);
        }
    };

   
    xhr.send('id=' + idProducto + '&cantidad=' + cantidad);
}

//actualizar el contenido del modal del carrito
function actualizarCarritoModal(response) {
    
    var modalBody = document.querySelector('#carritoModal .modal-body');
    if (modalBody) {
        modalBody.innerHTML = response;
    }
}