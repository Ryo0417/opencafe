<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <!-- meta情報 -->
  <title>opencafe</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- ogp -->
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <!-- ファビコン -->
  <link rel="”icon”" href="" />
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Damion&family=Noto+Serif+JP:wght@400;500;600&family=Patua+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="p-header-background js-nav-background">
    <header class="p-header l-header js-header">
      <div class="p-header__inner">
        <?php if (is_front_page()) : ?>
          <h1 class="p-header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg" alt="ヘッダーロゴ" />
            </a>
          </h1>
        <?php else : ?>
          <div class="p-header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg" alt="ヘッダーロゴ" />
            </a>
          </div>
        <?php endif; ?>
      </div>
      <div class="p-header__menus js-nav-menu">
        <nav class="p-header__sp-nav p-sp-nav">
          <ul class="p-sp-nav__items">
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                top<span>トップ</span>
              </a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/concept')); ?>">
                concept<span>コンセプト</span>
              </a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/menu')); ?>">
                menu<span>メニュー</span>
              </a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/news')); ?>">
                news<span>ニュース</span>
              </a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/shop')); ?>">
                shop<span>店舗情報</span></a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/gift')); ?>">
                gift<span>ギフト・贈り物</span>
              </a>
            </li>
            <li class="p-sp-nav__item js-sp-nav-item">
              <a href="<?php echo esc_url(home_url('/contact')); ?>">
                contact<span>お問い合わせ</span>
              </a>
            </li>
          </ul>
          <div class="p-header__icon-wrapper c-sns js-sns">
            <figure class="c-sns__twitter">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_twitter-light.svg" alt="">
            </figure>
            <figure class="c-sns__youtube">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_youtube-light.svg" alt="">
            </figure>
            <figure class="c-sns__instagram">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram-light.svg" alt="">
            </figure>
          </div>
        </nav>
      </div>
    </header>
  </div>
  <div class="p-header__mask js-header-mask"></div>

  <?php if (!is_front_page() && !is_post_type_archive() && !is_tax('genre') && !is_archive() && !is_single() && !is_page('thanks')) { ?>
    <div class="p-fv">
      <div class="p-fv__mask"></div>
      <div class="p-fv__head c-sub-head">
        <h1>
          <span class="c-sub-head-en">
            <?php
            $page = get_post(get_the_ID());
            $slug = $page->post_name;
            echo $slug;
            ?>
          </span>
          <span class="c-sub-head-ja"><?php the_title(); ?></span>
        </h1>
      </div>
      <figure class="p-fv__img">
        <?php
        $alt = get_the_title();
        echo get_thumb_img('full', $alt); //functions.phpで設定した関数
        ?>
      </figure>
    </div>
  <?php
  } elseif (is_post_type_archive(array('menu', 'shop', 'gift')) || is_tax('genre')) { ?>
    <div class="p-fv">
      <div class="p-fv__mask"></div>
      <div class="p-fv__head c-sub-head">
        <h1>
          <span class="c-sub-head-en">
            <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>
          </span>
          <span class="c-sub-head-ja"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
        </h1>
      </div>
      <figure class="p-fv__img">
        <img src="<?php echo get_template_directory_uri(); ?>/images/img_firstview_<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>.png" alt="<?php echo esc_html(get_post_type_object(get_post_type())->label); ?>">
      </figure>
    </div>
  <?php
  } elseif (is_archive() || is_single()) { ?>
    <div class="p-fv">
      <div class="p-fv__mask"></div>
      <div class="p-fv__head c-sub-head">
        <h1>
          <span class="c-sub-head-en">
            news
          </span>
          <span class="c-sub-head-ja">お知らせ</span>
        </h1>
      </div>
      <figure class="p-fv__img">
        <img src="<?php echo get_template_directory_uri(); ?>/images/img_firstview_news.png" alt="お知らせ">
      </figure>
    </div>
  <?php
  } elseif (is_page('thanks')) { ?>
    <div class="p-fv">
      <div class="p-fv__mask"></div>
      <div class="p-fv__head c-sub-head">
        <h1>
          <span class="c-sub-head-en">
            contact
          </span>
          <span class="c-sub-head-ja">お問い合わせ</span>
        </h1>
      </div>
      <figure class="p-fv__img">
        <img src="<?php echo get_template_directory_uri(); ?>/images/img_firstview_contact.png" alt="お問い合わせ">
      </figure>
    </div>
  <?php } ?>

  <!-- ハンバーガーメニュー -->
  <div class="p-header__hamburger c-hamburger js-hamburger">
    <div class="c-hamburger__bars">
      <span class="c-hamburger__bar1"></span>
      <span class="c-hamburger__bar2"></span>
      <span class="c-hamburger__bar3"></span>
    </div>
  </div>