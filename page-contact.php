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

  <div class="p-sub-contact">
    <div class="p-sub-contact__inner">
      <div class="p-sub-contact__wrapper">
        <h2 class="p-sub-contact__head">お問い合わせフォーム</h2>
        <p class="p-sub-contact__text">お問い合わせ内容に応じて、項目をご選択のうえ、お気軽にお問い合わせください。</p>
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/common-access') ?>
</main>
<?php get_footer(); ?>