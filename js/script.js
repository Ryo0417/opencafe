jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  //mv通過後ハンバーガーメニュー表示
  // $(window).on("scroll", function () {
  //   if ($(".js-mv").height() < $(this).scrollTop()) {
  //     $(".js-hamburger").fadeIn();
  //   } else {
  //     $(".js-hamburger").fadeOut();
  //   }
  // });

  $(window).on("scroll", function () {
    if($('body').hasClass('home')) {
      if ($(".js-mv").height() < $(this).scrollTop()) {
        $(".js-hamburger").fadeIn();
      } else {
        $(".js-hamburger").fadeOut();
      }
    } else {
      $(function(){
        $(".js-hamburger").css('display', 'block');

      });
    }
  });

  var topBtn = $(".c-pagetop");
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 500) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

  // リサイズイベント
  $(window).resize(function () {
    var $window = $(this).width();
    var bp = 767;
    if ($window > bp) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-nav-menu").removeClass("is-active");
      $(".js-nav-background").removeClass("is-active");
    } else {
      $(".p-sp-nav").removeClass("is-active");
      $(".js-hamburger").removeClass("is-active");
      $(".js-nav-background").removeClass("is-active");
    }
  });

  // ハンバーガーメニュー
  $(".js-hamburger").on("click", function () {
    if ($(this).hasClass("is-active")) {
      $(".js-nav-menu").removeClass("is-active");
      $(this).removeClass("is-active");
      $(".js-nav-background").removeClass("is-active");
      $(".js-header-mask").removeClass("is-active");
      $(".js-sns").removeClass("is-active");
      $(".p-header").fadeOut();
    } else {
      $(this).addClass("is-active");
      $(".js-nav-menu").addClass("is-active");
      $(".js-nav-background").addClass("is-active");
      $(".js-header-mask").addClass("is-active");
      $(".js-sns").addClass("is-active");
      $(".p-header").fadeIn();
      $(".p-header__logo").fadeIn();
    }
    // $('body').css('overflow-y', 'hidden');  // 本文の縦スクロールを無効
  });
  $(".js-header-mask").on("click", function () {
    $(".js-nav-menu").removeClass("is-active");
    $(".js-hamburger").removeClass("is-active");
    $(".js-nav-background").removeClass("is-active");
    $(".js-header-mask").removeClass("is-active");
    $(".js-sns").removeClass("is-active");
    $(".p-header").fadeOut();
  });

  //ページ遷移時にドロワーを閉じる
  $(".js-sp-nav-item a").on("click", function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-nav-menu").removeClass("is-active");
    $(".js-nav-background").removeClass("is-active");
  });

  // swiper
  var slider1 = new Swiper(".js-slider", {
    loop: true,
    effect: "fade",
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 3000,
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
      clickable: true,
    },
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ scrollTop: targetY }, time, "swing");
    return false;
  });
  
});


