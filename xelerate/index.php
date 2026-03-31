<?php
$pageTitle = "Xelerate Learning — Experience Learning with XR";
$pageDescription = "Xelerate Learning delivers cloud-based XR/VR/AR training and performance analytics, helping organizations measure competence through experience.";

require_once __DIR__ . "/includes/header.php";
?>

<!-- HERO -->
<div class="panel section hero-section">
  <div class="hero-grid">

    <!-- LEFT IMAGE -->
    <div class="hero-image" id="heroTilt">
      <img src="<?php echo htmlspecialchars(assetUrl("assets/hero-ai")); ?>" alt="XR training and performance analytics">
    </div>

    <!-- RIGHT CONTENT -->
    <div class="hero-content">
      <div class="hero-badge">
        <span class="dot"></span>
        Welcome to Xelerate Learning
      </div>

      <h1 class="hero-title">Experience Learning That You Can Measure</h1>

      <p class="hero-desc">
        Deliver immersive XR training and track real performance — not just completion.
      </p>

      <div class="hero-actions">
        <a class="btn primary" href="<?php echo htmlspecialchars(($basePath ?? "") . "/products.php"); ?>">Explore Products</a>
        <a class="btn" href="<?php echo htmlspecialchars(($basePath ?? "") . "/about.php"); ?>">Learn More</a>
      </div>
    </div>

  </div>
</div>

<!-- TRUST -->
<div class="panel section" style="margin-top:20px;">
  <div style="display:flex;align-items:baseline;justify-content:space-between;gap:12px;flex-wrap:wrap;">
    <h2 style="font-size:22px;letter-spacing:-.2px;margin:0;">Trusted by Teams Worldwide</h2>
    <div style="color:var(--muted);font-size:13px;">(placeholders)</div>
  </div>

  <div style="margin-top:14px;display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:12px;">
    <?php foreach (["Ericsson","BBC","Pharma Co.","Training Partner","Enterprise Client","Education Group"] as $logo): ?>
      <div class="panel" style="padding:14px;background:rgba(0,0,0,.18);text-align:center;font-weight:800;letter-spacing:.6px;opacity:.92;">
        <?php echo htmlspecialchars($logo); ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- FEATURES -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;margin:0;">Built for modern training teams</h2>
  <p style="color:var(--muted);max-width:90ch;line-height:1.8;margin-top:10px;">
    Deliver XR experiences, measure competence, and roll out across devices with a platform mindset.
  </p>

  <div style="margin-top:16px;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:14px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <div style="font-size:22px;font-weight:900;margin-bottom:10px;">XR Training</div>
      <div style="color:var(--muted);line-height:1.75;">Immersive modules for soft skills, safety, and technical learning.</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <div style="font-size:22px;font-weight:900;margin-bottom:10px;">Performance Tracking</div>
      <div style="color:var(--muted);line-height:1.75;">xAPI-ready measurement to analyze decisions, timing, and outcomes.</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <div style="font-size:22px;font-weight:900;margin-bottom:10px;">Multi-device Support</div>
      <div style="color:var(--muted);line-height:1.75;">Deliver via the cloud across VR headsets, desktop, and mobile.</div>
    </div>
  </div>
</div>

<!-- PRODUCT PREVIEW -->
<div class="panel section" style="margin-top:20px;">
  <div style="display:grid;grid-template-columns:1.05fr .95fr;gap:18px;align-items:center;">
    <div>
      <h2 style="font-size:22px;letter-spacing:-.2px;margin:0;">Product preview</h2>
      <p style="color:var(--muted);max-width:85ch;line-height:1.8;margin-top:10px;">
        See how modules, cohorts, and performance analytics come together in one workflow.
      </p>
      <div style="margin-top:14px;display:flex;gap:12px;flex-wrap:wrap;">
        <a class="btn primary" href="<?php echo htmlspecialchars(($basePath ?? "") . "/contact.php"); ?>">Request a demo</a>
        <a class="btn" href="<?php echo htmlspecialchars(($basePath ?? "") . "/products.php"); ?>">Browse products</a>
      </div>
    </div>
    <div class="panel" style="padding:0;background:rgba(0,0,0,.18);border-radius:22px;overflow:hidden;">
      <img loading="lazy" src="<?php echo htmlspecialchars(assetUrl("assets/hero-ai")); ?>"
           alt="Product preview"
           style="width:100%;height:320px;object-fit:cover;display:block;opacity:.92;">
    </div>
  </div>
</div>

