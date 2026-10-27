<?php 
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__, 1));
}
if (!defined('BASE_URL')) {
    define('BASE_URL', '/hidalmei/');
}

require_once BASE_PATH . '/includes/header.php'; 
?>

<!-- Estilos personalizados con temática estética asiática / pastel -->
<style>
    .about-container {
        max-width: 950px;
        margin: 3rem auto;
        padding: 3rem;
        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(232, 67, 147, 0.12);
        border: 2px solid #ffd1dc;
        position: relative;
        overflow: hidden;
    }

    /* Detalles decorativos estilo Kawaii / Asiático */
    .about-container::before {
        content: "✨ 🌸 💫";
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 1.5rem;
        opacity: 0.7;
    }

    .about-title {
        color: #d63031;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 2.2rem;
        letter-spacing: 1px;
        text-shadow: 2px 2px 4px rgba(232, 67, 147, 0.15);
    }

    .about-subtitle {
        text-align: center;
        color: #6c5ce7;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 2.5rem;
    }

    .about-box {
        background: rgba(255, 255, 255, 0.85);
        padding: 2rem;
        border-radius: 15px;
        border-left: 5px solid #a29bfe;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        margin-bottom: 2.5rem;
    }

    .about-text {
        color: #2d3436;
        line-height: 1.9;
        font-size: 1.05rem;
        text-align: justify;
        margin-bottom: 1.2rem;
    }

    /* Sección del Equipo */
    .team-section {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px dashed #ff7675;
    }

    .team-title {
        color: #0984e3;
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 2rem;
    }

    .team-card-container {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .team-card {
        background: white;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(116, 185, 255, 0.25);
        transition: transform 0.3s ease;
        width: 260px;
        border: 2px solid #74b9ff;
    }

    .team-card:hover {
        transform: translateY(-8px);
    }

    .team-img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 12px;
        border: 2px solid #ffeaa7;
    }

    .team-name {
        font-weight: 700;
        color: #2d3436;
        font-size: 1.1rem;
        margin: 0;
    }

    .team-role {
        font-size: 0.85rem;
        color: #e84393;
        font-weight: 600;
        margin-top: 4px;
    }
</style>

<div class="about-container">
    <h2 class="about-title">🌸 ¿Quiénes Somos? 🌸</h2>
    <p class="about-subtitle">Conectando lo mejor de Asia directamente con tus manos ✈️🇰🇷🇯🇵🇨🇳</p>
    
    <div class="about-box">
        <p class="about-text">
            Somos un proyecto digital innovador diseñado para conectar de manera segura, rápida y confiable a proveedores de Corea del Sur, Japón y China con clientes interesados en adquirir productos exclusivos de estos países.
        </p>
        <p class="about-text">
            A través de la plataforma los usuarios podrán explorar una gran variedad de artículos cuidadosamente seleccionados, incluyendo moda, accesorios, productos de belleza, papelería, coleccionables y tendencias asiáticas de alta demanda.
        </p>
        <p class="about-text">
            El objetivo principal es facilitar el acceso a productos internacionales eliminando las dificultades que suelen presentarse al comprar en páginas extranjeras, como las barreras del idioma, procesos de importación complejos o falta de confianza en los proveedores. La plataforma actuará como intermediaria entre el cliente y los distribuidores asiáticos, garantizando un proceso de compra más seguro.
        </p>
        <p class="about-text">
            Además de ofrecer productos auténticos y de calidad, buscará brindar una experiencia de usuario eficiente mediante un catálogo actualizado constantemente, información detallada de cada producto, atención personalizada y acompañamiento durante todo el proceso de compra y envío.
        </p>
        <p class="about-text" style="margin-bottom: 0;">
            Gracias a su propuesta digital, tiene el potencial de convertirse en una plataforma competitiva dentro del comercio electrónico internacional, ofreciendo comodidad, variedad y seguridad en un solo lugar.
        </p>
    </div>

    <!-- Sección del Equipo con sus nombres e imagen -->
    <div class="team-section">
        <h3 class="team-title">✨ Conoce a las Creadoras ✨</h3>
        
        <div class="team-card-container">
            <!-- Imagen general del equipo destacando a las integrantes -->
            <div style="width: 100%; max-width: 500px; margin: 0 auto 2rem auto; background: white; padding: 15px; border-radius: 15px; box-shadow: 0 8px 25px rgba(232, 67, 147, 0.2); border: 2px solid #ff7675;">
                <img src="<?= BASE_URL ?>assets/img/equipo.jpg" alt="Equipo HiDalMei" class="team-img" style="height: 320px;">
                <div style="display: flex; justify-content: space-around; margin-top: 10px; text-align: center;">
                    <div>
                        <p class="team-name" style="font-size: 0.95rem;">Nicol Muñoz</p>
                        
                    </div>
                    <div>
                        <p class="team-name" style="font-size: 0.95rem;">Danna Támara</p>
                        
                    </div>
                    <div>
                        <p class="team-name" style="font-size: 0.95rem;">Helen Tique</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>