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
  </div>
  <div class="p-sub-gift">
    <div class="p-sub-gift__inner l-inner">
      <div class="p-sub-gift__content">
        <ul class="p-sub-gift__items">
          <?php if (have_posts()) : while (have_posts()) : the_post() ?>
              <li class="p-sub-gift__item">
                <figure class="p-sub-gift__img">
                  <?php $image = get_field('gift_img');
                  if (!empty($image)) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif; ?>
                </figure>
                <div class="p-sub-gift__body">
                  <h2 class="p-sub-gift__title"><?php the_title(); ?></h2>
                  <span class="p-sub-gift__price"><?php the_field('gift_price') ?></span>
                  <div class="p-sub-gift__link">
                    <a href="#">ショップで確認する</a>
                  </div>
                </div>
              </li>
          <?php endwhile;
          endif ?>
        </ul>
        <div class="p-sub-gift__wrapping p-sub-wrapping">
          <div class="p-sub-wrapping__content">
            <div class="p-sub-wrapping__body">
              <h3 class="p-sub-wrapping__head">
                ラッピングは無料でお付けいたします。<br class="u-desktop">お気軽にご相談ください。
              </h3>
              <p class="p-sub-wrapping__text">
                テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。
              </p>
            </div>
            <figure class="p-sub-wrapping__img">
              <img src="<?php echo get_template_directory_uri(); ?>/images/img_wrapping.jpg" alt="ラッピング画像">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/common-access'); ?>
</main>
<?php get_footer(); ?>