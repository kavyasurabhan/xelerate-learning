<?php
$pageTitle = "Industry — Xelerate Learning";
$pageDescription = "Industry examples and case studies for XR learning and performance measurement.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">Industry</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    XR learning works best when it targets high-impact situations: risky environments, expensive equipment,
    hard-to-reach locations, and scenarios where spatial awareness and decision-making matter.
    Below are example industry areas and how experience learning can be applied.
  </p>

  <div style="margin-top:18px;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:14px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Pharma</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Safety, procedures, compliance, and communication training with measurable competence.
      </div>
      <div style="margin-top:14px;">
        <a class="btn primary" href="<?php echo htmlspecialchars($base . "/industry-pharma.php"); ?>">View examples →</a>
      </div>
    </div>

    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Health &amp; Safety</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Repeatable practice for hazard recognition and correct response in controlled simulations.
      </div>
      <div style="margin-top:14px;">
        <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-solutions.php"); ?>">Explore solutions →</a>
      </div>
    </div>

    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Technical Training</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Spatial and procedural learning for complex environments, tools, and workflows.
      </div>
      <div style="margin-top:14px;">
        <a class="btn" href="<?php echo htmlspecialchars($base . "/products.php"); ?>">Browse products →</a>
      </div>
    </div>

    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Soft Skills</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Presentation, boardroom, and communication scenarios with performance measurement.
      </div>
      <div style="margin-top:14px;">
        <a class="btn" href="<?php echo htmlspecialchars($base . "/vr.php"); ?>">VR modules →</a>
      </div>
    </div>
  </div>
</div>

<div class="panel section" style="margin-top:18px;">
  <h2 style="margin:0;font-size:22px;letter-spacing:-.2px;">Measure outcomes, not completion</h2>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    XR learning can be instrumented with xAPI to capture decisions, actions, and time-to-response.
    This helps you understand competence across individuals and cohorts and identify where interventions are needed.
  </p>
  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Discuss a pilot →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/platforms.php"); ?>">Platforms →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
