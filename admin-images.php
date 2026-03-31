<?php
$pageTitle = "Image Uploads — Xelerate Learning";
$pageDescription = "Upload logo and site images (png/jpg/jpeg/webp/gif).";

require_once __DIR__ . "/includes/header.php";

$base = $basePath ?? "";
$root = __DIR__;
$allowedExt = ["png", "jpg", "jpeg", "webp", "gif"];
$maxBytes = 8 * 1024 * 1024; // 8MB

function isLocalRequest(): bool {
  $ip = $_SERVER["REMOTE_ADDR"] ?? "";
  return $ip === "127.0.0.1" || $ip === "::1";
}

$token = getenv("IMAGE_ADMIN_TOKEN") ?: "";
$providedToken = (string)($_GET["token"] ?? "");
$authorized = false;

if ($token !== "") {
  $authorized = hash_equals($token, $providedToken);
} else {
  // If no token is configured, allow localhost only.
  $authorized = isLocalRequest();
}

$targets = [
  // key => [label, relative path WITHOUT extension]
  "logo" => ["Logo", "assets/logo"],
  "hero" => ["Home hero image", "assets/hero-ai"],

  "services_ai" => ["Services: analytics image", "assets/services/ai"],
  "services_xr" => ["Services: XR image", "assets/services/xr"],
  "services_rollout" => ["Services: rollout image", "assets/services/blockchain"],
  "services_security" => ["Services: security image", "assets/services/cyber"],
  "services_training" => ["Services: training image", "assets/services/training"],

  "products_englishskill" => ["Products: elearning image", "assets/products/englishskill"],
  "products_xr" => ["Products: VR/XR image", "assets/products/xr-lab"],
  "products_omniai" => ["Products: SSAI corporate image", "assets/products/omniai"],
  "products_schoolos" => ["Products: SSAI education image", "assets/products/schoolos"],
];

function currentAssetUrl(string $noExt): string {
  return assetUrl($noExt);
}

$message = "";
$error = "";

if ($authorized && (($_SERVER["REQUEST_METHOD"] ?? "") === "POST")) {
  $targetKey = (string)($_POST["target"] ?? "");
  $target = $targets[$targetKey] ?? null;

  if (!$target) {
    $error = "Invalid target selected.";
  } elseif (!isset($_FILES["image"]) || !is_array($_FILES["image"])) {
    $error = "No file uploaded.";
  } else {
    $f = $_FILES["image"];
    $tmp = (string)($f["tmp_name"] ?? "");
    $size = (int)($f["size"] ?? 0);
    $name = (string)($f["name"] ?? "");
    $err = (int)($f["error"] ?? UPLOAD_ERR_NO_FILE);

    if ($err !== UPLOAD_ERR_OK) {
      $error = "Upload failed (error code {$err}).";
    } elseif ($size <= 0 || $size > $maxBytes) {
      $error = "File must be less than 8MB.";
    } elseif (!is_uploaded_file($tmp)) {
      $error = "Upload did not look valid.";
    } else {
      $info = @getimagesize($tmp);
      if ($info === false) {
        $error = "File is not a valid image.";
      } else {
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedExt, true)) {
          $error = "Only " . implode(", ", $allowedExt) . " images are allowed.";
        } else {
          $relNoExt = $target[1];
          $destRel = $relNoExt . "." . $ext;
          $destFs = $root . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $destRel);
          $destDir = dirname($destFs);
          if (!is_dir($destDir)) {
            @mkdir($destDir, 0775, true);
          }

          // Remove other extensions for the same target so resolver picks the new one.
          foreach ($allowedExt as $oldExt) {
            $oldFs = $root . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $relNoExt . "." . $oldExt);
            if (is_file($oldFs) && $oldFs !== $destFs) {
              @unlink($oldFs);
            }
          }

          if (!@move_uploaded_file($tmp, $destFs)) {
            $error = "Could not save uploaded file.";
          } else {
            $message = "Uploaded successfully: " . htmlspecialchars($target[0]) . ".";
          }
        }
      }
    }
  }
}
?>

<div class="panel section" style="margin-top:18px;">
  <h1 style="font-size:34px;letter-spacing:-.4px;margin:0;">Image Uploads</h1>
  <p style="max-width:95ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Upload images for the logo and key site sections. Supported formats: <strong style="color:var(--text);">png, jpg, jpeg, webp, gif</strong>.
  </p>

  <?php if (!$authorized): ?>
    <div class="panel" style="margin-top:16px;padding:16px;background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.25);">
      <strong>Not authorized.</strong>
      <div style="margin-top:6px;color:var(--muted);line-height:1.7;">
        <?php if ($token !== ""): ?>
          Add `?token=...` to this URL (must match the `IMAGE_ADMIN_TOKEN` environment variable).
        <?php else: ?>
          This page is available only from localhost. For production, set an `IMAGE_ADMIN_TOKEN` environment variable.
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($message): ?>
    <div class="panel" style="margin-top:16px;padding:16px;background:rgba(var(--brand2-rgb), .12);border:1px solid rgba(var(--brand2-rgb), .26);">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="panel" style="margin-top:16px;padding:16px;background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.25);">
      <?php echo htmlspecialchars($error); ?>
    </div>
  <?php endif; ?>
</div>

<div class="panel section" style="margin-top:18px;">
  <h2 style="margin:0;font-size:22px;letter-spacing:-.2px;">Upload an image</h2>

  <form method="post" enctype="multipart/form-data" style="margin-top:14px;display:grid;gap:14px;max-width:720px;">
    <div>
      <div class="label">Target</div>
      <select class="input" name="target" <?php if (!$authorized): ?>disabled<?php endif; ?>>
        <?php foreach ($targets as $k => $t): ?>
          <option value="<?php echo htmlspecialchars($k); ?>"><?php echo htmlspecialchars($t[0]); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <div class="label">Image file</div>
      <input class="input" type="file" name="image" accept=".png,.jpg,.jpeg,.webp,.gif,image/*" <?php if (!$authorized): ?>disabled<?php endif; ?>>
      <div class="hint" style="margin-top:8px;">
        Max file size: 8MB.
      </div>
    </div>

    <button class="cta-btn" type="submit" <?php if (!$authorized): ?>disabled style="opacity:.6;cursor:not-allowed;"<?php endif; ?>>
      Upload <span aria-hidden="true">→</span>
    </button>
  </form>
</div>

<div class="panel section" style="margin-top:18px;">
  <h2 style="margin:0;font-size:22px;letter-spacing:-.2px;">Current images</h2>
  <div style="margin-top:14px;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:14px;">
    <?php foreach ($targets as $t): ?>
      <?php $url = currentAssetUrl($t[1]); ?>
      <div class="panel" style="padding:14px;background:rgba(0,0,0,.18);">
        <div style="font-weight:800;"><?php echo htmlspecialchars($t[0]); ?></div>
        <div style="margin-top:10px;border-radius:14px;overflow:hidden;border:1px solid rgba(255,255,255,.10);background:#111;">
          <img src="<?php echo htmlspecialchars($url); ?>" alt="<?php echo htmlspecialchars($t[0]); ?>" style="width:100%;height:160px;object-fit:cover;display:block;">
        </div>
        <div style="margin-top:10px;color:var(--muted);font-size:12px;word-break:break-all;">
          <?php echo htmlspecialchars($url); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>

