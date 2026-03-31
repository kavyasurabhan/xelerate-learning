<?php
$pageTitle = "Log In — Xelerate Learning";
$pageDescription = "Demo login for Xelerate Learning.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";

if (session_status() !== PHP_SESSION_ACTIVE) {
  @session_start();
}

$error = "";
$success = "";

// Demo credentials (for showcase only)
$demoEmail = "demo@xeleratelearning.com";
$demoPassword = "demo123";

if (($_SERVER["REQUEST_METHOD"] ?? "") === "POST") {
  $email = trim((string)($_POST["email"] ?? ""));
  $password = (string)($_POST["password"] ?? "");

  if ($email === "" || $password === "") {
    $error = "Please enter email and password.";
  } elseif (strcasecmp($email, $demoEmail) === 0 && hash_equals($demoPassword, $password)) {
    $_SESSION["demo_user"] = [
      "email" => $demoEmail,
      "name" => "Demo User",
      "logged_in_at" => time(),
    ];
    header("Location: " . $base . "/login.php");
    exit;
  } else {
    $error = "Invalid demo credentials. Use demo@xeleratelearning.com / demo123.";
  }
}

if (isset($_SESSION["demo_user"])) {
  $success = "You’re logged in (demo).";
}
?>

<style>
  .auth-wrap{
    margin-top:18px;
    flex:1;
    display:grid;
    grid-template-columns: 1.15fr .85fr;
    gap: 18px;
    align-items:stretch;
    min-height: 520px;
  }
  @media (max-width: 980px){
    .auth-wrap{ grid-template-columns: 1fr; min-height: unset; }
  }

  .auth-visual{
    border-radius: 22px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.10);
    background:
      radial-gradient(900px 420px at 20% 20%, rgba(var(--brand-rgb), .42), transparent 60%),
      radial-gradient(900px 420px at 80% 80%, rgba(var(--brand2-rgb), .22), transparent 60%),
      linear-gradient(120deg, rgba(0,0,0,.65), rgba(0,0,0,.18)),
      repeating-linear-gradient(135deg, rgba(255,255,255,.06) 0, rgba(255,255,255,.06) 12px, transparent 12px, transparent 30px);
    position:relative;
  }
  .auth-visual-inner{
    height:100%;
    padding: 26px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    gap: 22px;
  }
  .auth-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:8px 12px;
    border-radius:999px;
    border:1px solid rgba(255,255,255,.12);
    background:rgba(255,255,255,.05);
    color:var(--muted);
    width:fit-content;
    font-size:13px;
  }
  .auth-badge .dot{
    width:10px;height:10px;border-radius:999px;
    background: var(--brand2);
    box-shadow:0 0 0 6px rgba(var(--brand2-rgb), .12);
  }
  .auth-title{
    margin:0;
    font-size:44px;
    line-height:1.05;
    letter-spacing:-.9px;
  }
  @media (max-width: 980px){
    .auth-title{ font-size:34px; }
  }
  .auth-sub{
    margin:10px 0 0;
    color: var(--muted);
    line-height:1.75;
    max-width: 70ch;
  }

  .auth-card{
    border-radius: 22px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.10);
    background: linear-gradient(180deg, rgba(14,24,49,.92), rgba(11,19,40,.86));
    box-shadow: 0 22px 60px rgba(0,0,0,.55);
    display:flex;
    flex-direction:column;
  }
  .auth-card-header{
    padding: 18px 20px;
    border-bottom:1px solid rgba(255,255,255,.08);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
  }
  .auth-card-header h2{
    margin:0;
    font-size:14px;
    letter-spacing:.12em;
    text-transform:uppercase;
    color: rgba(234,240,255,.92);
  }
  .chip{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:7px 10px;
    border-radius:999px;
    border:1px solid rgba(255,255,255,.12);
    background:rgba(255,255,255,.05);
    color: var(--muted);
    font-size:12px;
    white-space:nowrap;
  }
  .auth-card-body{
    padding: 20px;
    display:grid;
    gap: 14px;
  }
  .field{ display:grid; gap:8px; }
  .field{
    display:grid;
    gap: 8px;
  }
  .label{
    font-size:13px;
    color: var(--muted);
  }
  .input{
    width:100%;
    padding:12px 14px;
    border-radius:14px;
    border:1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.05);
    color: var(--text);
    outline:none;
    transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
  }
  .input:focus{
    border-color: rgba(var(--brand-rgb), .55);
    box-shadow: 0 0 0 6px rgba(var(--brand-rgb), .14);
    background: rgba(255,255,255,.06);
  }
  .login-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    flex-wrap:wrap;
    margin-top: 2px;
  }
  .check{
    display:flex;
    align-items:center;
    gap: 10px;
    color: var(--muted);
    font-size: 13px;
  }
  .check input{ width:16px; height:16px; }
  .link{
    color: rgba(234,240,255,.92);
    font-weight:800;
  }
  .link:hover{ text-decoration: underline; }
  .primary-btn{
    width:100%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:12px 16px;
    border-radius: 14px;
    border:1px solid rgba(255,255,255,.20);
    background: linear-gradient(135deg, rgba(var(--brand-rgb),1), rgba(var(--brand2-rgb),1));
    color: white;
    font-weight:900;
    letter-spacing:.2px;
    cursor:pointer;
    transition: transform .08s ease, filter .15s ease;
  }
  .primary-btn:hover{filter: brightness(1.06)}
  .primary-btn:active{transform: translateY(1px)}
  .hint{
    font-size:13px;
    color: rgba(169,183,214,.9);
    line-height:1.6;
  }
  .demo-box{
    padding:14px;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.10);
    background: rgba(0,0,0,.18);
  }
  .divider{
    height:1px;
    background: rgba(255,255,255,.06);
    margin: 4px 0;
  }
