<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maracumango – Login</title>
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

        .panel-left {
            background: var(--black);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 48px;
            position: relative;
            overflow: hidden;
        }

        .panel-left::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            border: 2px solid rgba(245, 166, 35, 0.12);
            top: -120px; right: -120px;
        }
        .panel-left::after {
            content: '';
            position: absolute;
            width: 320px; height: 320px;
            border-radius: 50%;
            border: 2px solid rgba(46, 125, 50, 0.18);
            bottom: -80px; left: -80px;
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
            letter-spacing: 0.03em;
            position: relative; z-index: 1;
        }

        .divider-brand {
            width: 40px; height: 3px;
            background: var(--green);
            border-radius: 2px;
            margin: 28px auto;
            position: relative; z-index: 1;
        }

        .panel-left-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.38);
            line-height: 1.75;
            text-align: center;
            max-width: 290px;
            position: relative; z-index: 1;
        }

        .badges {
            display: flex;
            gap: 10px;
            margin-top: 32px;
            position: relative; z-index: 1;
        }

        .badge {
            display: flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 12px;
            color: rgba(255,255,255,0.45);
        }

        .badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green);
        }

        /* RIGHT PANEL */
        .panel-right {
            background: var(--cream);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 48px;
        }

        .form-container {
            width: 100%;
            max-width: 380px;
        }

        .form-header { margin-bottom: 36px; }

        .form-header h2 {
            font-size: 30px;
            font-weight: 800;
            color: var(--black);
            margin-bottom: 8px;
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

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 24px;
        }

        .alert-error {
            background: #fff8e1;
            border: 1px solid #ffe082;
            color: #7a4800;
        }

        .alert-success {
            background: #f0faf0;
            border: 1px solid var(--green-light);
            color: var(--green);
        }

        .field { margin-bottom: 18px; }

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
        input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            font-family: var(--font);
            font-size: 15px;
            color: var(--black);
            background: var(--white);
            border: 2px solid #EBEBEB;
            border-radius: 12px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--yellow);
            box-shadow: 0 0 0 4px rgba(245,166,35,0.14);
        }

        input::placeholder { color: #C8C8C8; }

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
            margin-top: 10px;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
        }

        .btn-primary:hover {
            background: var(--yellow-deep);
            box-shadow: 0 8px 24px rgba(245,166,35,0.45);
        }

        .btn-primary:active { transform: scale(0.98); }

        .bottom-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13.5px;
            color: var(--gray-mid);
        }

        .bottom-link a {
            color: var(--green);
            text-decoration: none;
            font-weight: 700;
        }

        .bottom-link a:hover { text-decoration: underline; }

        @media (max-width: 720px) {
            body { grid-template-columns: 1fr; }
            .panel-left { display: none; }
            .panel-right { padding: 40px 24px; }
        }
    </style>
</head>
<body>

<div class="panel-left">
   <img src="<?php echo '/proyectofinal_2/assets/img/logo.png'; ?>" class="brand-logo">
    <div class="brand-name">Maracumango</div>
    <div class="brand-tagline">El sabor que te pone a volar 🥭</div>
    <div class="divider-brand"></div>
    <p class="panel-left-desc">Gestiona tu negocio con estilo. Accede a tu panel y controla todo desde aquí.</p>
    <div class="badges">
        <div class="badge"><div class="badge-dot"></div> En línea</div>
        <div class="badge">🔒 Seguro</div>
    </div>
</div>

<div class="panel-right">
    <div class="form-container">

        <div class="form-header">
            <h2>¡Hola de<br><span>nuevo!</span> 👋</h2>
            <p>¿No tienes cuenta? <a href="principal.php?controller=login&action=registro">Crear cuenta</a></p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                ⚠️ Datos incorrectos. Verifica tu usuario o contraseña.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                ✅ ¡Registro exitoso! Ahora puedes iniciar sesión.
            </div>
        <?php endif; ?>

        <form method="POST" action="principal.php?controller=login&action=validar">
            <div class="field">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Tu nombre de usuario" required>
            </div>

            <div class="field">
                <label for="password">Contraseña</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <button type="button" class="toggle-pw" onclick="togglePw()">👁</button>
                </div>
            </div>

            <button type="submit" class="btn-primary">Ingresar 🥭</button>
        </form>

        <div class="bottom-link">
            <p>¿No tienes cuenta? <a href="principal.php?controller=login&action=registro">Crear cuenta</a></p>
        </div>

    </div>
</div>

<script>
function togglePw() {
    const pw = document.getElementById('password');
    pw.type = pw.type === 'password' ? 'text' : 'password';
}
</script>
</body>
</html>