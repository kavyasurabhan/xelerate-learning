<?php
$pageTitle = "Contact — Xelerate Learning";
$pageDescription = "Contact Xelerate Learning for demos, pilots, partnerships, and business inquiries.";

require_once __DIR__ . "/includes/header.php";

$base = $basePath ?? "";
$toEmail = "support@xeleratelearning.com";

$success = false;
$error = "";
$name = "";
$email = "";
$subject = "";
$message = "";

// Simple anti-spam honeypot (hidden field). Real users won’t fill it.
$companyField = "";

function clean(string $v): string {
  return trim(preg_replace('/\s+/', ' ', $v));
}

if (($_SERVER["REQUEST_METHOD"] ?? "") === "POST") {
  $name         = clean((string)($_POST["name"] ?? ""));
  $email        = clean((string)($_POST["email"] ?? ""));
  $subject      = clean((string)($_POST["subject"] ?? ""));
  $message      = trim((string)($_POST["message"] ?? ""));
  $companyField = clean((string)($_POST["company_name"] ?? "")); // honeypot

  // Honeypot filled = likely bot
  if ($companyField !== "") {
    $error = "Unable to send message. Please try again.";
  } elseif ($name === "" || $email === "" || $subject === "" || $message === "") {
    $error = "Please fill in all fields.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email address.";
  } elseif (mb_strlen($message) < 10) {
    $error = "Your message is too short. Please add a few more details.";
  } else {

    $sendgridApiKey = getenv("SENDGRID_API_KEY");

    if (!$sendgridApiKey) {
      $error = "Email service is not configured yet. Please try again later.";
    } else {

      // IMPORTANT: From email must be verified in SendGrid (Domain Auth / Sender Verification)
      $fromEmail = "no-reply@xeleratelearning.com";

      $payload = [
        "personalizations" => [[
          "to" => [["email" => $toEmail]],
        ]],
        "from" => [
          "email" => $fromEmail,
          "name"  => "Xelerate Learning Website"
        ],
        "reply_to" => [
          "email" => $email,
          "name"  => $name
        ],
        "subject" => "[Xelerate Learning Contact] " . $subject,
        "content" => [[
          "type"  => "text/plain",
          "value" =>
            "New contact form submission:\n\n" .
            "Name: {$name}\n" .
            "Email: {$email}\n" .
            "Subject: {$subject}\n\n" .
            "Message:\n{$message}\n"
        ]]
      ];

      $ch = curl_init();
      curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
          "Authorization: Bearer " . $sendgridApiKey,
          "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
      ]);

      $response = curl_exec($ch);

      if ($response === false) {
        $error = "Unable to send message right now. Please try again later.";
        $logLine = date("c") . " cURL error: " . curl_error($ch) . PHP_EOL;
        @file_put_contents(__DIR__ . "/sendgrid_error.log", $logLine, FILE_APPEND);
        curl_close($ch);
      } else {
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode >= 200 && $httpCode < 300) {
          $success = true;
          $name = $email = $subject = $message = "";
        } else {
          $error = "Unable to send message right now. Please try again later.";
          $logLine = date("c") . " SendGrid HTTP {$httpCode} Response: " . $response . PHP_EOL;
          @file_put_contents(__DIR__ . "/sendgrid_error.log", $logLine, FILE_APPEND);
        }
      }
    }
  }
}
?>

