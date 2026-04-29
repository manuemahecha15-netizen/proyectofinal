<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cliente – Maracumango</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
  --yellow: #F5A623;
  --yellow-dark: #D4881A;
  --yellow-light: #FFF3DC;
  --black: #1A1A1A;
  --dark: #111111;
  --cream: #FAFAF5;
  --gray: #F0EFEA;
  --text-muted: #888;
  --radius: 16px;
  --shadow: 0 8px 30px rgba(0,0,0,0.08);
  --shadow-hover: 0 16px 40px rgba(245,166,35,0.25);
}

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Nunito', Arial, sans-serif;
  background: var(--cream);
  color: var(--black);
  min-height: 100vh;
}

/* ─── HEADER ─────────────────────────────────────── */
.header {
  background: var(--dark);
  padding: 0 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 70px;
  position: sticky;
  top: 0;
  z-index: 100;
  border-bottom: 3px solid var(--yellow);
}

.logo {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 2rem;
  color: var(--yellow);
  letter-spacing: 2px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.logo-icon { font-size: 1.6rem; }

.header-right {
  display: flex;
  align-items: center;
  gap: 16px;
}

.user-chip {
  display: flex;
  align-items: center;
  gap: 8px;
  color: #aaa;
  font-size: 14px;
  font-weight: 600;
}

.avatar {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: var(--yellow);
  color: var(--dark);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 14px;
}

.btn-logout {
  background: transparent;
  border: 1.5px solid #444;
  color: #aaa;
  padding: 6px 14px;
  border-radius: 8px;
  cursor: pointer;
  font-size: 13px;
  font-family: 'Nunito', sans-serif;
  font-weight: 600;
  transition: all 0.2s;
}

.btn-logout:hover {
  border-color: var(--yellow);
  color: var(--yellow);
}

/* ─── SEARCH / FILTER BAR ──────────────────────────── */
.toolbar {
  background: white;
  padding: 14px 30px;
  display: flex;
  gap: 12px;
  align-items: center;
  border-bottom: 1px solid #eee;
}

.search-wrap {
  position: relative;
  flex: 1;
  max-width: 400px;
}

.search-wrap input {
  width: 100%;
  padding: 10px 16px 10px 40px;
  border: 1.5px solid #e0e0e0;
  border-radius: 10px;
  font-family: 'Nunito', sans-serif;
  font-size: 14px;
  outline: none;
  transition: border-color 0.2s;
}

.search-wrap input:focus { border-color: var(--yellow); }

.search-icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 16px;
  color: #bbb;
}

.filter-chips {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.chip {
  padding: 7px 16px;
  border-radius: 20px;
  font-size: 13px;
  font-weight: 700;
  border: 1.5px solid #ddd;
  background: white;
  cursor: pointer;
  transition: all 0.2s;
  font-family: 'Nunito', sans-serif;
}

.chip.active, .chip:hover {
  background: var(--yellow);
  border-color: var(--yellow);
  color: white;
}

/* ─── GRID ───────────────────────────────────────── */
.section-title {
  padding: 24px 30px 4px;
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.4rem;
  letter-spacing: 1px;
  color: #555;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
  gap: 20px;
  padding: 16px 30px 100px;
}

/* ─── CARD ───────────────────────────────────────── */
.card {
  background: white;
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  transition: transform 0.25s, box-shadow 0.25s;
  cursor: default;
  position: relative;
  display: flex;
  flex-direction: column;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-hover);
}

.card-img-wrap {
  position: relative;
  overflow: hidden;
  height: 155px;
}

.card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.card:hover img { transform: scale(1.06); }