<!-- WHAT IS EXPERIENCE LEARNING -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">What is Experience Learning?</h2>
  <p style="color:var(--muted);max-width:90ch;line-height:1.8;">
    As the name suggests, people learn best when they learn through experience. Measuring learners as they are
    experiencing learning enables better metrics and better outcomes. Experience learning takes its cue from
    games as well as traditional education and can be non-linear and self-managed by the student.
  </p>
  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars(($basePath ?? "") . "/products.php"); ?>">See our product library →</a>
  </div>
</div>

<!-- WHY XR / VR / AR -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">Why are XR, VR and AR so effective?</h2>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:18px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h3 style="margin:0 0 8px;font-size:16px;">Immersion</h3>
      <p style="margin:0;color:var(--muted);line-height:1.65;">Transport your senses to the virtual world.</p>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h3 style="margin:0 0 8px;font-size:16px;">Emotion</h3>
      <p style="margin:0;color:var(--muted);line-height:1.65;">See and feel the consequences of your actions.</p>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <h3 style="margin:0 0 8px;font-size:16px;">Experience</h3>
      <p style="margin:0;color:var(--muted);line-height:1.65;">Learn from your experiences.</p>
    </div>
  </div>
</div>

<!-- AREAS -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">In what areas does VR work well?</h2>
  <p style="color:var(--muted);max-width:95ch;line-height:1.8;">
    Training that involves potentially dangerous, hard-to-reach environments or expensive equipment; physically
    impossible scenarios; time travel; and simulations where spatial awareness is beneficial — are all great
    examples of where VR works well for training.
  </p>

  <div style="margin-top:16px;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;">
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">Soft Skills</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">Health &amp; Safety / Compliance</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">Technical Training</div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">Relaxation</div>
  </div>
</div>

<!-- MEASUREMENT -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">Can I measure performance?</h2>
  <p style="color:var(--muted);max-width:95ch;line-height:1.8;">
    <strong style="color:var(--text);">Yes</strong> — the key difference between VR training and traditional digital
    and classroom methods is that it measures competence rather than completion. Scenarios can be delivered with
    xAPI, allowing you to record decisions, actions, and time-to-response. Our web analytics can highlight how
    individuals and populations perform, and where interventions may be needed.
  </p>
  <div style="margin-top:16px;">
    <a class="btn primary" href="<?php echo htmlspecialchars(($basePath ?? "") . "/contact.php"); ?>">Request a demo →</a>
  </div>
</div>

<!-- STATS -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">Impact at a glance</h2>
  <div style="margin-top:16px;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;">
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <div style="font-size:28px;font-weight:900;letter-spacing:-.5px;">15+</div>
      <div style="color:var(--muted);margin-top:6px;line-height:1.6;">Industries supported</div>
    </div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <div style="font-size:28px;font-weight:900;letter-spacing:-.5px;">10+</div>
      <div style="color:var(--muted);margin-top:6px;line-height:1.6;">Languages delivered</div>
    </div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <div style="font-size:28px;font-weight:900;letter-spacing:-.5px;">300+</div>
      <div style="color:var(--muted);margin-top:6px;line-height:1.6;">Partners worldwide</div>
    </div>
    <div class="panel" style="padding:16px;background:rgba(0,0,0,.18);">
      <div style="font-size:28px;font-weight:900;letter-spacing:-.5px;">87%</div>
      <div style="color:var(--muted);margin-top:6px;line-height:1.6;">Reduction in errors (typical)</div>
    </div>
  </div>
</div>

<!-- TESTIMONIALS -->
<div class="panel section" style="margin-top:20px;">
  <h2 style="font-size:22px;letter-spacing:-.2px;">From some of our best clients</h2>
  <div style="margin-top:16px;display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px;">
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <p style="margin:0;color:var(--muted);line-height:1.75;">
        Hats off to your great team on all their efforts throughout this phase — they’ve done an incredible job
        and the results are fantastic! I’m very proud of what we’ve achieved working together.
      </p>
      <div style="margin-top:12px;font-weight:800;">Ericsson</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <p style="margin:0;color:var(--muted);line-height:1.75;">
        It all worked out really well — thanks to your skills and great work to make it happen, and make it so good.
        It’s been a real pleasure and an education for me. I do hope we can go on to do some more.
      </p>
      <div style="margin-top:12px;font-weight:800;">Charles, BBC</div>
    </div>
    <div class="panel" style="padding:18px;background:rgba(0,0,0,.18);">
      <p style="margin:0;color:var(--muted);line-height:1.75;">
        I just updated my TestFlight app &amp; pushed a PDF deck using the share feature. In one word this method is
        “AWESOME!!” Works very well — so much more straightforward than the current method &amp; easier to operate for our people.
      </p>
      <div style="margin-top:12px;font-weight:800;">Guy Wilkins</div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>