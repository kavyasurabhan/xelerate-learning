<?php
$pageTitle = "SSAI Corporate — Xelerate Learning";
$pageDescription = "SSAI Corporate: immersive XR-enabled corporate training with measurable performance outcomes.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">← Back to Products</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">SSAI Corporate</h1>
  <p style="max-width:90ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    XR-enabled corporate learning designed for competence measurement — not just completion.
    This page is a starter placeholder; we can add modules, outcomes, supported devices, and analytics views next.
  </p>

  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request a demo →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-solutions.php"); ?>">XR Solutions →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