.card-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background: var(--yellow);
  color: white;
  font-size: 11px;
  font-weight: 800;
  padding: 3px 8px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.card-body {
  padding: 14px 14px 12px;
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.card h4 {
  font-size: 15px;
  font-weight: 800;
  line-height: 1.3;
  color: var(--black);
}

.card .price {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.2rem;
  color: var(--yellow-dark);
  letter-spacing: 1px;
}

.btn-add {
  margin-top: auto;
  width: 100%;
  padding: 10px;
  background: var(--yellow);
  color: white;
  border: none;
  border-radius: 10px;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.2s, transform 0.1s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
}

.btn-add:hover { background: var(--yellow-dark); }
.btn-add:active { transform: scale(0.97); }

/* ─── CARRITO FAB ─────────────────────────────────── */
.cart-fab {
  position: fixed;
  right: 28px;
  bottom: 28px;
  background: var(--yellow);
  width: 62px;
  height: 62px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 6px 24px rgba(245,166,35,0.45);
  transition: transform 0.2s, box-shadow 0.2s;
  border: none;
  z-index: 200;
}

.cart-fab:hover {
  transform: scale(1.08);
  box-shadow: 0 10px 30px rgba(245,166,35,0.55);
}

.cart-fab .fab-icon { font-size: 26px; }

.cart-count {
  position: absolute;
  top: -4px;
  right: -4px;
  background: var(--dark);
  color: var(--yellow);
  width: 22px;
  height: 22px;
  border-radius: 50%;
  font-size: 12px;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid white;
  opacity: 0;
  transform: scale(0.6);
  transition: opacity 0.2s, transform 0.2s;
}

.cart-count.visible {
  opacity: 1;
  transform: scale(1);
}

/* ─── MODAL OVERLAY ───────────────────────────────── */
.overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.55);
  display: none;
  align-items: flex-end;
  justify-content: center;
  z-index: 300;
  backdrop-filter: blur(3px);
}

.overlay.open { display: flex; }

