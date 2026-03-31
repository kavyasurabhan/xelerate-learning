<?php
$pageTitle = "About Us — Xelerate Learning";
$pageDescription = "Learn about Xelerate Learning, our approach to experience learning, and our team.";

require_once __DIR__ . "/includes/header.php";

?>

<!-- COMPANY INTRO -->
<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:36px;">About Xelerate Learning</h1>

  <p style="max-width:85ch;color:var(--muted);line-height:1.8;margin-top:14px;">
    Xelerate Learning provides a cloud-based learning and data platform and a growing library of XR courses and components.
    We help organizations train and educate using immersive VR/AR experiences with measurable outcomes.
  </p>

  <p style="max-width:85ch;color:var(--muted);line-height:1.8;margin-top:14px;">
    Experience learning takes its cue from games as well as traditional education and can be non-linear and self-managed by the learner.
    Measuring performance as learners engage enables better metrics and better results.
  </p>
</div>

<!-- VISION & MISSION -->
<div class="panel section" style="margin-top:22px;">
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:24px;">

    <div class="panel" style="padding:22px;background:rgba(0,0,0,.18);">
      <h3>Our Vision</h3>
      <p style="color:var(--muted);line-height:1.7;">
        To deliver experience-led learning that improves performance across industries through immersive XR.
      </p>
    </div>

    <div class="panel" style="padding:22px;background:rgba(0,0,0,.18);">
      <h3>Our Mission</h3>
      <p style="color:var(--muted);line-height:1.7;">
        To help organizations deploy XR learning at scale and measure competence through data-driven analytics.
      </p>
    </div>

  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>