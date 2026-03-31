<?php
// /includes/footer.php
require_once __DIR__ . "/site.php";
$year = date("Y");
?>
    <div class="footer">
      <div>© <?php echo $year; ?> <?php echo htmlspecialchars($company); ?>. All rights reserved.</div>
      <div>
        <a href="<?php echo htmlspecialchars($basePath . "/products.php"); ?>">Products</a> ·
        <a href="<?php echo htmlspecialchars($basePath . "/about.php"); ?>">About</a> ·
        <a href="<?php echo htmlspecialchars($basePath . "/contact.php"); ?>">Contact</a>
      </div>
    </div>
  </div>

  <!-- HERO Mouse-follow Parallax Tilt -->
  <script>
    (function () {
      const hero = document.getElementById("heroTilt");
      if (!hero) return;

      // disable on touch devices
      const isTouch = window.matchMedia("(pointer: coarse)").matches;
      if (isTouch) return;

      const img = hero.querySelector("img");
      if (!img) return;

      // respect reduced motion
      const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
      if (reduceMotion) return;

      hero.addEventListener("mousemove", (e) => {
        const rect = hero.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = ((y - centerY) / centerY) * -6; // tilt up/down
        const rotateY = ((x - centerX) / centerX) *  6; // tilt left/right

        // keep slight "lift"
        img.style.transform =
          "rotateX(" + rotateX.toFixed(2) + "deg) " +
          "rotateY(" + rotateY.toFixed(2) + "deg) " +
          "translateY(-6px)";
      });

      hero.addEventListener("mouseleave", () => {
        img.style.transform = "rotateX(0deg) rotateY(0deg) translateY(0px)";
      });
    })();
  </script>

  <script>
(function(){
  const canvas = document.getElementById("webCanvas");
  if(!canvas) return;

  const ctx = canvas.getContext("2d");
  function getColor(){
    const css = getComputedStyle(document.documentElement);
    const strokeRgb = (css.getPropertyValue('--brand2-rgb') || '122, 0, 70').trim(); // swatch color
    return {
      strokeRgb,
      particle: "rgba(" + strokeRgb + ",0.95)",
      bg: "rgba(" + strokeRgb + ",0.035)",
      glow: "rgba(" + strokeRgb + ",0.16)",
    };
  }
  let color = getColor();

  let width, height;
  let particles = [];
  let floaters = [];
  const PARTICLE_COUNT = 55;   // reduce noise
  const FLOATER_COUNT = 10;    // fewer accents
  const MAX_DISTANCE = 135;

  function resize(){
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  resize();
  window.addEventListener("resize", resize);

  class Particle{
    constructor(){
      this.x = Math.random()*width;
      this.y = Math.random()*height;
      this.vx = (Math.random()-.5)*0.45;
      this.vy = (Math.random()-.5)*0.45;
      this.size = 1.6 + Math.random()*1.2;
      this.alpha = 0.55 + Math.random()*0.35;
    }

    move(){
      this.x += this.vx;
      this.y += this.vy;

      if(this.x < 0 || this.x > width) this.vx *= -1;
      if(this.y < 0 || this.y > height) this.vy *= -1;
    }

    draw(){
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI*2);
      ctx.fillStyle = "rgba(" + color.strokeRgb + "," + this.alpha + ")";
      ctx.fill();
    }
  }

  class Floater{
    constructor(){
      this.reset(true);
    }
    reset(init){
      this.x = Math.random()*width;
      this.y = Math.random()*height;
      const s = 0.12 + Math.random()*0.18;
      const a = Math.random()*Math.PI*2;
      this.vx = Math.cos(a)*s;
      this.vy = Math.sin(a)*s;
      this.r = 2.4 + Math.random()*2.8;
      this.alpha = 0.38 + Math.random()*0.28;
      this.tw = 0.002 + Math.random()*0.004;
      this.t = init ? Math.random()*1000 : 0;
    }
    move(){
      this.x += this.vx;
      this.y += this.vy;
      if(this.x < -20) this.x = width + 20;
      if(this.x > width + 20) this.x = -20;
      if(this.y < -20) this.y = height + 20;
      if(this.y > height + 20) this.y = -20;
      this.t += 1;
    }
    draw(){
      const pulse = 0.75 + 0.25*Math.sin(this.t*this.tw);
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI*2);
      ctx.fillStyle = "rgba(" + color.strokeRgb + "," + (this.alpha*pulse) + ")";
      ctx.fill();

      // soft glow
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r*3.1, 0, Math.PI*2);
      ctx.fillStyle = "rgba(" + color.strokeRgb + "," + (0.06*pulse) + ")";
      ctx.fill();
    }
  }

  function init(){
    particles = [];
    for(let i=0;i<PARTICLE_COUNT;i++){
      particles.push(new Particle());
    }

    floaters = [];
    for(let i=0;i<FLOATER_COUNT;i++){
      floaters.push(new Floater());
    }
  }

  function connect(){
    for(let i=0;i<particles.length;i++){
      for(let j=i+1;j<particles.length;j++){
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx*dx + dy*dy);

        if(dist < MAX_DISTANCE){
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = "rgba(" + color.strokeRgb + "," + (1 - dist/MAX_DISTANCE) * 0.26 + ")";
          ctx.lineWidth = 1;
          ctx.stroke();
        }
      }
    }
  }

  function animate(){
    // Subtle tint layer so animation feels brighter on black base
    ctx.clearRect(0,0,width,height);
    ctx.fillStyle = color.bg;
    ctx.fillRect(0,0,width,height);

    particles.forEach(p => {
      p.move();
      p.draw();
    });

    connect();

    // Brighter, slower moving dots (professional accent)
    floaters.forEach(f => {
      f.move();
      f.draw();
    });
    requestAnimationFrame(animate);
  }

  init();
  animate();

})();
</script>

</body>
</html>