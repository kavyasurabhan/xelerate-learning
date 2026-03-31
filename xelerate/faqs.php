<?php
$pageTitle = "FAQ’s — Xelerate Learning";
$pageDescription = "Frequently asked questions about XR learning, measurement, and delivery.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<div class="panel section" style="margin-top:18px;">
  <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-learning.php"); ?>">← Back to XR Learning</a>
</div>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;letter-spacing:-.4px;margin:0;">FAQ’s</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Answers to common questions about XR learning, measurement, and rollout.
  </p>
</div>

<div class="panel section" style="margin-top:18px;">
  <div style="display:grid;gap:12px;">
    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">Can I measure performance?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Yes. The key difference between XR/VR training and traditional digital/classroom methods is that XR can measure competence rather than completion.
        Scenarios can be delivered with xAPI so you can record decisions, actions, and time-to-response.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">What kinds of training work best in VR?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Scenarios involving risk, cost, distance, or complexity are a strong fit — including safety/compliance, technical procedures,
        soft skills, and simulations where spatial awareness matters.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">Which devices are supported?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Content can be delivered across devices — from VR headsets to mobile experiences — depending on the module and deployment model.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">Do you support multiple languages?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Yes. Training content can be localized for different languages and regions as part of the rollout plan.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">How do pilots work?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Typically: define outcomes → pilot cohort → review analytics → iterate → scale rollout.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">What analytics will I see?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        You can review how individuals perform, how groups compare, time-to-response, common errors,
        and which parts of a scenario may require additional interventions.
      </div>
    </details>

    <details class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <summary style="cursor:pointer;font-weight:800;">Can we integrate with our LMS?</summary>
      <div style="margin-top:10px;color:var(--muted);line-height:1.8;">
        Often yes. Integration options depend on your LMS and reporting needs; we can align on xAPI/LRS and data flows during discovery.
      </div>
    </details>
  </div>

  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Ask a question →</a>
    <a class="btn" style="margin-left:10px;" href="<?php echo htmlspecialchars($base . "/xr-solutions.php"); ?>">View XR Solutions →</a>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
