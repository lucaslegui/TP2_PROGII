<header>
    <div class="logo">
        <img src="views/resources/img/logo_fondo.png" class="rounded mx-auto d-block img-fluid" alt="logotipo vanyla cakes">
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand btn" data-load="home">Vanyla</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php?page=home" class="nav-link btn <?php echo $view === 'home' ? 'active' : ''; ?>" data-load="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=productos" class="nav-link btn <?php echo $view === 'productos' ? 'active' : ''; ?>" data-load="productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=about" class="nav-link btn <?php echo $view === 'about' ? 'active' : ''; ?>" data-load="about">Nuestra Cocina</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=contacto" class="nav-link btn <?php echo $view === 'contacto' ? 'active' : ''; ?>" data-load="contacto">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="p-2">
                <div class="d-flex justify-content-center small">
                    <div class="p-2">
                        <a href="#" class="text-white">
                            Ingresar
                        </a>
                    </div>
                    <div class="p-2">
                        |
                    </div>
                    <div class="p-2">
                        <a href="#" class="text-white">
                            Crear cuenta
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- carrito de compras -->
        <!-- Icono del carrito de compras -->
        <div class="mx-5">
            <a href="#" class="text-warning" data-bs-toggle="modal" data-bs-target="#carritoModal">
                <i class="fa-solid fa-cart-shopping fa-lg" style="color: #fa00b7;"></i>
            </a>
        </div>

        <!-- Modal del Carrito de Compras -->
        <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí irá el contenido del carrito -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <marquee>
        <h4>Envios sin cargo a CABA y GBA en compras mayores a $8.000</h4>
    </marquee>
</header>