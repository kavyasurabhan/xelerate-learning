<?php
$pageTitle = "Products — Xelerate Learning";
$pageDescription = "Explore Xelerate Learning products including SSAI solutions, VR modules, elearning courses, and platforms.";

require_once __DIR__ . "/includes/header.php";

$base = $basePath ?? "";
$img = $base . "/assets/products";
$imgNoExt = "assets/products";

$productGroups = [
  [
    "title" => "SSAI",
    "subtitle" => "Experience-led solutions for organizations and education.",
    "items" => [
      [
        "name" => "SSAI Corporate",
        "status" => "Available",
        "desc" => "XR-enabled corporate learning focused on competence measurement and scalable rollout.",
        "href" => $base . "/products-ssai-corporate.php",
        "image" => assetUrl($imgNoExt . "/omniai"),
      ],
      [
        "name" => "SSAI Education",
        "status" => "Available",
        "desc" => "Education-focused XR learning experiences with analytics to support learner outcomes.",
        "href" => $base . "/products-ssai-education.php",
        "image" => assetUrl($imgNoExt . "/schoolos"),
      ],
    ],
  ],
  [
    "title" => "VR Modules",
    "subtitle" => "Immersive scenarios for soft skills, safety, and wellbeing.",
    "items" => [
      [
        "name" => "Earth to Mars",
        "status" => "Module",
        "desc" => "A high-engagement VR experience designed to build confidence through experiential learning.",
        "href" => $base . "/vr.php#earth-to-mars",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
      [
        "name" => "Presentation Skills",
        "status" => "Module",
        "desc" => "Practice delivery, pacing, and confidence in realistic virtual environments.",
        "href" => $base . "/vr.php#presentation-skills",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
      [
        "name" => "Boardroom Skills",
        "status" => "Module",
        "desc" => "Train decision-making, communication, and presence in high-stakes scenarios.",
        "href" => $base . "/vr.php#boardroom-skills",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
      [
        "name" => "Fire Safety",
        "status" => "Module",
        "desc" => "Reinforce safety behaviors and correct responses in a controlled simulation.",
        "href" => $base . "/vr.php#fire-safety",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
      [
        "name" => "Well Being",
        "status" => "Module",
        "desc" => "Support wellbeing with calming, guided immersive environments.",
        "href" => $base . "/vr.php#well-being",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
    ],
  ],
  [
    "title" => "Elearning Courses",
    "subtitle" => "Flexible digital learning with practical outcomes.",
    "items" => [
      [
        "name" => "ACES",
        "status" => "Course",
        "desc" => "A structured elearning course designed for clear progress and practical application.",
        "href" => $base . "/elearning.php#aces",
        "image" => assetUrl($imgNoExt . "/englishskill"),
      ],
      [
        "name" => "Public Speaking",
        "status" => "Course",
        "desc" => "Build clarity, confidence, and structure through guided practice and reflection.",
        "href" => $base . "/elearning.php#public-speaking",
        "image" => assetUrl($imgNoExt . "/englishskill"),
      ],
      [
        "name" => "Health and Safety",
        "status" => "Course",
        "desc" => "Compliance-ready learning with focus on safe behavior and retention.",
        "href" => $base . "/elearning.php#health-safety",
        "image" => assetUrl($imgNoExt . "/englishskill"),
      ],
      [
        "name" => "Elearning Examples",
        "status" => "Library",
        "desc" => "Explore examples of course formats, interactions, and assessment styles.",
        "href" => $base . "/elearning.php#examples",
        "image" => assetUrl($imgNoExt . "/englishskill"),
      ],
    ],
  ],
  [
    "title" => "Platforms",
    "subtitle" => "Deliver training via the cloud across devices.",
    "items" => [
      [
        "name" => "XR Platform",
        "status" => "Platform",
        "desc" => "Manage XR content delivery and analyze performance across cohorts.",
        "href" => $base . "/platforms.php#xr-platform",
        "image" => assetUrl($imgNoExt . "/xr-lab"),
      ],
      [
        "name" => "Elearning Platform",
        "status" => "Platform",
        "desc" => "Deploy elearning at scale with reporting, tracking, and administration.",
        "href" => $base . "/platforms.php#elearning-platform",
        "image" => assetUrl($imgNoExt . "/englishskill"),
      ],
    ],
  ],
];
?>

<div class="panel section">
  <h1 style="font-size:34px;">Products</h1>
  <p style="max-width:90ch;color:var(--muted);line-height:1.8;">
    Explore our XR/VR learning products, elearning course library, and delivery platforms.
    If you’d like a tailored demo, we can map the right modules to your use case.
  </p>
  <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap;">
    <a class="btn primary" href="<?php echo htmlspecialchars($base . "/contact.php"); ?>">Request a demo →</a>
    <a class="btn" href="<?php echo htmlspecialchars($base . "/xr-solutions.php"); ?>">XR Solutions →</a>
  </div>
</div>

<div class="panel section" style="margin-top:18px;">
  <?php foreach ($productGroups as $group): ?>
    <div style="display:flex;align-items:baseline;justify-content:space-between;gap:12px;flex-wrap:wrap;">
      <div>
        <h2 style="margin:0;font-size:22px;letter-spacing:-.2px;"><?php echo htmlspecialchars($group["title"]); ?></h2>
        <div style="margin-top:6px;color:var(--muted);max-width:90ch;line-height:1.7;">
          <?php echo htmlspecialchars($group["subtitle"]); ?>
        </div>
      </div>
    </div>

    <div style="margin-top:16px;display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:22px;">
      <?php foreach ($group["items"] as $p): ?>
        <a href="<?php echo htmlspecialchars($p["href"]); ?>"
           style="display:block;border:1px solid rgba(255,255,255,.10);
                  background:rgba(0,0,0,.18);
                  border-radius:20px;
                  overflow:hidden;
                  transition:transform .15s ease; text-decoration:none; color:inherit;">

          <div style="height:180px;overflow:hidden;background:#111;">
            <img src="<?php echo htmlspecialchars($p["image"]); ?>"
                 alt="<?php echo htmlspecialchars($p["name"]); ?>"
                 style="width:100%;height:100%;object-fit:cover;">
          </div>

          <div style="padding:20px;position:relative;">

            <div style="position:absolute;top:-14px;right:16px;
                        padding:6px 12px;border-radius:999px;
                        font-size:12px;font-weight:700;
                        background:rgba(var(--brand-rgb), .85);">
              <?php echo htmlspecialchars($p["status"]); ?>
            </div>

            <h3 style="margin:10px 0 10px;font-size:18px;">
              <?php echo htmlspecialchars($p["name"]); ?>
            </h3>

            <p style="color:var(--muted);line-height:1.6;font-size:14px;margin:0;">
              <?php echo htmlspecialchars($p["desc"]); ?>
            </p>

            <div style="margin-top:16px;">
              <span class="btn primary">View →</span>
            </div>

          </div>

        </a>
      <?php endforeach; ?>
    </div>

    <div style="height:1px;background:rgba(255,255,255,.06);margin:26px 0;"></div>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>