</style>

<div class="auth-wrap">
  <div class="auth-visual">
    <div class="auth-visual-inner">
      <div>
        <div class="auth-badge"><span class="dot"></span> Xelerate Learning</div>
        <h1 class="auth-title" style="margin-top:14px;">Log in to your demo workspace</h1>
        <p class="auth-sub">
          Experience Learning that you can measure. Sign in to view demo navigation and explore products, XR learning, and analytics-ready content.
        </p>
      </div>

      <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);border:1px solid rgba(255,255,255,.10);border-radius:18px;">
        <div style="font-weight:900;">Demo credentials</div>
        <div style="margin-top:10px;display:grid;gap:6px;color:var(--muted);line-height:1.7;">
          <div><strong style="color:var(--text);">Email:</strong> <?php echo htmlspecialchars($demoEmail); ?></div>
          <div><strong style="color:var(--text);">Password:</strong> <?php echo htmlspecialchars($demoPassword); ?></div>
        </div>
      </div>
    </div>
  </div>

<?php if ($success): ?>
  <div class="auth-card">
    <div class="auth-card-header">
      <h2>Signed in</h2>
      <span class="chip">Demo</span>
    </div>
    <div class="auth-card-body">
      <div class="panel" style="padding:14px;background:rgba(var(--brand2-rgb), .12);border:1px solid rgba(var(--brand2-rgb), .26);border-radius:16px;">
        <?php echo htmlspecialchars($success); ?>
      </div>

      <div class="divider"></div>

      <div style="display:grid;gap:10px;">
        <a class="primary-btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">Go to Products</a>
        <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-learning.php"); ?>">XR Learning →</a>
        <a class="btn" href="<?php echo htmlspecialchars($base . "/logout.php"); ?>">Log out →</a>
      </div>

      <div class="hint">
        Want a tailored demo? <a class="link" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Contact us</a>.
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="auth-card">
    <div class="auth-card-header">
      <h2>Log in</h2>
      <span class="chip">Demo access</span>
    </div>

    <div class="auth-card-body">
      <?php if ($error): ?>
        <div class="panel" style="padding:14px;background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.25);border-radius:16px;">
          <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>

      <form method="post" style="display:grid;gap:14px;">
        <div class="field">
          <div class="label">Email</div>
          <input class="input" type="email" name="email" placeholder="demo@xeleratelearning.com" required autocomplete="username">
        </div>

        <div class="field">
          <div class="label">Password</div>
          <input class="input" type="password" name="password" placeholder="demo123" required autocomplete="current-password">
        </div>

        <div class="login-row">
          <label class="check">
            <input type="checkbox" name="remember" value="1">
            Remember Me
          </label>
          <a class="link" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Lost your password?</a>
        </div>

        <button class="primary-btn" type="submit">Log In</button>

        <div class="hint">
          Don’t have access? <a class="link" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request access</a>.
          <span style="opacity:.8;">·</span>
          <a class="link" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Register</a>
        </div>
      </form>

      <div class="divider"></div>

      <div class="hint">
        By logging in, you’ll see the demo navigation and can explore products and XR learning pages.
      </div>
    </div>
  </div>
<?php endif; ?>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
