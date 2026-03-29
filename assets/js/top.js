(function () {
  var resizeTimer = '';
  var widthFlag = '';
  var nowFlag = 'pc';

  let previousWidth = window.innerWidth;
  let previousHeight = window.innerHeight;

  window.onresize = function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function(){
      setWidthFlag()

      if (nowFlag != widthFlag) {
        nowFlag = widthFlag
      }

      const currentWidth = window.innerWidth;
      const currentHeight = window.innerHeight;

      previousHeight = currentHeight;
    }, 200);
  };


  function setWidthFlag() {
    var windowWidth = window.innerWidth;
    if (windowWidth < 768 && widthFlag != 'sp') {
      widthFlag = 'sp';
    } else if(windowWidth >= 768 && widthFlag != 'pc') {
      widthFlag = 'pc';
    }
  }
  setWidthFlag()

  function fadeIn(node, duration) {
    // style属性にdisplay: noneが設定されていたとき
    if (node.style.display === 'none') {
      node.style.display = '';
    } else {
      node.style.display = 'block';
    }
    node.style.opacity = 0;

    var start = performance.now();

    requestAnimationFrame(function tick(timestamp) {
      var easing = (timestamp - start) / duration;

      node.style.opacity = Math.min(easing, 1);

      if (easing < 1) {
        requestAnimationFrame(tick);
      } else {
        node.style.opacity = '';
      }
    });
  }

  // 読み込み2秒以上は待たずに表示
  setTimeout(() => {
    setTimeout(() => {
      document.body.classList.add('is-load-animated');
    }, 800);
  }, 100)


  const projectSlider = new Swiper ('.project-list-slider', {
    slidesPerView: 2.1,
    spaceBetween: 10,
    centeredSlides: false,
    autoplay: {
      delay: 6000,
    },
    loop: true,
    navigation: {
      nextEl: ".project-list-slider .swiper-button-next",
      prevEl: ".project-list-slider .swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2.4,
        spaceBetween: 20,
      },
      1025: {
        slidesPerView: 3.4,
        spaceBetween: 30,
      },
    }
  });

  
  const hero_canvas = document.getElementById('hero-canvas');

  if(hero_canvas) {
    heroCanvas(hero_canvas);
  }
    
  function heroCanvas(canvas) {
    const ctx = canvas.getContext('2d');

    let width, height;
    let time = 0;

    // 波のパラメータ設定
    const waves = [
        {
            lines: 40, 
            baseYRatio: 0.6, 
            amplitude: 50, 
            frequency: 0.005, 
            speed: 0.002, 
            color: 'rgba(255, 255, 255, 0.08)', 
            phaseOffset: 0 
        },
        {
            lines: 30,
            baseYRatio: 0.7,
            amplitude: 40,
            frequency: 0.004,
            speed: 0.0025,
            color: 'rgba(255, 255, 255, 0.06)',
            phaseOffset: Math.PI / 4
        },
        {
            lines: 20,
            baseYRatio: 0.8,
            amplitude: 30,
            frequency: 0.003,
            speed: 0.003,
            color: 'rgba(255, 255, 255, 0.05)',
            phaseOffset: Math.PI / 2
        }
    ];

    function init() {
        resize();
        window.addEventListener('resize', resize);
        animate();
    }

    function resize() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    }

    function drawBackground() {
        const gradient = ctx.createLinearGradient(0, 0, width, height);
        gradient.addColorStop(0, '#f5f7fa'); 
        gradient.addColorStop(1, '#cccada'); 
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, width, height);
    }

    function drawSineWave(wave, t) {
        ctx.strokeStyle = wave.color;
        ctx.lineWidth = 1;

        for (let i = 0; i < wave.lines; i++) {
            ctx.beginPath();
            const lineOffset = i * 0.015; 
            const currentAmplitude = wave.amplitude * (1 + i * 0.02);
            const currentFrequency = wave.frequency * (1 - i * 0.005);

            for (let x = 0; x < width; x += 5) {
                const y = height * wave.baseYRatio + 
                          currentAmplitude * Math.sin(x * currentFrequency + t * wave.speed + wave.phaseOffset + lineOffset);

                if (x === 0) {
                    ctx.moveTo(x, y);
                } else {
                    ctx.lineTo(x, y);
                }
            }
            ctx.stroke();
        }
    }

    function animate() {
        ctx.clearRect(0, 0, width, height);

        drawBackground();

        waves.forEach(wave => {
            drawSineWave(wave, time);
        });

        time++; 
        requestAnimationFrame(animate);
    }

    init();
  }

}());