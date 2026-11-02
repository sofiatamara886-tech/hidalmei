<?php
// Incluimos el encabezado global (que carga config, funciones y el nav)
require_once __DIR__ . '/../includes/header.php';
?>

<!-- 1. HERO BANNER -->
<section style="background: transparent; padding: 50px 0; border-bottom: 3px dashed var(--rosy);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 30px;">
            <div style="flex: 1; min-width: 280px; text-align: center;">
                <span style="background-color: var(--sienna); color: var(--gamboge); padding: 6px 14px; border-radius: 20px; font-size: 1.05rem; font-weight: bold; display: inline-block; margin-bottom: 15px;">
                    ✈️ Envíos desde Corea, Japón y China
                </span>
                <h1 style="font-size: 3rem; font-weight: normal; color: var(--vampiric); margin-bottom: 15px; line-height: 1.2;">
                    Descubre Productos Exclusivos de Asia
                </h1>
                <p style="color: var(--brown); font-size: 1.3rem; margin: 0 auto 25px; max-width: 700px;">
                    Conectamos de manera rápida y segura tus tiendas asiáticas favoritas con tu hogar. Moda, cuidado personal, papelería y coleccionables en un solo lugar.
                </p>
                <div style="display: flex; gap: 15px; justify-content: center;">
                    <a href="<?= BASE_URL ?>views/catalog/index.php" style="background-color: var(--kiwi); color: var(--sienna); border: 2px solid var(--sienna); padding: 10px 28px; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1.2rem; box-shadow: 0 4px 10px rgba(63,22,16,0.3);">
                        Ver Catálogo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. PROPUESTA DE VALOR / BENEFICIOS -->
<section style="padding: 50px 0; background-color: transparent;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <div style="background: rgba(255,255,255,0.45); border: 2px solid var(--rosy); padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(63,22,16,0.15); text-align: center;">
                <h5 style="font-weight: normal; color: var(--vampiric); margin-bottom: 10px;">🛡️ Compra 100% Segura</h5>
                <p style="color: var(--brown); font-size: 1.1rem; margin: 0;">Eliminamos las barreras de idioma e importación para garantizar un proceso confiable.</p>
            </div>
            <div style="background: rgba(255,255,255,0.45); border: 2px solid var(--rosy); padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(63,22,16,0.15); text-align: center;">
                <h5 style="font-weight: normal; color: var(--vampiric); margin-bottom: 10px;">✨ Productos Auténticos</h5>
                <p style="color: var(--brown); font-size: 1.1rem; margin: 0;">Trabajamos directamente con distribuidores verificados de Asia.</p>
            </div>
            <div style="background: rgba(255,255,255,0.45); border: 2px solid var(--rosy); padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(63,22,16,0.15); text-align: center;">
                <h5 style="font-weight: normal; color: var(--vampiric); margin-bottom: 10px;">📦 Envío Confiable</h5>
                <p style="color: var(--brown); font-size: 1.1rem; margin: 0;">Seguimiento continuo y atención personalizada desde la compra hasta la entrega.</p>
            </div>
        </div>
    </div>
</section>

<?php
// Incluimos el pie de página global
require_once __DIR__ . '/../includes/footer.php';
?>