<style>
  .contact-grid{
    display:grid;
    grid-template-columns: 1.25fr .75fr;
    gap:18px;
    align-items:start;
  }
  @media (max-width: 900px){
    .contact-grid{grid-template-columns:1fr}
  }

  .input{
    width:100%;
    padding:12px 14px;
    border-radius:14px;
    border:1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.05);
    color: var(--text);
    outline:none;
    transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
  }
  .input:focus{
    border-color: rgba(var(--brand-rgb), .55);
    box-shadow: 0 0 0 6px rgba(var(--brand-rgb), .14);
    background: rgba(255,255,255,.06);
  }
  .label{
    font-size:13px;
    color: var(--muted);
    margin-bottom:6px;
  }

  .cta-btn{
    width:100%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:14px 16px;
    border-radius: 16px;
    border:1px solid rgba(255,255,255,.20);
    background: linear-gradient(135deg, rgba(var(--brand-rgb),1), rgba(var(--brand2-rgb),1));
    color: white;
    font-weight:800;
    font-size:15px;
    letter-spacing:.2px;
    transition: transform .08s ease, filter .15s ease;
    cursor:pointer;
  }
  .cta-btn:hover{filter: brightness(1.06)}
  .cta-btn:active{transform: translateY(1px)}
  .hint{
    font-size:13px;
    color: rgba(169,183,214,.9);
    line-height:1.55;
  }
  .mini-card{
    border:1px solid rgba(255,255,255,.10);
    background: rgba(0,0,0,.16);
    border-radius: 18px;
    padding:18px;
  }
  .pill{
    display:inline-flex; align-items:center; gap:10px;
    padding:8px 12px; border-radius:999px;
    border:1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.05);
    color: var(--muted);
    font-size:13px;
  }
  .dot{
    width:10px;height:10px;border-radius:999px;
    background: var(--brand2);
    box-shadow: 0 0 0 6px rgba(var(--brand2-rgb), .12);
  }

  /* THANK YOU MODAL */
  .modal-overlay{
    position:fixed; inset:0;
    background: rgba(0,0,0,.65);
    backdrop-filter: blur(8px);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:18px;
    z-index:9999;
  }
  .modal{
    width:min(520px, 100%);
    border-radius:22px;
    border:1px solid rgba(255,255,255,.12);
    background: linear-gradient(180deg, rgba(14,24,49,.92), rgba(11,19,40,.88));
    box-shadow: 0 22px 60px rgba(0,0,0,.55);
    padding:22px;
    position:relative;
  }
  .modal h2{margin:0 0 10px; font-size:22px; letter-spacing:-.2px;}
  .modal p{margin:0; color:var(--muted); line-height:1.7;}
  .modal-actions{display:flex; gap:12px; flex-wrap:wrap; margin-top:16px;}
  .modal-close{
    position:absolute; top:12px; right:12px;
    width:38px; height:38px;
    border-radius:14px;
    border:1px solid rgba(255,255,255,.14);
    background: rgba(255,255,255,.06);
    color: var(--text);
    cursor:pointer;
    display:flex; align-items:center; justify-content:center;
  }
  .modal-close:hover{background: rgba(255,255,255,.10);}
  .countdown{
    margin-top:12px;
    font-size:13px;
    color: rgba(169,183,214,.92);
  }
</style>

<div class="panel section" style="margin-top:18px;">
  <div class="pill"><span class="dot"></span> Contact Xelerate Learning</div>

  <h1 style="font-size:38px;letter-spacing:-.6px;margin-top:14px;">Let’s build something impactful.</h1>
  <p style="max-width:80ch;color:var(--muted);line-height:1.8;margin-top:12px;">
    Partnerships, school onboarding, demos, enterprise projects, or technical inquiries — send us a message and our team will respond.
  </p>
</div>

