<?php
// /includes/header.php
require_once __DIR__ . "/site.php";

$pageTitle = $pageTitle ?? ($company . " — " . $tagline);
$pageDescription = $pageDescription ?? "Xelerate Learning delivers immersive XR/VR/AR training experiences and performance analytics to help organizations measure competence through experience.";

$assetBase = $basePath ?? "";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>

  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>" />
  <meta name="theme-color" content="#1b0014" />

  <style>
    :root{
      /* UI plan base */
      --bg:#0a0a0f;
      --bg2:#06060a;
      --card:#0f0f16;
      --card2:#0a0a10;
      --card-rgb: 15, 15, 22;
      --card2-rgb: 10, 10, 16;
      --text:#fff2fb;
      --muted:#d7b8c9;
      --line:rgba(255,255,255,.10);

      /* UI plan colors */
      --brand:#7b2cff;              /* secondary (purple) */
      --brand2:#ff007f;             /* primary (pink) */
      --brand-rgb: 123, 44, 255;
      --brand2-rgb: 255, 0, 127;

      --warn:#f59e0b;
      --shadow: 0 10px 30px rgba(0,0,0,.40);
      --shadow2: 0 18px 55px rgba(0,0,0,.45);
      --radius: 18px;
      --radius2: 22px;
    }

    *{box-sizing:border-box}

    body{
      margin:0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
      color:var(--text);
      background:
        radial-gradient(circle at 70% 40%, rgba(var(--brand2-rgb), .15), transparent 60%),
        radial-gradient(circle at 18% 12%, rgba(var(--brand-rgb), .16), transparent 62%),
        radial-gradient(circle at 88% 18%, rgba(var(--brand2-rgb), .10), transparent 65%),
        linear-gradient(180deg, var(--bg), var(--bg2));
      min-height:100vh;
      display:flex;
      flex-direction:column;
    }

    a{color:inherit;text-decoration:none}
    .wrap{
      max-width:1100px;
      width:100%;
      margin:0 auto;
      padding:24px;
      flex:1;
      display:flex;
      flex-direction:column;
    }

    /* ===== Moving Web Canvas Background ===== */
    #webCanvas{
      position:fixed;
      inset:0;
      width:100%;
      height:100%;
      z-index:-5;
      pointer-events:none;
      opacity:.28;   /* brighter canvas presence */
    }

    .topbar{
      display:flex;align-items:center;justify-content:space-between;
      padding:10px 0; gap:12px;
    }

    .logo{
      display:flex; align-items:center; gap:12px;
      font-weight:800; letter-spacing:.2px;
    }

    .site-logo{
      height:66px;
      width:auto;
      object-fit:contain;
      display:block;
    }

    .nav{
      display:flex; gap:14px; flex-wrap:wrap;
      color: var(--muted);
      font-size:14px;
      align-items:center;
    }
    .nav a{padding:8px 10px;border-radius:12px; position:relative;}
    .nav a:hover{background: rgba(255,255,255,.05); color: var(--text);}
    .nav a.active{
      background: rgba(255,255,255,.06);
      color: var(--text);
      border:1px solid rgba(255,255,255,.12);
    }
    .mono{font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono","Courier New", monospace;}

    /* Professional hover underline */
    .nav a::after{
      content:"";
      position:absolute;
      left:10px;
      right:10px;
      bottom:5px;
      height:2px;
      border-radius:999px;
      background: linear-gradient(90deg, rgba(var(--brand2-rgb),.0), rgba(var(--brand2-rgb),.9), rgba(var(--brand2-rgb),.0));
      transform: scaleX(0);
      transform-origin:center;
      transition: transform .22s ease;
      opacity:.9;
    }
    .nav a:hover::after{ transform: scaleX(1); }

    /* ===== Dropdown Nav ===== */
    .nav-item{position:relative; display:flex; align-items:center;}
    .nav-link{display:inline-flex; align-items:center; gap:8px;}
    .nav-caret{opacity:.85; font-size:12px; transform: translateY(-1px);}

    .dropdown{
      position:absolute;
      top: calc(100% + 8px);
      left: 0;
      min-width: 240px;
      padding: 8px;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.12);
      background: linear-gradient(180deg, rgba(var(--card-rgb), .96), rgba(var(--card2-rgb), .94));
      box-shadow: var(--shadow2);
      display:none;
      z-index: 999;
    }

    .dropdown a{
      display:flex;
      justify-content:space-between;
      align-items:center;
      padding: 10px 12px;
      border-radius: 12px;
      color: rgba(234,240,255,.92);
    }

    .dropdown a:hover{
      background: rgba(255,255,255,.06);
      color: var(--text);
    }

    .dropdown .submenu{
      position:absolute;
      top: 0;
      left: calc(100% + 8px);
      min-width: 240px;
    }

    .nav-item:hover > .dropdown{display:block;}
    .dropdown-item{position:relative;}
    .dropdown-item:hover > .submenu{display:block;}

    @media (max-width: 900px){
      /* On small screens keep nav simple; dropdowns appear under parent on hover-capable devices only */
      .dropdown{position:static; box-shadow:none; margin-top:6px;}
      .nav-item:hover > .dropdown{display:none;}
    }

    .panel{
      border:1px solid var(--line);
      background: linear-gradient(180deg, rgba(var(--card-rgb), .88), rgba(var(--card2-rgb), .82));
      border-radius: var(--radius2);
      box-shadow: var(--shadow);
      overflow:hidden;
      position:relative;
    }

    /* subtle top highlight for panels */
    .panel::before{
      content:"";
      position:absolute;
      inset:0;
      pointer-events:none;
      background: radial-gradient(800px 220px at 20% 0%, rgba(255,255,255,.06), transparent 60%);
      opacity:.9;
    }

    /* keep content above highlight */
    .panel > *{ position:relative; z-index:1; }

    .section{margin-top:18px;padding: 22px;}
    .section h1,.section h2{margin:0 0 10px}
    .section p{color:var(--muted); line-height:1.7}

    /* Buttons */
    .btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      padding:10px 14px;
      border-radius:14px;
      border:1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.05);
      color: rgba(234,240,255,.95);
      font-size:14px;
      transition: transform .16s ease, background .16s ease, border-color .16s ease, box-shadow .16s ease;
      box-shadow: 0 10px 26px rgba(0,0,0,.20);
    }
    .btn:hover{
      transform: translateY(-2px);
      background: rgba(255,255,255,.07);
      border-color: rgba(255,255,255,.20);
      box-shadow: 0 18px 42px rgba(0,0,0,.35);
    }
    .btn.primary{
      border-color: rgba(var(--brand-rgb), .35);
      background: linear-gradient(135deg, rgba(var(--brand-rgb), .95), rgba(var(--brand2-rgb), .78));
      box-shadow: 0 18px 50px rgba(var(--brand-rgb), .22);
    }
    .btn.primary:hover{
      border-color: rgba(var(--brand-rgb), .55);
      box-shadow: 0 26px 70px rgba(var(--brand-rgb), .26);
    }

    /* ===== HERO LAYOUT ===== */
    .hero-section{ padding:42px 34px; }

    /* Home hero: force black panel background */
    .panel.hero-section{
      background: linear-gradient(180deg, rgba(0,0,0,.92), rgba(0,0,0,.84));
    }
    .panel.hero-section::before{ opacity: 0; }

    .hero-grid{
      display:grid;
      grid-template-columns: 1fr 1fr;
      align-items:stretch;   /* makes both columns equal height */
      gap:56px;
    }

    .hero-content{
      max-width:640px;
      height:100%;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }

    .hero-badge{
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding:8px 14px;
      border-radius:999px;
      border:1px solid rgba(255,255,255,.12);
      background: rgba(0,0,0,.28);
      backdrop-filter: blur(10px);
      color: rgba(255,255,255,.86);
      font-size:13px;
      margin-bottom:18px;
      width:fit-content;
    }
    .hero-badge{
      box-shadow: 0 0 0 1px rgba(var(--brand2-rgb), .20), 0 10px 32px rgba(0,0,0,.35);
    }

    .hero-badge .dot{
      width:10px; height:10px; border-radius:999px;
      background:var(--brand2);
      box-shadow:0 0 0 6px rgba(var(--brand2-rgb), .12);
    }

    .hero-title{
      font-size:48px;
      line-height:1.05;
      letter-spacing:-1px;
      margin:0 0 18px;
      text-shadow: 0 10px 40px rgba(var(--brand-rgb), .22);
    }

    .hero-desc{
      font-size:17px;
      line-height:1.75;
      color:var(--muted);
      margin:0;
    }

    .hero-actions{
      margin-top:28px;
      display:flex;
      gap:14px;
      flex-wrap:wrap;
    }

    /* Hero entrance animation */
    @keyframes fadeUp{
      from{ opacity:0; transform: translateY(16px); }
      to{ opacity:1; transform: translateY(0); }
    }
    .hero-badge, .hero-title, .hero-desc, .hero-actions{
      animation: fadeUp .65s ease both;
    }
    .hero-title{ animation-delay: .06s; }
    .hero-desc{ animation-delay: .12s; }
    .hero-actions{ animation-delay: .18s; }

    /* Button hover polish */
    .btn.primary:hover{
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 0 30px rgba(var(--brand2-rgb), .30), 0 26px 70px rgba(var(--brand-rgb), .24);
    }

    /* Mobile hero: full-width buttons */
    @media (max-width: 900px){
      .hero-actions{ flex-direction:column; align-items:stretch; }
      .hero-actions .btn{ width:100%; }
      .hero-section{ padding:30px 20px; }
    }

    /* ===== HERO IMAGE + PREMIUM GLOW + FLOAT + 3D SETUP ===== */
    .hero-image{
      position:relative;
      perspective:1200px;
      display:flex; /* required for height matching */
      transform: translateY(18px); /* move image slightly down (tweak: 10-30px) */
    }

    .hero-image::before{
      content:"";
      position:absolute;
      inset:-18px;
      border-radius:30px;
      background:
        radial-gradient(600px 300px at 30% 30%, rgba(var(--brand-rgb), .34), transparent 62%),
        radial-gradient(600px 300px at 70% 70%, rgba(var(--brand2-rgb), .22), transparent 62%),
        radial-gradient(520px 260px at 60% 20%, rgba(var(--brand-rgb), .16), transparent 58%);
      filter: blur(18px);
      opacity:.9;
      z-index:0;
    }

    .hero-image img{
      width:100%;
      height:80%;          /* matches the hero-content column height */
      object-fit:cover;     /* prevents distortion */
      border-radius:24px;
      box-shadow: 0 30px 70px rgba(0,0,0,.45);
      border:1px solid rgba(255,255,255,.10);
      position:relative;
      z-index:1;
      transform-style: preserve-3d;
      will-change: transform;
      animation: floaty 6s ease-in-out infinite;
      transition: transform .15s ease-out, box-shadow .18s ease, border-color .18s ease;
      display:block;
    }

    .hero-image:hover img{
      box-shadow: 0 34px 80px rgba(0,0,0,.55);
      border-color: rgba(var(--brand-rgb), .35);
    }

    @keyframes floaty{
      0%   { transform: translateY(0px); }
      50%  { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }

    @media (prefers-reduced-motion: reduce){
      .hero-image img{ animation:none; }
    }

    /* ===== Platform Tiles ===== */
    .platform-grid{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
      gap:18px;
      margin-top:20px;
    }

    .platform-tile{
      display:block;
      padding:18px;
      border-radius:18px;
      border:1px solid rgba(255,255,255,.10);
      background:rgba(0,0,0,.18);
      box-shadow: 0 10px 26px rgba(0,0,0,.25);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
      position:relative;
      overflow:hidden;
    }

    .platform-tile:hover{
      transform: translateY(-6px);
      border-color: rgba(var(--brand-rgb), .35);
      box-shadow: 0 20px 50px rgba(0,0,0,.45);
    }

    .platform-title{
      margin:0 0 8px;
      font-size:17px;
      font-weight:800;
      letter-spacing:-.2px;
      color: var(--text);
    }

    .platform-desc{
      margin:0;
      color: var(--muted);
      line-height:1.65;
      font-size:14px;
    }

    .platform-meta{
      margin-top:14px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
    }

    .badge{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:6px 10px;
      border-radius:999px;
      font-size:12px;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(255,255,255,.05);
      color: rgba(234,240,255,.92);
    }

    .badge .dot{
      width:9px;
      height:9px;
      border-radius:999px;
      background: var(--brand2);
      box-shadow:0 0 0 6px rgba(var(--brand2-rgb), .12);
    }

    .badge.soon .dot{
      background: var(--warn);
      box-shadow:0 0 0 6px rgba(245,158,11,.12);
    }

    .platform-cta{
      color: rgba(234,240,255,.92);
      font-size:13px;
      opacity:.9;
    }

    .platform-tile.disabled{
      cursor:not-allowed;
      opacity:.70;
    }
    .platform-tile.disabled:hover{
      transform:none;
      border-color: rgba(255,255,255,.10);
      box-shadow: 0 10px 26px rgba(0,0,0,.25);
    }

    /* Responsive */
    @media (max-width: 900px){
      .hero-grid{ grid-template-columns: 1fr; }
      .hero-image{ order:-1; text-align:center; transform:none; }
      .hero-image img{ height:auto; max-width:520px; margin:0 auto; object-fit:cover; }
      .hero-title{ font-size:38px; }
    }

    .footer{
      margin-top:auto;
      padding:18px 0 8px;
      color: rgba(169,183,214,.9);
      font-size: 13px;
      display:flex; justify-content:space-between; gap:10px; flex-wrap:wrap;
      border-top:1px solid rgba(255,255,255,.08);
    }
    .footer a{color: rgba(234,240,255,.92)}
  </style>
</head>

<body>
  <!-- Moving dots + web lines background -->
  <canvas id="webCanvas"></canvas>

  <div class="wrap">
    <div class="topbar">
      <div class="logo">
        <a href="<?php echo htmlspecialchars($basePath . "/"); ?>" aria-label="<?php echo htmlspecialchars($company); ?>">
          <img src="<?php echo htmlspecialchars(assetUrl("assets/logo")); ?>" alt="<?php echo htmlspecialchars($company); ?>" class="site-logo">
        </a>
      </div>

      <nav class="nav" aria-label="Primary">
        <?php
          $renderNav = function(array $items, int $level = 0) use (&$renderNav) {
            foreach ($items as $item) {
              $label = (string)($item["label"] ?? "");
              $href = (string)($item["href"] ?? "#");
              $external = !empty($item["external"]);
              $children = $item["children"] ?? null;
              $hasChildren = is_array($children) && count($children) > 0;

              $active = navItemIsActive($item) ? "active" : "";
              $classes = trim("nav-link " . $active . ($external ? " mono" : ""));

              if (!$hasChildren) {
                echo '<a class="' . htmlspecialchars($classes) . '" href="' . htmlspecialchars($href) . '"' .
                     ($external ? ' target="_blank" rel="noopener"' : '') . '>' .
                     htmlspecialchars($label) .
                     '</a>';
                continue;
              }

              echo '<div class="nav-item">';
              echo '<a class="' . htmlspecialchars($classes) . '" href="' . htmlspecialchars($href) . '"' .
                   ($external ? ' target="_blank" rel="noopener"' : '') . '>' .
                   htmlspecialchars($label) . ' <span class="nav-caret">▾</span>' .
                   '</a>';

              echo '<div class="dropdown">';
              foreach ($children as $child) {
                $childLabel = (string)($child["label"] ?? "");
                $childHref = (string)($child["href"] ?? "#");
                $childExternal = !empty($child["external"]);
                $grand = $child["children"] ?? null;
                $hasGrand = is_array($grand) && count($grand) > 0;
                $childActive = navItemIsActive($child) ? "active" : "";

                if (!$hasGrand) {
                  echo '<a class="' . htmlspecialchars($childActive) . '" href="' . htmlspecialchars($childHref) . '"' .
                       ($childExternal ? ' target="_blank" rel="noopener"' : '') . '>' .
                       htmlspecialchars($childLabel) .
                       '</a>';
                  continue;
                }

                echo '<div class="dropdown-item">';
                echo '<a class="' . htmlspecialchars($childActive) . '" href="' . htmlspecialchars($childHref) . '">' .
                     htmlspecialchars($childLabel) . ' <span class="nav-caret">▸</span>' .
                     '</a>';
                echo '<div class="dropdown submenu">';
                foreach ($grand as $g) {
                  $gLabel = (string)($g["label"] ?? "");
                  $gHref = (string)($g["href"] ?? "#");
                  $gExternal = !empty($g["external"]);
                  $gActive = navItemIsActive($g) ? "active" : "";
                  echo '<a class="' . htmlspecialchars($gActive) . '" href="' . htmlspecialchars($gHref) . '"' .
                       ($gExternal ? ' target="_blank" rel="noopener"' : '') . '>' .
                       htmlspecialchars($gLabel) .
                       '</a>';
                }
                echo '</div></div>';
              }
              echo '</div></div>';
            }
          };

          $renderNav($nav, 0);
        ?>

      </nav>
    </div>