/* ─── DRAWER ───────────────────────────────────────── */
.drawer {
  background: white;
  width: 100%;
  max-width: 500px;
  max-height: 88vh;
  border-radius: 24px 24px 0 0;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  transform: translateY(100%);
  transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.overlay.open .drawer { transform: translateY(0); }

.drawer-handle {
  width: 40px;
  height: 4px;
  background: #ddd;
  border-radius: 2px;
  margin: 12px auto 0;
  flex-shrink: 0;
}

.drawer-header {
  padding: 16px 24px 12px;
  border-bottom: 1px solid #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-shrink: 0;
}

.drawer-title {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.6rem;
  letter-spacing: 1px;
  color: var(--black);
  display: flex;
  align-items: center;
  gap: 8px;
}

.btn-close {
  background: #f5f5f5;
  border: none;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s;
}

.btn-close:hover { background: #eee; }

/* ─── ITEMS DEL CARRITO ───────────────────────────── */
.cart-list {
  flex: 1;
  overflow-y: auto;
  padding: 12px 24px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.empty-cart {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 12px;
  padding: 40px 0;
  color: #bbb;
}

.empty-cart .empty-icon { font-size: 52px; }
.empty-cart p { font-size: 15px; font-weight: 600; }

.cart-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  background: var(--gray);
  border-radius: 12px;
  animation: slideIn 0.25s ease;
}

@keyframes slideIn {
  from { opacity: 0; transform: translateX(20px); }
  to { opacity: 1; transform: translateX(0); }
}

.cart-item .item-name {
  flex: 1;
  font-weight: 700;
  font-size: 14px;
  line-height: 1.3;
}

.item-price {
  font-weight: 700;
  color: var(--yellow-dark);
  font-size: 13px;
  white-space: nowrap;
}

.qty-controls {
  display: flex;
  align-items: center;
  gap: 8px;
  background: white;
  border-radius: 8px;
  padding: 4px 8px;
}

.qty-btn {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  border: none;
  background: var(--yellow);
  color: white;
  font-size: 16px;
  font-weight: 800;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
  transition: background 0.15s;
}

.qty-btn:hover { background: var(--yellow-dark); }
.qty-btn.minus { background: #eee; color: #666; }
.qty-btn.minus:hover { background: #ddd; }

.qty-num {
  font-weight: 800;
  font-size: 15px;
  min-width: 18px;
  text-align: center;
}

.btn-remove {
  background: none;
  border: none;
  color: #ccc;
  cursor: pointer;
  font-size: 18px;
  transition: color 0.2s;
  line-height: 1;
}

.btn-remove:hover { color: #e74c3c; }

/* ─── FOOTER DEL DRAWER ───────────────────────────── */
.drawer-footer {
  padding: 16px 24px 28px;
  border-top: 1px solid #f0f0f0;
  flex-shrink: 0;
}

.total-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.total-label { font-size: 14px; color: var(--text-muted); font-weight: 600; }

.total-amount {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.8rem;
  color: var(--black);
  letter-spacing: 1px;
}

.btn-pagar {
  width: 100%;
  padding: 15px;
  background: var(--black);
  color: var(--yellow);
  border: none;
  border-radius: 14px;
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.2rem;
  letter-spacing: 2px;
  cursor: pointer;
  transition: background 0.2s, transform 0.1s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.btn-pagar:hover { background: #2a2a2a; }
.btn-pagar:active { transform: scale(0.98); }
.btn-pagar:disabled { opacity: 0.5; cursor: not-allowed; }

/* ─── MODAL PAGO (confirmación) ───────────────────── */
.modal-pago {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 400;
  padding: 20px;
}

.modal-pago.open { display: flex; }

.pago-card {
  background: white;
  border-radius: 20px;
  padding: 30px;
  width: 100%;
  max-width: 420px;
  animation: popIn 0.3s cubic-bezier(0.34,1.56,0.64,1);
}

@keyframes popIn {
  from { opacity: 0; transform: scale(0.85); }
  to { opacity: 1; transform: scale(1); }
}

.pago-card h3 {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.5rem;
  letter-spacing: 1px;
  margin-bottom: 20px;
  color: var(--black);
}

.pago-metodos {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
  margin-bottom: 20px;
}

.metodo-btn {
  padding: 14px 10px;
  border: 2px solid #eee;
  border-radius: 12px;
  background: white;
  cursor: pointer;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  font-size: 13px;
  color: #555;
  transition: all 0.2s;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
}

.metodo-btn .m-icon { font-size: 24px; }
.metodo-btn:hover { border-color: var(--yellow); color: var(--yellow-dark); }
.metodo-btn.selected { border-color: var(--yellow); background: var(--yellow-light); color: var(--yellow-dark); }

.pago-resumen {
  background: var(--gray);
  border-radius: 12px;
  padding: 14px 16px;
  margin-bottom: 20px;
}

.pago-resumen p { font-size: 13px; color: var(--text-muted); margin-bottom: 4px; font-weight: 600; }
.pago-resumen .big { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; color: var(--black); letter-spacing: 1px; }

.pago-actions {
  display: flex;
  gap: 10px;
}

.btn-cancelar {
  flex: 1;
  padding: 13px;
  border: 1.5px solid #ddd;
  border-radius: 12px;
  background: white;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  cursor: pointer;
  color: #666;
  transition: all 0.2s;
}

.btn-cancelar:hover { border-color: #bbb; color: #333; }

.btn-confirmar {
  flex: 2;
  padding: 13px;
  border: none;
  border-radius: 12px;
  background: var(--yellow);
  color: white;
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.1rem;
  letter-spacing: 1px;
  cursor: pointer;
  transition: background 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.btn-confirmar:hover { background: var(--yellow-dark); }
.btn-confirmar:disabled { opacity: 0.5; cursor: not-allowed; }

/* ─── TOAST ─────────────────────────────────────── */
.toast {
  position: fixed;
  bottom: 110px;
  right: 28px;
  background: var(--dark);
  color: white;
  padding: 12px 20px;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 700;
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  z-index: 500;
  opacity: 0;
  transform: translateY(10px);
  transition: opacity 0.25s, transform 0.25s;
  pointer-events: none;
  border-left: 4px solid var(--yellow);
}

.toast.show { opacity: 1; transform: translateY(0); }

/* ─── SUCCESS SCREEN ─────────────────────────────── */
.success-screen {
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  gap: 12px;
  padding: 50px 24px;
}

.success-screen.show { display: flex; }
.success-icon { font-size: 64px; animation: bounce 0.5s ease; }

@keyframes bounce {
  0% { transform: scale(0); }
  60% { transform: scale(1.2); }
  100% { transform: scale(1); }
}

.success-screen h3 {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 1.8rem;
  letter-spacing: 1px;
  color: var(--black);
}

.success-screen p { color: var(--text-muted); font-size: 14px; }
.venta-num { font-weight: 800; color: var(--yellow-dark); }

/* ─── SPINNER ─────────────────────────────────────── */
.spinner {
  display: inline-block;
  width: 18px;
  height: 18px;
  border: 2.5px solid rgba(255,255,255,0.3);
  border-top-color: white;
  border-radius: 50%;
  animation: spin 0.7s linear infinite;
}

@keyframes spin { to { transform: rotate(360deg); } }

/* ─── RESPONSIVE ────────────────────────────────── */
@media (max-width: 600px) {
  .toolbar { flex-wrap: wrap; padding: 12px 16px; }
  .grid { padding: 12px 16px 100px; gap: 12px; }
  .grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
  .section-title { padding: 16px 16px 4px; }
  .header { padding: 0 16px; }
}
</style>
</head>

<body>

<!-- ─── HEADER ──────────────────────────────────────── -->
<header class="header">
  <div class="logo">
    <span class="logo-icon">🥭</span>
    Maracumango
  </div>
  <div class="header-right">
    <div class="user-chip">
      <div class="avatar" id="avatar-initials">U</div>
      <span id="user-name"><?php echo htmlspecialchars($_SESSION['user']['usuario'] ?? 'Usuario'); ?></span>
    </div>
    <button class="btn-logout" onclick="logout()">Salir</button>
  </div>
</header>

<!-- ─── TOOLBAR ──────────────────────────────────────── -->
<div class="toolbar">
  <div class="search-wrap">
    <span class="search-icon">🔍</span>
    <input type="text" id="search-input" placeholder="Buscar bebida o producto…" oninput="filtrar()">
  </div>
  <div class="filter-chips" id="chips">
    <button class="chip active" data-cat="todos" onclick="setChip(this)">Todos</button>
    <button class="chip" data-cat="michelada" onclick="setChip(this)">Micheladas</button>
    <button class="chip" data-cat="maracumango" onclick="setChip(this)">Maracumango</button>
    <button class="chip" data-cat="granizado" onclick="setChip(this)">Granizados</button>
    <button class="chip" data-cat="helado" onclick="setChip(this)">Helados</button>
  </div>
</div>

<p class="section-title">NUESTROS PRODUCTOS</p>

<!-- ─── GRID DE PRODUCTOS ───────────────────────────── -->
<div class="grid" id="grid">

  <?php while($p = $productos->fetch_assoc()): ?>
  <div class="card" data-name="<?php echo strtolower(htmlspecialchars($p['nombre'])); ?>">
    <div class="card-img-wrap">
      <img src="<?php echo htmlspecialchars($p['Ruta_Imagen']); ?>"
           alt="<?php echo htmlspecialchars($p['nombre']); ?>"
           loading="lazy"
           onerror="this.src='https://via.placeholder.com/200x155/F5A623/FFFFFF?text=Maracumango'">
    </div>
    <div class="card-body">
      <h4><?php echo htmlspecialchars($p['nombre']); ?></h4>
      <div class="price">$<?php echo number_format($p['precio'], 0, ',', '.'); ?></div>
      <button class="btn-add"
        onclick="agregar(<?php echo (int)$p['id_producto']; ?>,
                         '<?php echo addslashes(htmlspecialchars($p['nombre'])); ?>',
                         <?php echo (float)$p['precio']; ?>)">
        🛒 Agregar
      </button>
    </div>
  </div>
  <?php endwhile; ?>

</div>

<!-- ─── CARRITO FAB ─────────────────────────────────── -->
<button class="cart-fab" onclick="abrirCarrito()" aria-label="Ver carrito">
  <span class="fab-icon">🛒</span>
  <span class="cart-count" id="count">0</span>
</button>

<!-- ─── TOAST ─────────────────────────────────────── -->
<div class="toast" id="toast"></div>

<!-- ─── DRAWER CARRITO ───────────────────────────────── -->
<div class="overlay" id="overlay" onclick="cerrarOverlay(event)">
  <div class="drawer" id="drawer">

    <div class="drawer-handle"></div>

    <div class="drawer-header">
      <div class="drawer-title">🛒 Mi Carrito</div>
      <button class="btn-close" onclick="cerrar()">✕</button>
    </div>

    <!-- Lista normal o pantalla de éxito -->
    <div id="cart-view" style="display:flex;flex-direction:column;flex:1;overflow:hidden;">
      <div class="cart-list" id="lista">
        <div class="empty-cart" id="empty-state">
          <div class="empty-icon">🥭</div>
          <p>¡Tu carrito está vacío!</p>
        </div>
      </div>

      <div class="drawer-footer">
        <div class="total-row">
          <span class="total-label">Total a pagar</span>
          <span class="total-amount">$<span id="total">0</span></span>
        </div>
        <button class="btn-pagar" id="btn-pagar" onclick="abrirPago()" disabled>
          💳 Proceder al pago
        </button>
      </div>
    </div>

    <!-- Pantalla de éxito -->
    <div class="success-screen" id="success-screen">
      <div class="success-icon">✅</div>
      <h3>¡Compra exitosa!</h3>
      <p>Venta <span class="venta-num" id="venta-num">#0</span> registrada</p>
      <p>¡Gracias por tu pedido! 🥭</p>
      <button class="btn-add" style="margin-top:16px;padding:12px 30px;width:auto;border-radius:12px;"
              onclick="cerrar()">
        Seguir comprando
      </button>
    </div>

  </div>
</div>

<!-- ─── MODAL DE PAGO ───────────────────────────────── -->
<div class="modal-pago" id="modal-pago">
  <div class="pago-card">
    <h3>💳 Método de pago</h3>

    <div class="pago-metodos">
      <button class="metodo-btn selected" data-m="efectivo" onclick="elegirMetodo(this)">
        <span class="m-icon">💵</span>Efectivo
      </button>
      <button class="metodo-btn" data-m="nequi" onclick="elegirMetodo(this)">
        <span class="m-icon">📱</span>Nequi
      </button>
      <button class="metodo-btn" data-m="daviplata" onclick="elegirMetodo(this)">
        <span class="m-icon">🏦</span>Daviplata
      </button>
      <button class="metodo-btn" data-m="transferencia" onclick="elegirMetodo(this)">
        <span class="m-icon">🔄</span>Transferencia
      </button>
    </div>

    <div class="pago-resumen">
      <p>Total a pagar</p>
      <div class="big">$<span id="pago-total">0</span></div>
    </div>

    <div class="pago-actions">
      <button class="btn-cancelar" onclick="cerrarPago()">Cancelar</button>
      <button class="btn-confirmar" id="btn-confirmar" onclick="pagar()">
        Confirmar pago
      </button>
    </div>
  </div>
</div>


<script>
// ─────────────────────────────────────────
// ESTADO
// ─────────────────────────────────────────
let carrito = [];
let metodoPago = 'efectivo';
let chipActivo = 'todos';

// Avatar
(function () {
  const el = document.getElementById('user-name');
  if (!el) return;
  document.getElementById('avatar-initials').textContent =
    el.textContent.trim().charAt(0).toUpperCase();
})();

// ─────────────────────────────────────────
// AGREGAR PRODUCTO (FIX TOTAL)
// ─────────────────────────────────────────
function agregar(id, nombre, precio) {
  id = parseInt(id);

  let item = carrito.find(p => p.id === id);

  if (item) {
    item.cantidad += 1;
  } else {
    carrito.push({
      id: id,
      nombre: nombre,
      precio: parseFloat(precio),
      cantidad: 1
    });
  }

  actualizarContador();
  mostrarToast("✅ Agregado al carrito");
}

// ─────────────────────────────────────────
// CONTADOR
// ─────────────────────────────────────────
function actualizarContador() {
  const total = carrito.reduce((a, b) => a + b.cantidad, 0);
  const el = document.getElementById('count');

  if (!el) return;

  el.textContent = total;
  el.classList.toggle('visible', total > 0);
}

// ─────────────────────────────────────────
// TOAST
// ─────────────────────────────────────────
let toastTimer;
function mostrarToast(msg) {
  const t = document.getElementById('toast');
  if (!t) return;

  t.textContent = msg;
  t.classList.add('show');

  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 2000);
}

// ─────────────────────────────────────────
// ABRIR / CERRAR CARRITO
// ─────────────────────────────────────────
function abrirCarrito() {
  renderCarrito();

  const overlay = document.getElementById('overlay');
  if (!overlay) return;

  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function cerrar() {
  const overlay = document.getElementById('overlay');
  if (overlay) overlay.classList.remove('open');

  document.body.style.overflow = '';
}

// click fuera
function cerrarOverlay(e) {
  if (e.target.id === 'overlay') cerrar();
}

// ─────────────────────────────────────────
// RENDER CARRITO (ESTABLE)
// ─────────────────────────────────────────
function renderCarrito() {
  const lista = document.getElementById('lista');
  const empty = document.getElementById('empty-state');
  const totalEl = document.getElementById('total');
  const btn = document.getElementById('btn-pagar');

  if (!lista) return;

  if (carrito.length === 0) {
    lista.innerHTML = '';
    if (empty) lista.appendChild(empty);
    if (empty) empty.style.display = 'flex';
    if (btn) btn.disabled = true;
    if (totalEl) totalEl.textContent = '0';
    return;
  }

  if (empty) empty.style.display = 'none';

  let html = '';
  let total = 0;

  carrito.forEach(p => {
    const sub = p.precio * p.cantidad;
    total += sub;

    html += `
      <div class="cart-item" data-id="${p.id}">
        <div class="item-name">${p.nombre}</div>

        <div class="qty-controls">
          <button class="qty-btn minus">−</button>
          <span class="qty-num">${p.cantidad}</span>
          <button class="qty-btn plus">+</button>
        </div>

        <div class="item-price">$${formatNum(sub)}</div>
        <button class="btn-remove">🗑</button>
      </div>
    `;
  });

  lista.innerHTML = html;

  asignarEventos();

  if (totalEl) totalEl.textContent = formatNum(total);
  if (btn) btn.disabled = false;
}

// ─────────────────────────────────────────
// EVENTOS (CLAVE DEL FIX)
// ─────────────────────────────────────────
function asignarEventos() {
  document.querySelectorAll('.cart-item').forEach(item => {
    const id = parseInt(item.dataset.id);

    item.querySelector('.minus').onclick = () => cambiarCantidad(id, -1);
    item.querySelector('.plus').onclick = () => cambiarCantidad(id, 1);
    item.querySelector('.btn-remove').onclick = () => eliminar(id);
  });
}

// ─────────────────────────────────────────
// CAMBIAR CANTIDAD
// ─────────────────────────────────────────
function cambiarCantidad(id, delta) {
  const item = carrito.find(p => p.id === id);
  if (!item) return;

  item.cantidad += delta;

  if (item.cantidad <= 0) {
    carrito = carrito.filter(p => p.id !== id);
  }

  actualizarContador();
  renderCarrito();
}

// ─────────────────────────────────────────
// ELIMINAR
// ─────────────────────────────────────────
function eliminar(id) {
  carrito = carrito.filter(p => p.id !== id);
  actualizarContador();
  renderCarrito();
}

// ─────────────────────────────────────────
// FORMATO
// ─────────────────────────────────────────
function formatNum(n) {
  return Math.round(n).toLocaleString('es-CO');
}

// ─────────────────────────────────────────
// PAGO (SIN CAMBIOS GRANDES)
// ─────────────────────────────────────────
function abrirPago() {
  const total = carrito.reduce((a, b) => a + b.precio * b.cantidad, 0);
  document.getElementById('pago-total').textContent =
    total.toLocaleString('es-CO');

  document.getElementById('modal-pago').classList.add('open');
}

function cerrarPago() {
  document.getElementById('modal-pago').classList.remove('open');
}

function elegirMetodo(el) {
  document.querySelectorAll('.metodo-btn')
    .forEach(b => b.classList.remove('selected'));

  el.classList.add('selected');
  metodoPago = el.dataset.m;
}

// ─────────────────────────────────────────
// PAGAR (IGUAL TU BACKEND)
// ─────────────────────────────────────────
function pagar() {
  const btn = document.getElementById('btn-confirmar');

  btn.disabled = true;
  btn.innerHTML = '<div class="spinner"></div>';

  const totalNum = carrito.reduce((a, b) => a + b.precio * b.cantidad, 0);

  fetch("principal.php?controller=cliente&action=pagar", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      productos: carrito,
      total: totalNum,
      metodo_pago: metodoPago
    })
  })
  .then(async (r) => {
    const text = await r.text();

    try {
      return JSON.parse(text);
    } catch (e) {
      console.error("❌ RESPUESTA ROTA DEL SERVIDOR:");
      console.log(text);
      throw new Error("Respuesta inválida del servidor");
    }
  })
  .then(d => {
    cerrarPago();

    console.log("✔ RESPUESTA BACKEND:", d);

    if (d.status === "ok") {

      document.getElementById('cart-view').style.display = 'none';
      document.getElementById('success-screen').classList.add('show');
      document.getElementById('venta-num').textContent = '#' + d.venta;

      carrito = [];
      actualizarContador();

    } else {
      mostrarToast("❌ Error: " + (d.msg || "Error desconocido"));
    }
  })
  .catch(err => {
    console.error(err);
    cerrarPago();
    mostrarToast("❌ Error de conexión o servidor");
  })
  .finally(() => {
    btn.disabled = false;
    btn.innerHTML = 'Confirmar pago';
  });
}
// ─────────────────────────────────────────
// LOGOUT
// ─────────────────────────────────────────
function logout() {
  window.location.href = "principal.php?controller=auth&action=logout";
}
</script>

</body>
</html>