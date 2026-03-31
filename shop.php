<?php
$pageTitle = "Shop — Xelerate Learning";
$pageDescription = "Shop page placeholder for Xelerate Learning.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">Shop</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Starter placeholder page. If you want an ecommerce flow, tell me what products you plan to sell and what payment method you prefer.
  </p>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Contact sales →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
