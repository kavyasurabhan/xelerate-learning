<?php
$pageTitle = "Services — Xelerate Learning";
$pageDescription = "Xelerate Learning supports immersive learning delivery, XR content enablement, and measurement/analytics for experience learning.";

require_once __DIR__ . "/includes/header.php";
$base = $basePath ?? "";
?>

<style>
.service-card {
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}
.service-card:hover {
  transform: translateY(-6px);
  border-color: rgba(var(--brand-rgb), .35);
  box-shadow: 0 20px 50px rgba(0,0,0,.45);
}

/* Icon container */
.icon-box {
  width:100%;
  height:180px;
  border-radius:20px;
  overflow:hidden;
  border:1px solid rgba(255,255,255,.12);
  margin-bottom:18px;
  background:rgba(255,255,255,.05);
}

.icon-box img {
  width:100%;
  height:100%;
  object-fit:cover;
  filter:none;
  transition: transform .35s ease;
}

.service-card:hover .icon-box img {
  transform: scale(1.05);
}
</style>

<section class="panel section" style="margin-top:18px;">
  <header>
    <h1 style="font-size:36px;letter-spacing:-.4px;">Enterprise Technology Services</h1>
    <p style="max-width:85ch;color:var(--muted);line-height:1.7;margin-top:12px;">
      Xelerate Learning supports organizations with immersive learning delivery and analytics — from pilot design
      through rollout — helping you measure competence through experience.
    </p>
  </header>
</section>

<section class="panel section" style="margin-top:22px;">
  <h2 style="font-size:22px;margin-bottom:20px;">Core Service Areas</h2>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:26px;">

    <!-- AI Engineering -->
    <article class="panel service-card" style="padding:26px;background:rgba(0,0,0,.18);border:1px solid rgba(255,255,255,.08);border-radius:20px;">
      <div class="icon-box">
        <img src="<?php echo htmlspecialchars(assetUrl("assets/services/ai")); ?>" alt="Analytics & Measurement">
      </div>
      <h3 style="margin-bottom:10px;">Measurement & Analytics</h3>
      <p style="color:var(--muted);line-height:1.7;">
        xAPI-ready tracking and reporting to understand how individuals and cohorts perform — and where interventions are needed.
      </p>
      <ul style="margin-top:14px;color:var(--muted);line-height:1.7;padding-left:18px;">
        <li>Competence vs completion reporting</li>
        <li>Time-to-response and decision analysis</li>
        <li>Cohort comparisons and trends</li>
        <li>Data export and integration support</li>
      </ul>
    </article>

    <!-- XR VR -->
    <article class="panel service-card" style="padding:26px;background:rgba(0,0,0,.18);border:1px solid rgba(255,255,255,.08);border-radius:20px;">
      <div class="icon-box">
        <img src="<?php echo htmlspecialchars(assetUrl("assets/services/xr")); ?>" alt="Immersive XR/VR">
      </div>
      <h3 style="margin-bottom:10px;">Immersive XR / VR</h3>
      <p style="color:var(--muted);line-height:1.7;">
        Development of immersive learning environments and simulation systems
        for training, education, and enterprise scenarios.
      </p>
      <ul style="margin-top:14px;color:var(--muted);line-height:1.7;padding-left:18px;">
        <li>Virtual Learning Labs</li>
        <li>AR Applications</li>
        <li>Simulation Platforms</li>
        <li>Interactive Training Systems</li>
      </ul>
    </article>

    <!-- Blockchain -->
    <article class="panel service-card" style="padding:26px;background:rgba(0,0,0,.18);border:1px solid rgba(255,255,255,.08);border-radius:20px;">
      <div class="icon-box">
        <img src="<?php echo htmlspecialchars(assetUrl("assets/services/blockchain")); ?>" alt="Learning Delivery & Rollout">
      </div>
      <h3 style="margin-bottom:10px;">Learning Delivery & Rollout</h3>
      <p style="color:var(--muted);line-height:1.7;">
        Structured pilots and scalable rollout planning across devices, teams, and locations — with clear success metrics.
      </p>
      <ul style="margin-top:14px;color:var(--muted);line-height:1.7;padding-left:18px;">
        <li>Pilot design and success metrics</li>
        <li>Content mapping to outcomes</li>
        <li>Rollout playbooks and enablement</li>
        <li>Operational analytics review</li>
      </ul>
    </article>

    <!-- Cybersecurity -->
    <article class="panel service-card" style="padding:26px;background:rgba(0,0,0,.18);border:1px solid rgba(255,255,255,.08);border-radius:20px;">
      <div class="icon-box">
        <img src="<?php echo htmlspecialchars(assetUrl("assets/services/cyber")); ?>" alt="Security & Deployment">
      </div>
      <h3 style="margin-bottom:10px;">Security & Deployment</h3>
      <p style="color:var(--muted);line-height:1.7;">
        Practical deployment support for production-ready delivery, privacy-aware measurement, and secure operations.
      </p>
      <ul style="margin-top:14px;color:var(--muted);line-height:1.7;padding-left:18px;">
        <li>Secure content delivery</li>
        <li>Privacy-aware analytics</li>
        <li>Operational hardening and support</li>
        <li>Compliance-aligned practices</li>
      </ul>
    </article>

  </div>
