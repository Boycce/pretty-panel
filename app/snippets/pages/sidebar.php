<aside class="sidebar">

  <a class="sidebar-toggle" href="#sidebar" data-hide="<?php _l('options.hide') ?>"><span><?php _l('options.show') ?></span></a>

  <div class="sidebar-content section">

    <?php 
    $widgetPage = false;
    foreach (c::get('widgetPages') as $item) {

      // Check if page slug & parent pages are widget page.
      if ($page->slug() == $item) 
        $widgetPage = true;

      foreach ($page->parents()->flip() as $parent) 
        if ($parent->slug() == $item) 
          $widgetPage = true;
    } 
    ?>

    <h2 class="hgroup hgroup-single-line hgroup-compressed cf">
      <span class="hgroup-title">
        <?php echo (($widgetPage)? $page->title() : l('pages.show.settings')) ?>
      </span>
    </h2>

    <ul class="nav nav-list sidebar-list">

      <?php if ($widgetPage): ?>
      <li>
        <a title="b" data-shortcut="b" href="#/">
          <?php i('arrow-circle-left', 'left') . _l('metatags.back') ?>
        </a>
      </li>
      <?php endif; ?>

      <?php if($preview): ?>
      <li>
        <a title="p" data-shortcut="p" data-shortcut="u" href="<?php echo $preview ?>" target="_blank">
          <?php i('play-circle-o', 'left') . _l('pages.show.preview') ?>
        </a>
      </li>
      <?php endif ?>

      <?php if(!$page->isHomePage() and !$page->isErrorPage() and !$widgetPage): ?>
      <li>
        <a title="u" data-shortcut="u" href="<?php echo purl($page, 'url') ?>">
          <?php i('chain', 'left') . _l('pages.show.changeurl') ?>
        </a>
      </li>
      <?php endif; ?>

      <?php if($deletable): ?>
      <li>
        <a title="#" data-shortcut="#" href="<?php echo purl($page, 'delete') ?>">
          <?php i('trash-o', 'left') . _l('pages.show.delete') ?>
        </a>
      </li>
      <?php endif ?>
    </ul>

    <?php echo $subpages ?>

    <?php echo $files ?>

  </div>

</aside>