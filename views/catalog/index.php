<?php
// Supongamos que en el controlador cargas los datos necesarios:
// $categorias = ModeloCategoria::obtenerTodas();
// $productosDestacados = ModeloProducto::obtenerDestacados(4);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiDalMei - Lo mejor de Corea, Japón y China</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (Íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-pink: #e63972;
            --primary-pink-hover: #d22d63;
            --soft-pink: #fdf0f4;
        }

        .btn-pink {
            background-color: var(--primary-pink);
            color: #ffffff;
            border-radius: 30px;
            padding: 8px 24px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-pink:hover {
            background-color: var(--primary-pink-hover);
            color: #ffffff;
        }

        .btn-outline-pink {
            border: 2px solid var(--primary-pink);
            color: var(--primary-pink);
            border-radius: 30px;
            padding: 8px 24px;
            transition: all 0.3s ease;
        }

        .btn-outline-pink:hover {
            background-color: var(--primary-pink);
            color: #ffffff;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--soft-pink) 0%, #ffffff 100%);
            padding: 80px 0;
            border-bottom: 2px solid #f2f2f2;
        }

        .category-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .feature-box {
            padding: 30px 20px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            text-align: center;
        }

        .feature-box i {
            color: var(--primary-pink);
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- 1. HERO BANNER -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger mb-3 px-3 py-2 fs-6">
                        <i class="fa-solid fa-plane"></i> Envíos desde Corea, Japón y China
                    </span>
                    <h1 class="display-4 fw-bold text-dark mb-3">Descubre Productos Exclusivos de Asia</h1>
                    <p class="lead text-muted mb-4">
                        Conectamos de manera rápida y segura tus tiendas asiáticas favoritas con tu hogar. Moda, cuidado personal, papelería y coleccionables en un solo lugar.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="index.php?controlador=catalogo&accion=index" class="btn btn-pink btn-lg shadow-sm">
                            <i class="fa-solid fa-bag-shopping me-2"></i> Ver Catálogo
                        </a>
                        <a href="#beneficios" class="btn btn-outline-pink btn-lg">Saber Más</a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="assets/img/hero-banner.jpg" alt="HiDalMei Productos Asiáticos" class="img-fluid rounded-4 shadow" onerror="this.src='https://via.placeholder.com/600x400?text=HiDalMei+Productos+Exclusivos'">
                </div>
            </div>
        </div>
    </section>

    <!-- 2. PROPUESTA DE VALOR / BENEFICIOS -->
    <section id="beneficios" class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h5 class="fw-bold">Compra 100% Segura</h5>
                        <p class="text-muted small mb-0">Eliminamos las barreras de idioma e importación para garantizar un proceso confiable.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="fa-solid fa-certificate"></i>
                        <h5 class="fw-bold">Productos Auténticos</h5>
                        <p class="text-muted small mb-0">Trabajamos directamente con distribuidores verificados de Asia.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h5 class="fw-bold">Acompañamiento en Envío</h5>
                        <p class="text-muted small mb-0">Seguimiento continuo y atención personalizada desde la compra hasta la entrega.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CATEGORÍAS PRINCIPALES -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Explora por Categoría</h2>
                <p class="text-muted">Encuentra tus tendencias asiáticas favoritas</p>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="index.php?controlador=catalogo&accion=index&categoria=belleza-y-cuidado" class="text-decoration-none">
                        <div class="card category-card text-center p-3">
                            <i class="fa-solid fa-sparkles text-pink fs-1 mb-2" style="color: var(--primary-pink);"></i>
                            <h6 class="fw-bold text-dark mb-0">Belleza & K-Beauty</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="index.php?controlador=catalogo&accion=index&categoria=moda-y-tendencias" class="text-decoration-none">
                        <div class="card category-card text-center p-3">
                            <i class="fa-solid fa-shirt text-pink fs-1 mb-2" style="color: var(--primary-pink);"></i>
                            <h6 class="fw-bold text-dark mb-0">Moda Asiática</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="index.php?controlador=catalogo&accion=index&categoria=papeleria-y-coleccionables" class="text-decoration-none">
                        <div class="card category-card text-center p-3">
                            <i class="fa-solid fa-pen-nib text-pink fs-1 mb-2" style="color: var(--primary-pink);"></i>
                            <h6 class="fw-bold text-dark mb-0">Papelería Kawaii</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="index.php?controlador=catalogo&accion=index&categoria=accesorios" class="text-decoration-none">
                        <div class="card category-card text-center p-3">
                            <i class="fa-solid fa-gem text-pink fs-1 mb-2" style="color: var(--primary-pink);"></i>
                            <h6 class="fw-bold text-dark mb-0">Accesorios</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. PRODUCTOS DESTACADOS (EJEMPLO DINÁMICO DESDE DB) -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0">Productos Destacados</h2>
                    <p class="text-muted small mb-0">Los artículos más pedidos de Corea, Japón y China</p>
                </div>
                <a href="index.php?controlador=catalogo&accion=index" class="btn btn-outline-pink">Ver Todo</a>
            </div>

            <div class="row g-4">
                <?php if (!empty($productosDestacados)): ?>
                    <?php foreach ($productosDestacados as $prod): ?>
                        <div class="col-6 col-md-3">
                            <div class="card h-100 border-0 shadow-sm rounded-3">
                                <img src="uploads/<?= htmlspecialchars($prod['imagen']); ?>" class="card-img-top" alt="<?= htmlspecialchars($prod['nombre']); ?>" onerror="this.src='https://via.placeholder.com/300x300?text=Sin+Imagen'">
                                <div class="card-body d-flex flex-column">
                                    <span class="badge bg-secondary mb-2 align-self-start"><?= htmlspecialchars($prod['pais_nombre']); ?></span>
                                    <h6 class="card-title fw-bold text-truncate"><?= htmlspecialchars($prod['nombre']); ?></h6>
                                    <p class="text-danger fw-bold fs-5 mb-3">$<?= number_format($prod['precio'], 2); ?></p>
                                    <a href="index.php?controlador=producto&accion=detalle&id=<?= $prod['id']; ?>" class="btn btn-pink mt-auto w-100">Ver Detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-4">
                        <p class="text-muted fs-5">Próximamente tendremos productos destacados disponibles.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 5. FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <h4 class="fw-bold text-pink mb-3" style="color: var(--primary-pink);">HiDalMei</h4>
                    <p class="text-muted small">
                        Tu puente confiable para adquirir lo mejor de Corea del Sur, Japón y China con la seguridad y facilidad que mereces.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">Enlaces Rápidos</h6>
                    <ul class="list-unstyled small text-muted">
                        <li><a href="index.php" class="text-decoration-none text-muted">Inicio</a></li>
                        <li><a href="index.php?controlador=catalogo&accion=index" class="text-decoration-none text-muted">Catálogo</a></li>
                        <li><a href="index.php?controlador=auth&accion=login" class="text-decoration-none text-muted">Iniciar Sesión</a></li>
                        <li><a href="index.php?controlador=auth&accion=registro" class="text-decoration-none text-muted">Registrarse</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">Contacto</h6>
                    <p class="text-muted small mb-1"><i class="fa-solid fa-envelope me-2"></i>soporte@hidalmei.com</p>
                    <p class="text-muted small"><i class="fa-solid fa-globe me-2"></i>www.hidalmei.com</p>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center text-muted small">
                &copy; <?= date('Y'); ?> HiDalMei. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>