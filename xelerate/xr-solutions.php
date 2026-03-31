<?php
$pageTitle = "XR Solutions — Xelerate Learning";
$pageDescription = "XR solutions for soft skills, safety, technical training, and wellbeing.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-learning.php"); ?>">← Back to XR Learning</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">XR Solutions</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Deliver training experiences via the cloud across devices — from VR headsets to mobile — wherever your learners are.
    XR learning is most effective when it’s paired with measurement, helping you understand performance and improve outcomes.
  </p>

  <div style="margin-top:18px;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:14px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Soft Skills</h2>
      <div style="color:var(--muted);line-height:1.75;">Communication, presence, leadership, and confidence in realistic scenarios.</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Health &amp; Safety / Compliance</h2>
      <div style="color:var(--muted);line-height:1.75;">Reinforce correct behaviors with repeatable practice in controlled simulations.</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Technical Training</h2>
      <div style="color:var(--muted);line-height:1.75;">Spatial and procedural training for complex environments or equipment.</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Relaxation / Wellbeing</h2>
      <div style="color:var(--muted);line-height:1.75;">Guided immersive experiences designed to support calm and wellbeing.</div>
    </div>
  </div>

  <div class="panel" style="margin-top:18px;padding:18px;background:rgba(0,0,0,.18);">
    <h2 style="margin:0 0 8px;font-size:18px;">Measurement &amp; analytics</h2>
    <div style="color:var(--muted);line-height:1.8;">
      XR training can measure competence rather than completion. Using xAPI instrumentation, you can record decisions,
      movements, time-to-response, and outcomes — then review performance across individuals and cohorts on the web dashboard.
    </div>
  </div>

  <div class="panel" style="margin-top:14px;padding:18px;background:rgba(0,0,0,.18);">
    <h2 style="margin:0 0 8px;font-size:18px;">Typical delivery approach</h2>
    <ol style="margin:10px 0 0;color:var(--muted);line-height:1.85;padding-left:18px;">
      <li>Define outcomes and success metrics</li>
      <li>Run a pilot with a small cohort</li>
      <li>Review analytics and iterate modules</li>
      <li>Scale rollout across teams/locations</li>
    </ol>
  </div>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Discuss your use case →</a>
    <a class="btn" style="margin-left:10px;" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">Browse products →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
