<?php
$pageTitle = "XR Learning — Xelerate Learning";
$pageDescription = "XR Learning resources, solutions, and FAQs.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">XR Learning</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Explore how XR learning can improve outcomes through immersive experience and measurable performance.
  </p>

  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/xr-solutions.php"); ?>">XR Solutions →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/faqs.php"); ?>">FAQ’s →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
