<?php get_header(); ?>
<main>
  <div class="c-breadcrumb l-breadcrumb">
    <div class="c-breadcrumb__inner">
      <?php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
      ?>
    </div>
  </div>

  <div class="p-sub-concept">
    <div class="p-sub-concept__inner l-inner">
      <div class="p-sub-concept__wrapper">
        <div class="p-sub-concept__box">
          <div class="p-sub-concept__body">
            <h2 class="p-sub-concept__head">
              美味しいコーヒーと食事で、<br>最高のひとときを。
            </h2>
            <p class="p-sub-concept__text">
              ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
            </p>
          </div>
          <figure class="p-sub-concept__img1">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_concept1.png" alt="">
          </figure>
        </div>
        <div class="p-sub-concept__box">
          <div class="p-sub-concept__body">
            <h2 class="p-sub-concept__head">
              本場イタリアで培った<br>自慢のパスタ
            </h2>
            <p class="p-sub-concept__text">
              ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
            </p>
          </div>
          <figure class="p-sub-concept__img2">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_concept2.png" alt="">
          </figure>
        </div>
        <div class="p-sub-concept__box">
          <div class="p-sub-concept__body">
            <h2 class="p-sub-concept__head">
              ほどよい甘さの<br>自家製こだわりクロワッサン
            </h2>
            <p class="p-sub-concept__text">
              ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
            </p>
          </div>
          <figure class="p-sub-concept__img3">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_concept3.png" alt="">
          </figure>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/common-access'); ?>
</main>
<?php get_footer();
