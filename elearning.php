<?php
$pageTitle = "Elearning Courses — Xelerate Learning";
$pageDescription = "Explore Xelerate Learning elearning courses including ACES, public speaking, and health & safety.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">← Back to Products</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">Elearning Courses</h1>
  <p style="max-width:90ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Flexible digital learning designed to support real-world performance. This is a starter placeholder page.
  </p>
</div>

<div class="panel section" style="margin-top:18px;">
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px;">
    <div class="panel" id="aces" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">ACES</h2>
      <div style="color:var(--muted);line-height:1.7;">Structured course with clear progress and outcomes.</div>
    </div>
    <div class="panel" id="public-speaking" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Public Speaking</h2>
      <div style="color:var(--muted);line-height:1.7;">Confidence, clarity, and audience engagement.</div>
    </div>
    <div class="panel" id="health-safety" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Health and Safety</h2>
      <div style="color:var(--muted);line-height:1.7;">Compliance-ready learning with retention focus.</div>
    </div>
    <div class="panel" id="examples" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Elearning Examples</h2>
      <div style="color:var(--muted);line-height:1.7;">Formats, interactions, assessments, and templates.</div>
    </div>
  </div>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request course demo →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
