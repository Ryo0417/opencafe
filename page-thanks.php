<?php get_header(); ?>
<main>
  <div class="c-breadcrumb">
    <div class="c-breadcrumb__inner">
      <?php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
      ?>
    </div>
  </div>
  <div class="p-thanks">
    <div class="p-thanks__inner l-inner">
      <div class="p-thanks__content">
        <h2 class="p-thanks__head">送信が完了しました</h2>
        <p class="p-thanks__text">お問い合わせありがとうございました。<br>
          3営業日以内に返信いたしますので、しばらくお待ちいただけますと幸いです。</p>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/common-access'); ?>
</main>
<?php get_footer(); ?>