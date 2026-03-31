<?php
// /includes/site.php

$company = "Xelerate Learning";
$tagline = "Experience learning with measurable outcomes.";
$primaryCtaText = "Explore Products";
$primaryCtaLink = "/products.php";

$basePath = rtrim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"] ?? "/")), "/");
if ($basePath === "/") $basePath = "";

$allowedImageExtensions = ["png", "jpg", "jpeg", "webp", "gif"];

function assetUrl(string $relativePathNoExt, ?array $extensions = null): string {
  $extensions = $extensions ?: ($GLOBALS["allowedImageExtensions"] ?? ["png", "jpg", "jpeg", "webp", "gif"]);

  $root = dirname(__DIR__); // project root (one level above /includes)
  $basePath = $GLOBALS["basePath"] ?? "";

  $relativePathNoExt = ltrim(str_replace("\\", "/", $relativePathNoExt), "/");
  $relativeNoExtFs = str_replace("/", DIRECTORY_SEPARATOR, $relativePathNoExt);

  foreach ($extensions as $ext) {
    $ext = strtolower((string)$ext);
    $candidateFs = $root . DIRECTORY_SEPARATOR . $relativeNoExtFs . "." . $ext;
    if (is_file($candidateFs)) {
      $v = @filemtime($candidateFs);
      $vq = $v ? ("?v=" . (int)$v) : "";
      return $basePath . "/" . $relativePathNoExt . "." . $ext . $vq;
    }
  }

  // Fallback to .png without cache-bust (useful even if missing).
  return $basePath . "/" . $relativePathNoExt . ".png";
}

$nav = [
  ["label" => "About Us", "href" => $basePath . "/about.php"],

  ["label" => "Products", "href" => $basePath . "/products.php", "children" => [
    ["label" => "SSAI Corporate", "href" => $basePath . "/products-ssai-corporate.php"],
    ["label" => "SSAI Education", "href" => $basePath . "/products-ssai-education.php"],
    ["label" => "VR", "href" => $basePath . "/vr.php", "children" => [
      ["label" => "Earth to Mars", "href" => $basePath . "/vr.php#earth-to-mars"],
      ["label" => "Presentation Skills", "href" => $basePath . "/vr.php#presentation-skills"],
      ["label" => "Boardroom Skills", "href" => $basePath . "/vr.php#boardroom-skills"],
      ["label" => "Fire Safety", "href" => $basePath . "/vr.php#fire-safety"],
      ["label" => "Well Being", "href" => $basePath . "/vr.php#well-being"],
    ]],
    ["label" => "Elearning Courses", "href" => $basePath . "/elearning.php", "children" => [
      ["label" => "ACES", "href" => $basePath . "/elearning.php#aces"],
      ["label" => "Public Speaking", "href" => $basePath . "/elearning.php#public-speaking"],
      ["label" => "Health and Safety", "href" => $basePath . "/elearning.php#health-safety"],
      ["label" => "Elearning Examples", "href" => $basePath . "/elearning.php#examples"],
    ]],
    ["label" => "Platforms", "href" => $basePath . "/platforms.php", "children" => [
      ["label" => "XR Platform", "href" => $basePath . "/platforms.php#xr-platform"],
      ["label" => "Elearning Platform", "href" => $basePath . "/platforms.php#elearning-platform"],
    ]],
  ]],

  ["label" => "XR Learning", "href" => $basePath . "/xr-learning.php", "children" => [
    ["label" => "XR Solutions", "href" => $basePath . "/xr-solutions.php"],
    ["label" => "FAQ’s", "href" => $basePath . "/faqs.php"],
  ]],

  ["label" => "Industry", "href" => $basePath . "/industry.php", "children" => [
    ["label" => "Examples of Work in Pharma", "href" => $basePath . "/industry-pharma.php"],
  ]],

  ["label" => "Shop", "href" => $basePath . "/shop.php"],
  ["label" => "Contact",  "href" => $basePath . "/contact.php"],
  ["label" => "Log In", "href" => $basePath . "/login.php"],
];

// Optional helper: mark active link
function isActive(string $href): bool {
  $path = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH) ?: "/";
  if ($href === "/" || str_ends_with($href, "/")) return $path === "/" || str_ends_with($path, "/index.php");
  return $path === $href;
}

function navItemIsActive(array $item): bool {
  $href = (string)($item["href"] ?? "");
  $external = !empty($item["external"]);
  if (!$external && $href !== "" && isActive($href)) return true;

  $children = $item["children"] ?? null;
  if (is_array($children)) {
    foreach ($children as $c) {
      if (is_array($c) && navItemIsActive($c)) return true;
    }
  }
  return false;
}