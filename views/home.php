<?php
// Incluimos el encabezado global (que carga config, funciones y el nav)
require_once __DIR__ . '/../includes/header.php';
?>

<!-- 1. HERO BANNER -->
<section style="background: linear-gradient(135deg, #fdf0f4 0%, #ffffff 100%); padding: 70px 0; border-bottom: 2px solid #f2f2f2;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 30px;">
            <div style="flex: 1; min-width: 280px;">
                <span style="background-color: rgba(230, 57, 114, 0.1); color: #e63972; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; display: inline-block; margin-bottom: 15px;">
                    ✈️ Envíos desde Corea, Japón y China
                </span>
                <h1 style="font-size: 2.5rem; font-weight: bold; color: #212529; margin-bottom: 15px; line-height: 1.2;">
                    Descubre Productos Exclusivos de Asia
                </h1>
                <p style="color: #6c757d; font-size: 1.05rem; margin-bottom: 25px;">
                    Conectamos de manera rápida y segura tus tiendas asiáticas favoritas con tu hogar. Moda, cuidado personal, papelería y coleccionables en un solo lugar.
                </p>
                <div style="display: flex; gap: 15px;">
                    <a href="<?= BASE_URL ?>views/catalog/index.php" style="background-color: #e63972; color: #fff; padding: 10px 24px; border-radius: 30px; text-decoration: none; font-weight: bold; box-shadow: 0 4px 10px rgba(230,57,114,0.3);">
                        Ver Catálogo
                    </a>
                </div>
            </div>
            <div style="flex: 1; min-width: 280px; text-align: center;">

            <div class=hero-banner-img>
<div style="flex: 1; min-width: 250px; text-align: center;">
    <img src="<?= BASE_URL ?>assets/img/hero-banner.jpg" 
     alt="Productos Exclusivos HiDalMei" 
     style="width: 100%; height: 350px; object-fit: cover; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-top: -20px;"
     onerror="this.src='https://i.pinimg.com/1200x/16/76/23/1676233b0a6455770b2ce76aead08ab6.jpg'">
</div>      </div>
    </div>
</section>

<!-- 2. PROPUESTA DE VALOR / BENEFICIOS -->
<section style="padding: 50px 0; background-color: #f8f9fa;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <div style="background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); text-align: center;">
                <h5 style="font-weight: bold; color: #333; margin-bottom: 10px;">🛡️ Compra 100% Segura</h5>
                <p style="color: #6c757d; font-size: 0.9rem; margin: 0;">Eliminamos las barreras de idioma e importación para garantizar un proceso confiable.</p>
            </div>
            <div style="background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); text-align: center;">
                <h5 style="font-weight: bold; color: #333; margin-bottom: 10px;">✨ Productos Auténticos</h5>
                <p style="color: #6c757d; font-size: 0.9rem; margin: 0;">Trabajamos directamente con distribuidores verificados de Asia.</p>
            </div>
            <div style="background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); text-align: center;">
                <h5 style="font-weight: bold; color: #333; margin-bottom: 10px;">📦 Envío Confiable</h5>
                <p style="color: #6c757d; font-size: 0.9rem; margin: 0;">Seguimiento continuo y atención personalizada desde la compra hasta la entrega.</p>
            </div>
        </div>
    </div>
</section>

<?php
// Incluimos el pie de página global
require_once __DIR__ . '/../includes/footer.php';
?>