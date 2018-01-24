<div class="wrapper-cover">
  <div class="container-fluid">
    <div class="row">
      <div class="cover-content">

        <div class="over">
          <?php print render($image); ?>
        </div>
        
      </div>
    </div>
  </div>
  <div class="over-img"></div>
  <div class="wrapper-container">
    <div class="container">
      <div class="cover-text negative">
        <?php if ($title) : ?>
          <h1 class="text-center spazio-10"><?php print $title; ?></h1>
        <?php endif; ?>
        <div class="lead text-center text-bold cover-subtitle"><?php print render($subtitle); ?></div>
      </div>
    </div>
  </div>
</div>

<div class="wrapper-front-news">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php print render($news); ?>
      </div>
    </div>
  </div>
</div>