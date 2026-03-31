<?php
$pageTitle = "SSAI Education — Xelerate Learning";
$pageDescription = "SSAI Education: immersive XR learning experiences with analytics to support learner outcomes.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">← Back to Products</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">SSAI Education</h1>
  <p style="max-width:90ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Education-focused experience learning using XR/VR/AR, designed to track performance and improve outcomes.
    This page is a starter placeholder; we can add curriculum-aligned scenarios and reporting next.
  </p>

  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request a demo →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/faqs.php"); ?>">FAQ’s →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
