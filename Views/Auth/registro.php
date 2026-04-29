<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maracumango – Registro</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --yellow:      #F5A623;
            --yellow-deep: #E08C00;
            --yellow-light:#FFF3D6;
            --green:       #2E7D32;
            --green-light: #C8E6C9;
            --black:       #1A1A1A;
            --gray:        #3D3D3D;
            --gray-mid:    #7A7A7A;
            --white:       #FFFFFF;
            --cream:       #FAFAF7;
            --font: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            font-family: var(--font);
            background: var(--black);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* LEFT: Form */
        .panel-left {
            background: var(--cream);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 48px;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-header { margin-bottom: 28px; }

        .form-header h2 {
            font-size: 28px;
            font-weight: 800;
            color: var(--black);
            margin-bottom: 6px;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .form-header h2 span { color: var(--yellow-deep); }

        .form-header p { font-size: 14px; color: var(--gray-mid); }

        .form-header a {
            color: var(--green);
            text-decoration: none;
            font-weight: 700;
        }
        .form-header a:hover { text-decoration: underline; }

        /* Steps */
        .steps {
            display: flex;
            gap: 5px;
            margin-bottom: 28px;
        }
        .step-dot {
            height: 4px;
            border-radius: 2px;
            background: #DEDEDE;
            flex: 1;
        }
        .step-dot.active { background: var(--yellow); }

        /* Fields */
        .field { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 7px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 13px 16px;
            font-family: var(--font);
            font-size: 15px;
            color: var(--black);
            background: var(--white);
            border: 2px solid #EBEBEB;
            border-radius: 12px;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus, select:focus {
            border-color: var(--yellow);
            box-shadow: 0 0 0 4px rgba(245,166,35,0.14);
        }

        input::placeholder { color: #C8C8C8; }

        /* Password toggle */
        .password-wrapper { position: relative; }
        .password-wrapper input { padding-right: 50px; }

        .toggle-pw {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 17px;
            padding: 4px;
            width: auto;
            color: var(--gray-mid);
        }

        /* Strength bar */
        .strength-bar {
            display: flex;
            gap: 4px;
            margin-top: 8px;
        }
        .strength-seg {
            height: 3px;
            flex: 1;
            border-radius: 2px;
            background: #EBEBEB;
            transition: background 0.25s;
        }
        .strength-label {
            font-size: 11px;
            color: var(--gray-mid);
            margin-top: 5px;
        }

        /* Role cards */
        .role-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .role-card {
            border: 2px solid #EBEBEB;
            border-radius: 12px;
            padding: 14px;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--white);
        }

        .role-card:hover { border-color: var(--yellow); }

        .role-card.selected {
            border-color: var(--yellow);
            background: var(--yellow-light);
        }

        .role-card input[type="radio"] { display: none; }

        .role-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: var(--yellow-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .role-card.selected .role-icon {
            background: rgba(245,166,35,0.3);
        }

        .role-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--black);
        }

        .role-desc {
            font-size: 11px;
            color: var(--gray-mid);
        }

        #rol { display: none; }

        /* Terms */
        .terms {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 16px 0 4px;
            font-size: 13px;
            color: var(--gray-mid);
        }

        .terms input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--yellow);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .terms a {
            color: var(--green);
            font-weight: 600;
            text-decoration: none;
        }

        /* Button */
        .btn-primary {
            width: 100%;
            padding: 15px;
            font-family: var(--font);
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--black);
            background: var(--yellow);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 12px;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
        }

        .btn-primary:hover {
            background: var(--yellow-deep);
            box-shadow: 0 8px 24px rgba(245,166,35,0.45);
        }

        .btn-primary:active { transform: scale(0.98); }

        /* RIGHT: Branding */
        .panel-right {
            background: var(--black);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 48px;
            position: relative;
            overflow: hidden;
        }

        .panel-right::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            border: 2px solid rgba(245,166,35,0.1);
            top: -120px; left: -120px;
        }

        .panel-right::after {
            content: '';
            position: absolute;
            width: 320px; height: 320px;
            border-radius: 50%;
            border: 2px solid rgba(46,125,50,0.16);
            bottom: -80px; right: -80px;
        }

        .brand-logo {
            width: 170px; height: 170px;
            border-radius: 50%;
            border: 3px solid var(--yellow);
            box-shadow: 0 0 0 8px rgba(245,166,35,0.12),
                        0 24px 60px rgba(0,0,0,0.6);
            object-fit: cover;
            margin-bottom: 28px;
            position: relative; z-index: 1;
        }

        .brand-name {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--yellow);
            position: relative; z-index: 1;
            text-shadow: 0 2px 16px rgba(245,166,35,0.35);
        }

        .brand-tagline {
            font-size: 13px;
            color: var(--gray-mid);
            margin-top: 8px;
            position: relative; z-index: 1;
        }

        .divider-brand {
            width: 40px; height: 3px;
            background: var(--green);
            border-radius: 2px;
            margin: 28px auto;
            position: relative; z-index: 1;
        }

        .benefits {
            list-style: none;
            position: relative; z-index: 1;
        }

        .benefits li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: rgba(255,255,255,0.5);
            margin-bottom: 14px;
        }

        .benefit-check {
            width: 24px; height: 24px;
            border-radius: 50%;
            background: rgba(46,125,50,0.2);
            border: 1px solid rgba(46,125,50,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #66BB6A;
            flex-shrink: 0;
        }

        @media (max-width: 720px) {
            body { grid-template-columns: 1fr; }
            .panel-right { display: none; }
            .panel-left { padding: 40px 24px; }
        }
    </style>
</head>
<body>


<!-- LEFT: Form -->
<div class="panel-left">
    <div class="form-container">

        <div class="form-header">
            <h2>Crear<br><span>cuenta</span> 🥭</h2>
            <p>¿Ya tienes cuenta? 
            <a href="principal.php?controller=login&action=login">Inicia sesión</a></p>
        </div>

        <div class="steps">
            <div class="step-dot active"></div>
            <div class="step-dot active"></div>
            <div class="step-dot active"></div>
        </div>

        <!-- MENSAJES -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                ⚠️ Usuario o correo ya existe / error en registro
            </div>
        <?php endif; ?>

        <form method="POST" action="principal.php?controller=login&action=guardar">

            <div class="field">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Elige un nombre de usuario" required>
            </div>

            <div class="field">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="tu@correo.com" required>
            </div>

            <div class="field">
                <label for="password">Contraseña</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required oninput="updateStrength(this.value)">
                    <button type="button" class="toggle-pw" onclick="togglePw()">👁</button>
                </div>

                <div class="strength-bar">
                    <div class="strength-seg" id="s1"></div>
                    <div class="strength-seg" id="s2"></div>
                    <div class="strength-seg" id="s3"></div>
                    <div class="strength-seg" id="s4"></div>
                </div>
                <div class="strength-label" id="slabel"></div>
            </div>

            <!-- 🔥 IMPORTANTE: ROL FIJO -->
            <input type="hidden" name="rol" value="2">

            <div class="terms">
                <input type="checkbox" id="terms" required>
                <label for="terms" style="text-transform:none;letter-spacing:0;font-size:13px;margin-bottom:0;">
                    Acepto los <a href="#">Términos y condiciones</a>
                </label>
            </div>

            <button type="submit" class="btn-primary">Registrarme 🥭</button>
        </form>

    </div>
</div>

<!-- RIGHT -->
<div class="panel-right">
    <img src="/proyectofinal_2/assets/img/logo.png" class="brand-logo">
    <div class="brand-name">Maracumango</div>
    <div class="brand-tagline">El sabor que te pone a volar 🥭</div>
    <div class="divider-brand"></div>

    <ul class="benefits">
        <li><span class="benefit-check">✓</span> Acceso inmediato tras el registro</li>
        <li><span class="benefit-check">✓</span> Gestión fácil de tu negocio</li>
        <li><span class="benefit-check">✓</span> Soporte disponible siempre</li>
    </ul>
</div>

<script>
function togglePw() {
    const pw = document.getElementById('password');
    pw.type = pw.type === 'password' ? 'text' : 'password';
}

function updateStrength(pw) {
    let score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;

    const colors = ['#EBEBEB','#E53935','#FB8C00','#F5A623','#2E7D32'];
    const labels = ['','Muy débil','Débil','Buena','Fuerte 💪'];

    for (let i = 1; i <= 4; i++) {
        document.getElementById('s'+i).style.background = i <= score ? colors[score] : '#EBEBEB';
    }

    const lbl = document.getElementById('slabel');
    lbl.textContent = labels[score];
    lbl.style.color = colors[score];
}
</script>

</body>
</html>