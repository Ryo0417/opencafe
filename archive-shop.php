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
  <div class="p-sub-shop">
    <div class="p-sub-shop__inner">

      <div class="p-sub-shop__wrapper p-infomation">
        <?php if (have_posts()) : while (have_posts()) : the_post() ?>
            <div class="p-infomation__content">
              <h2 class="p-infomation__head"><?php the_field('shop_name') ?></h2>
              <figure class="p-infomation__img p-infomation__img--shop">
                <?php the_field('googlemap') ?>
              </figure>
              <div class="p-infomation__body p-infomation__body--shop">
                <dl class="p-infomation__list">
                  <div class="p-infomation__address">
                    <dt>住所</dt>
                    <dd><?php the_field('shop_address') ?></dd>
                  </div>
                  <div class="p-infomation__tel">
                    <dt>tel</dt>
                    <dd><?php the_field('shop_tel') ?></dd>
                  </div>
                  <div class="p-infomation__tel">
                    <dt>mail</dt>
                    <dd><?php the_field('shop_mail') ?></dd>
                  </div>
                </dl>
                <dl class="p-infomation__list">
                  <div class="p-infomation__hour">
                    <dt>営業時間</dt>
                    <dd><?php the_field('shop_open') ?></dd>
                  </div>
                  <div class="p-infomation__close">
                    <dt>定休日</dt>
                    <dd><?php the_field('shop_close') ?></dd>
                  </div>
                  <div class="p-infomation__seat">
                    <dt>座席</dt>
                    <dd><?php the_field('shop_seats') ?></dd>
                  </div>
                </dl>
              </div>
            </div>
        <?php endwhile;
        endif ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/common-access'); ?>
</main>


<?php get_footer(); ?>