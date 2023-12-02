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

//carrito con ajax, no funciona la sessionnn!@!!!

// document.addEventListener("DOMContentLoaded", function() {
//     var botonesAgregar = document.getElementsByClassName('agregar-carrito');
//     for (var i = 0; i < botonesAgregar.length; i++) {
//         botonesAgregar[i].addEventListener('click', function() {
//             var idProducto = this.getAttribute('data-id');
//             var cantidad = document.getElementById('cantidad-' + idProducto).value;
//             agregarAlCarritoAjax(idProducto, cantidad);
//         });
//     }
// });

// function agregarAlCarritoAjax(idProducto, cantidad) {
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'Class/Carrito.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//         }
//     };
//     xhr.send('id=' + idProducto + '&cantidad=' + cantidad);
//     xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var response = JSON.parse(this.responseText);
//             if (response.success) {
//                 alert(response.message);
                
//             }
//         }
//     };
    
// }

