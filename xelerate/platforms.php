<?php
$pageTitle = "Platforms — Xelerate Learning";
$pageDescription = "XR and elearning delivery platforms with performance analytics.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">← Back to Products</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">Platforms</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Deliver learning experiences via the cloud across devices — from VR headsets to mobile apps — and analyze outcomes on the web.
    This is a starter placeholder page.
  </p>
</div>

<div class="panel section" style="margin-top:18px;">
  <div class="panel" id="xr-platform" style="padding:18px;background:rgba(0,0,0,.18);">
    <h2 style="margin:0 0 8px;font-size:20px;">XR Platform</h2>
    <div style="color:var(--muted);line-height:1.75;">
      Manage XR content delivery, cohorts, and performance analytics for immersive training.
    </div>
  </div>

  <div class="panel" id="elearning-platform" style="padding:18px;background:rgba(0,0,0,.18);margin-top:14px;">
    <h2 style="margin:0 0 8px;font-size:20px;">Elearning Platform</h2>
    <div style="color:var(--muted);line-height:1.75;">
      Deploy elearning at scale with reporting, tracking, and administrative tools.
    </div>
  </div>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Discuss platform setup →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