<div class="contact-grid" style="margin-top:18px;">

  <!-- FORM -->
  <div class="panel section">
    <?php if (!$success && $error): ?>
      <div style="padding:14px;border-radius:16px;border:1px solid rgba(245,158,11,.25);background:rgba(245,158,11,.08);">
        ⚠️ <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="post" style="display:grid;gap:14px;margin-top:16px;">

      <!-- Honeypot (hidden) -->
      <div style="position:absolute;left:-9999px;top:-9999px;">
        <label>Company Name</label>
        <input class="input" name="company_name" value="<?php echo htmlspecialchars($companyField); ?>" autocomplete="off">
      </div>

      <div>
        <div class="label">Your Name</div>
        <input class="input" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Full name" required>
      </div>

      <div>
        <div class="label">Email</div>
        <input class="input" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="name@domain.com" required>
      </div>

      <div>
        <div class="label">Subject</div>
        <input class="input" name="subject" value="<?php echo htmlspecialchars($subject); ?>" placeholder="What is this about?" required>
      </div>

      <div>
        <div class="label">Message</div>
        <textarea class="input" name="message" rows="6" placeholder="Tell us what you’re looking for..." required><?php echo htmlspecialchars($message); ?></textarea>
        <div class="hint" style="margin-top:8px;">
          Tip: Add your organization name, country, and what outcome you want to achieve.
        </div>
      </div>

      <button class="cta-btn" type="submit">
        Send Message <span aria-hidden="true">→</span>
      </button>

      <div class="hint">
        By submitting, you agree to be contacted back at the email you provided.
      </div>
    </form>
  </div>

  <!-- INFO -->
  <div class="panel section">
    <div class="mini-card">
      <h2 style="margin:0 0 10px;font-size:18px;">Business Inquiries</h2>
      <div class="hint">
        Email us directly:
        <div style="margin-top:10px;">
          <a href="mailto:support@xeleratelearning.com" style="font-weight:800;color:var(--text);">
            support@xeleratelearning.com
          </a>
        </div>
      </div>
    </div>

    <div class="mini-card" style="margin-top:14px;">
      <h2 style="margin:0 0 10px;font-size:18px;">What we can help with</h2>
      <ul style="margin:0;color:var(--muted);line-height:1.7;padding-left:18px;">
        <li>School onboarding & pilots</li>
        <li>Product demos and deployments</li>
        <li>XR pilots & rollout planning</li>
        <li>VR modules and course library</li>
        <li>Platforms and performance analytics</li>
        <li>xAPI measurement and reporting</li>
      </ul>
    </div>

    <div class="mini-card" style="margin-top:14px;">
      <h2 style="margin:0 0 10px;font-size:18px;">Response time</h2>
      <div class="hint">
        We typically respond within <strong style="color:var(--text);">1–2 business days</strong>.
      </div>
    </div>
  </div>

</div>

<?php if ($success): ?>
  <!-- THANK YOU POPUP -->
  <div class="modal-overlay" id="thankYouModal" role="dialog" aria-modal="true" aria-labelledby="tyTitle">
    <div class="modal">
      <button class="modal-close" id="tyClose" aria-label="Close">✕</button>

      <h2 id="tyTitle">✅ Thank you! Your message has been sent.</h2>
      <p>
        We’ve received your request and will get back to you shortly.
        You’ll be redirected to the homepage automatically.
      </p>

      <div class="countdown">
        Redirecting in <strong id="tyCountdown">4</strong> seconds…
      </div>

      <div class="modal-actions">
        <a class="btn primary" href="<?php echo htmlspecialchars($base . "/"); ?>">Go to Home now →</a>
        <button class="btn" type="button" id="tyStay">Stay here</button>
      </div>
    </div>
  </div>

  <script>
    (function () {
      var seconds = 4;
      var countdownEl = document.getElementById('tyCountdown');
      var modal = document.getElementById('thankYouModal');
      var closeBtn = document.getElementById('tyClose');
      var stayBtn = document.getElementById('tyStay');

      var timer = setInterval(function () {
        seconds -= 1;
        if (countdownEl) countdownEl.textContent = String(seconds);
        if (seconds <= 0) {
          clearInterval(timer);
          window.location.href = <?php echo json_encode($base . "/"); ?>;
        }
      }, 1000);

      function closeModalOnly() {
        if (modal) modal.style.display = 'none';
      }

      if (closeBtn) closeBtn.addEventListener('click', function () {
        closeModalOnly();
      });

      if (stayBtn) stayBtn.addEventListener('click', function () {
        clearInterval(timer);
        closeModalOnly();
      });

      // Close on overlay click (optional)
      if (modal) {
        modal.addEventListener('click', function (e) {
          if (e.target === modal) {
            closeModalOnly();
          }
        });
      }
    })();
  </script>
<?php endif; ?>

<?php require_once __DIR__ . "/includes/footer.php"; ?>