</section>

<div class="panel section" style="margin-top:24px;">

  <div style="display:grid;grid-template-columns: 1.2fr .8fr;gap:24px;align-items:center;">
    
    <!-- LEFT CONTENT -->
    <div>
      <h2 style="margin:0;font-size:26px;">Tech Training Programs</h2>
      <div style="color:var(--muted);font-size:14px;margin-top:6px;">
        Future-ready skills for individuals and organizations.
      </div>

      <p style="color:var(--muted);line-height:1.8;margin-top:16px;">
        Our Tech Training Programs are designed to equip learners, professionals,
        and institutions with practical, industry-aligned skills in high-demand
        technology domains. We emphasize hands-on implementation,
        real-world case studies, and mentor-guided development.
      </p>

      <div style="margin-top:20px;display:flex;gap:12px;flex-wrap:wrap;">
        <a href="<?php echo htmlspecialchars($base . "/contact.php"); ?>" class="btn primary">
          Request Training Details →
        </a>
        <a href="<?php echo htmlspecialchars($base . "/contact.php"); ?>" class="btn">
          Corporate Training →
        </a>
      </div>
    </div>

    <!-- RIGHT IMAGE -->
    <div style="border-radius:22px;overflow:hidden;border:1px solid rgba(255,255,255,.12);">
      <img src="<?php echo htmlspecialchars(assetUrl("assets/services/training")); ?>"
           alt="Tech Training Programs"
           style="width:100%;height:320px;object-fit:cover;">
    </div>

  </div>


    

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:22px;">
    
    <div class="mini-card">
      <strong>Data Science & AI</strong>
      <div style="color:var(--muted);margin-top:6px;">
        Machine Learning, Deep Learning, predictive analytics, real-world datasets, and AI deployment.
      </div>
    </div>

    <div class="mini-card">
      <strong>Cybersecurity</strong>
      <div style="color:var(--muted);margin-top:6px;">
        Ethical hacking fundamentals, network security, threat detection, and enterprise-grade security practices.
      </div>
    </div>

    <div class="mini-card">
      <strong>Web & Application Development</strong>
      <div style="color:var(--muted);margin-top:6px;">
        Modern frontend & backend technologies, APIs, cloud deployment, and scalable system architecture.
      </div>
    </div>

    <div class="mini-card">
      <strong>Digital Marketing & Growth</strong>
      <div style="color:var(--muted);margin-top:6px;">
        SEO, performance marketing, analytics, branding strategy, and digital campaign execution.
      </div>
    </div>

  </div>

  <div style="margin-top:24px;display:flex;gap:12px;flex-wrap:wrap;">
    <a href="<?php echo htmlspecialchars($base . "/contact.php"); ?>" class="btn primary">
      Request Training Details →
    </a>
    <a href="<?php echo htmlspecialchars($base . "/contact.php"); ?>" class="btn">
      Partner With Us →
    </a>
  </div>

</div>
</div>
<section class="panel section" style="margin-top:24px;">
  <h2 style="font-size:22px;margin-bottom:18px;">Our Engineering Process</h2>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;text-align:center;">
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.16);">1. Strategy & Planning</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.16);">2. Architecture & Design</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.16);">3. Development & Testing</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.16);">4. Deployment & Optimization</div>
  </div>

  <div style="margin-top:24px;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Start a Project →</a>
  </div>
</section>

<?php require_once __DIR__ . "/includes/footer.php"; ?>