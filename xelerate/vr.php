<?php
$pageTitle = "VR Modules — Xelerate Learning";
$pageDescription = "Explore Xelerate Learning VR modules for soft skills, safety, and wellbeing.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">← Back to Products</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">VR Modules</h1>
  <p style="max-width:90ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    A growing library of immersive scenarios. Each module can be delivered via the cloud and instrumented for performance analytics.
  </p>
</div>

<div class="panel section" style="margin-top:18px;">
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px;">
    <div class="panel" id="earth-to-mars" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Earth to Mars</h2>
      <div style="color:var(--muted);line-height:1.7;">High-engagement experiential learning scenario.</div>
    </div>
    <div class="panel" id="presentation-skills" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Presentation Skills</h2>
      <div style="color:var(--muted);line-height:1.7;">Practice confidence, pacing, and delivery.</div>
    </div>
    <div class="panel" id="boardroom-skills" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Boardroom Skills</h2>
      <div style="color:var(--muted);line-height:1.7;">Communication and decision-making under pressure.</div>
    </div>
    <div class="panel" id="fire-safety" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Fire Safety</h2>
      <div style="color:var(--muted);line-height:1.7;">Reinforce correct safety behavior in simulation.</div>
    </div>
    <div class="panel" id="well-being" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Well Being</h2>
      <div style="color:var(--muted);line-height:1.7;">Support relaxation and wellbeing with guided immersive experiences.</div>
    </div>
  </div>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request module demo →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
