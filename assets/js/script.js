(function () {
  objectFitImages();
  
  const setFillHeight = () => {
  const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
  window.addEventListener('resize', setFillHeight);
  setFillHeight();

  // ユーザーエージェントを取得
  const userAgent = navigator.userAgent;
  // PCであるかどうかを判定する正規表現
  const pcRegex = /Windows NT|Macintosh/;
  // PCからのアクセスであるかどうかを判定
  const isPC = pcRegex.test(userAgent);


/* scroll in
 * ------------------------------------- */
function scrollFadein() {
  const elements = document.getElementsByClassName("fadein");
  const windowHeight = window.innerHeight || document.documentElement.clientHeight;

  Array.prototype.forEach.call(elements, function (element) {
    // もし既にスクロールイン済みならスキップ（パフォーマンス向上）
    if (element.classList.contains("scrollin")) return;

    const rect = element.getBoundingClientRect();
    const elementTop = rect.top;

    // 閾値を少し緩める（例えば下からチラ見えでも発火させたい場合）
    const offset = element.dataset.fadeinOffset ? parseInt(element.dataset.fadeinOffset, 10) : 0;
    if (elementTop - windowHeight <= offset) {
      const delay = element.dataset.fadeinDelay ? parseInt(element.dataset.fadeinDelay, 10) : 0;

      // スクロールインの付与は requestAnimationFrame 経由で行うと安全
      const doAdd = function() {
        element.classList.add("scrollin");
      };

      if (delay > 0) {
        setTimeout(function() {
          requestAnimationFrame(doAdd);
        }, delay);
      } else {
        requestAnimationFrame(doAdd);
      }

      // parts が NodeList の場合も互換性を考慮して Array.prototype.forEach.call を使用
      const parts = element.querySelectorAll('.fadein-parts');
      Array.prototype.forEach.call(parts, function(el) {
        const pDelay = el.dataset.fadeinDelay ? parseInt(el.dataset.fadeinDelay, 10) : 0;
        if (pDelay > 0) {
          setTimeout(function() {
            requestAnimationFrame(function(){ el.classList.add("scrollin"); });
          }, pDelay);
        } else {
          requestAnimationFrame(function(){ el.classList.add("scrollin"); });
        }
      });
    }
  });
}

 /* onload
  * ------------------------------------------------------- */
  function onLoadedEvent() {
    document.body.classList.add('is-loaded');
  }
  window.addEventListener('load', function() {
    onLoadedEvent()
  })

 /* resize window
  * ------------------------------------------------------- */
  let resizeTimer = '';
  let widthFlag = '';
  setWidthFlag()
  function setWidthFlag() {
    let windowWidth = window.innerWidth;
    if (windowWidth < 768 && widthFlag != 'sp') {
      widthFlag = 'sp';
    } else if(windowWidth >= 768 && windowWidth <= 1024 && widthFlag != 'tb') {
      widthFlag = 'tb';
    } else if(windowWidth >= 1024 && widthFlag != 'pc') {
      widthFlag = 'pc';
    }
  }

  window.onresize = function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function(){
      setWidthFlag()

      if (widthFlag == 'pc') {
        if (document.documentElement.classList.contains('is-nav-open')) {
          document.documentElement.classList.remove('is-nav-open')
          document.body.classList.remove('is-nav-open')
          navClose()
        }
      }
    }, 200);
  };

 /* toggle navgation
  * ------------------------------------------------------- */
  const navigation = document.getElementById('toggle-navigation');
  const navToggle = document.getElementById('navigation-toggle');
  const navCloseElems = document.getElementsByClassName('nav-close');
  const navCloseTriggers = Array.from(navCloseElems);
  // nav open
  navToggle.addEventListener('click', (e) => {
    if(navToggle.classList.contains('is-toggled')) {
      navigation.classList.remove('is-show');
      navToggle.classList.remove('is-toggled');
      let time = 600;

      setTimeout(navClose, time);
    } else {
      navigation.classList.add('is-show');
      navToggle.classList.add('is-toggled');
      document.body.classList.add('is-nav-open');
    }
  })

  // nav close
  function navClose() {
    document.body.classList.remove('is-nav-open');
  }
  navCloseTriggers.forEach(function(target) {
    target.addEventListener('click', (e) => {
      navigation.classList.remove('is-show');
      navToggle.classList.remove('is-toggled');
      let time = 600;
      if(widthFlag != 'sp') {
        time = 1000;
      }
      setTimeout(navClose, time);
    })
  })
  addEventListener('click', outsideNavClose);
  function outsideNavClose(e) {
    if (document.documentElement.classList.contains('is-nav-open')) {
      if(!e.target.closest('.sp-navigation, .nav-open')) {
        navigation.classList.remove('is-show');
        navToggle.classList.remove('is-toggled');
        let time = 600;
        setTimeout(navClose, time);
      }
      return false
    }
  }

 /* footer navigation
  * ------------------------------------------------------- */
  const footerNavigationTitle = document.querySelectorAll('.footer-navigation h4 a');
  footerNavigationTitle.forEach(function(target) {
    target.addEventListener('click', (e) => {
      if(widthFlag === 'sp') {
        e.preventDefault();
        $(target).toggleClass('is-active');
        const nextList = $(target).closest('h4').next('ul');
        $(nextList).slideToggle(240);
      }
    })
  });
      

  /* modal
  * ------------------------------------------------------- */
  const modals = document.getElementsByClassName('modal');
  const modalOpenElems = document.getElementsByClassName('modal-open');
  const modalOpenTriggers = Array.from(modalOpenElems);
  const modalCloseElems = document.getElementsByClassName('modal-close');
  const modalCloseTriggers = Array.from(modalCloseElems);

  if (document.getElementsByClassName('modal').length > 0) {
    // modal open
    modalOpenTriggers.forEach(function(target) {
      target.addEventListener('click', (e) => {
        let modal = document.getElementById(target.dataset.modalTarget);
        modal.style.display = 'block';
        modal.classList.add('is-open')
        no_scroll();
      })
    })

    // modal close
    modalCloseTriggers.forEach(function(target) {
      target.addEventListener('click', (event) => {
        let modal = target.closest('.modal')
        modal.style.display = 'none';
        modal.classList.remove('is-open')
        return_scroll();
      })
    })

    // モーダルコンテンツ以外がクリックされた時
    addEventListener('click', outsideClose);
    function outsideClose(e) {
      if(!e.target.closest('.modal, .modal-open')) {
        for (let i = 0; i < modals.length; i++) {
          modals[i].style.display = 'none';
          modals[i].classList.remove('is-open')
          return_scroll();
        }
      }
    }

    document.addEventListener('keydown', function(e) {
      if(e.key === 'Escape'){
        let open_modals = document.querySelectorAll('.modal.is-open');
        for (let i = 0; i < open_modals.length; i++) {
          open_modals[i].style.display = 'none';
          open_modals[i].classList.remove('is-open')
        }
        return_scroll();
      }
    })
  }

  /* scroll mask
  * ------------------------------------------------------- */
  function scrollMask() {
    const elements = document.getElementsByClassName("js-mask");
    Array.prototype.forEach.call(elements, function (element) {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      if (elementTop - windowHeight <= 0) {
        element.classList.add("scrollin");
      }
    });
  }
  window.addEventListener("scroll", function () {
    scrollMask();
    scrollFadein()
  });
  $(window).trigger('scroll');

  // 初回チェック：DOM読み込み後・完全ロード後・リサイズ・向き変更で確実に実行
  $(document).ready(function() {
    scrollFadein();
    scrollMask();

    setTimeout(scrollFadein, 200);
    setTimeout(scrollMask, 200);
  });

  $(window).on('load resize orientationchange', function() {
    // load 後は画像やフォントでレイアウトが変わるため再チェック
    scrollFadein();
    scrollMask();
    // 再度遅延チェック（特にiOSで有効）
    setTimeout(scrollFadein, 250);
    setTimeout(scrollMask, 250);
  });


  /* smooth scroll
  * ------------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      let hash = anchor.getAttribute('href');
      scrollToHash(hash)

      if (anchor.classList.contains('sp-navigation-page-link')) {
        document.documentElement.classList.remove('is-nav-open')
        document.body.classList.remove('is-nav-open')
        navClose()
      }
    });
  });
  document.querySelectorAll('.pagetop').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
          top: 0,
          behavior: 'smooth'
      });
    });
  });
  function scrollToHash(hash) {
    let headerHeight = document.querySelector('.site-header').offsetHeight + 50;
    let target = document.getElementById(hash.replace('#', ''));
    
    let targetPosition = window.pageYOffset + target.getBoundingClientRect().top - headerHeight;
    window.scrollTo({
      top: targetPosition,
      behavior: 'smooth'
    });
  }
  let urlHash = location.hash;
  window.addEventListener('load', function() {
    if( urlHash ) {
      window.onload = scrollToHash(urlHash)
    }
  })

  window.addEventListener('scroll', function () {
    const header = document.querySelector('.site-header');
    const scroll = window.pageYOffset;
    if (scroll > 200) {
      header.classList.add('is-scroll')
    } else {
      header.classList.remove('is-scroll')
    }
  });

  /* tab
  * ------------------------------------------------------- */
  const tabItems= document.querySelectorAll('.tab-list-item');
  document.addEventListener('DOMContentLoaded', function(){
    for(let i = 0; i < tabItems.length; i++) {
      tabItems[i].addEventListener('click', tabSwitch);
    }
    function tabSwitch(){
      document.querySelectorAll('.active')[0].classList.remove('active');
      this.classList.add('active');
      const tabList = this.parentElement;
      const tabListItem = tabList.children;
      const tabContent = tabList.nextElementSibling;
      const tabContentItem = tabContent.children;
      const aryTabs = Array.prototype.slice.call(tabListItem);
      const index = aryTabs.indexOf(this);
      for (let i = 0; i < tabContentItem.length; i++) {
        tabContentItem[i].classList.remove('show');
      }
      tabContentItem[index].classList.add('show');
    };
  });
  
}());