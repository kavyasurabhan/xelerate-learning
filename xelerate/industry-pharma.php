<?php
$pageTitle = "Pharma Examples — Xelerate Learning";
$pageDescription = "Examples of XR learning use cases in Pharma.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/industry.php"); ?>">← Back to Industry</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">Examples of Work in Pharma</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    XR learning can help pharma teams practice critical scenarios safely and consistently, while capturing data to measure competence.
    Below are example use-cases that can be delivered as immersive modules and tracked via analytics.
  </p>

  <div style="margin-top:18px;display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Safety &amp; compliance</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Practice hazard recognition and correct actions in controlled simulations; reinforce procedures and compliance behavior.
      </div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Standard operating procedures</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Step-by-step procedural learning for critical workflows, with repeatable practice and performance measurement.
      </div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Incident response</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Train decision-making under pressure, time-to-response, and correct escalation paths with realistic scenarios.
      </div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h2 style="margin:0 0 8px;font-size:18px;">Communication &amp; soft skills</h2>
      <div style="color:var(--muted);line-height:1.75;">
        Role-play stakeholder conversations and improve confidence in a measurable way.
      </div>
    </div>
  </div>
</div>

<div class="panel section" style="margin-top:18px;">
  <h2 style="margin:0;font-size:22px;letter-spacing:-.2px;">What you can measure</h2>
  <div style="margin-top:12px;color:var(--muted);line-height:1.85;">
    With xAPI-enabled scenarios, you can track:
    <ul style="margin:10px 0 0;padding-left:18px;color:var(--muted);line-height:1.85;">
      <li>Decisions made and correct/incorrect actions</li>
      <li>Time-to-response and hesitation points</li>
      <li>Common errors across cohorts and locations</li>
      <li>Where additional interventions are needed</li>
    </ul>
  </div>

  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Discuss a pharma pilot →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/platforms.php"); ?>">Platforms →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/faqs.php"); ?>">FAQ’s →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
