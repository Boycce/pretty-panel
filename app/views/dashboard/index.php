<?php echo $topbar ?>

<div class="section">

  <div class="dashboard">

    <div class="section white dashboard-section">

      <h2 class="hgroup hgroup-single-line hgroup-compressed cf">
        <span class="hgroup-title">
          <?php _l('dashboard.index.pages.title') ?>
        </span>
        <span class="hgroup-options shiv shiv-dark shiv-left">
          <span class="hgroup-option-right">

            <?php 
              if (is_array(c::get('pageOrdering')))
                foreach (c::get('pageOrdering') as $title)
                  if ($title == 'Dashboard') $show = true;

              if (c::get('pageOrdering') === true || is_null(c::get('pageOrdering')) || isset($show)): 
            ?>
            <a title="<?php _l('dashboard.index.pages.edit') ?>" href="#/subpages/index/">
              <?php i('pencil', 'left') ?><span><?php _l('dashboard.index.pages.edit') ?></span>
            </a>
            <?php endif ?>

            <a title="+" data-shortcut="+" href="#/pages/add/">
              <?php i('plus-circle', 'left') ?><span><?php _l('dashboard.index.pages.add') ?></span>
            </a>
          </span>
        </span>
      </h2>

      <ul class="nav nav-list sidebar-list">
      <?php if (c::get('pageOrdering') === true || is_null(c::get('pageOrdering')) || isset($show)): ?>
        <?php foreach($site->children() as $c): ?>
        <?php echo new Snippet('pages/sidebar/subpage', array('subpage' => $c)) ?>
        <?php endforeach ?>

      <?php else: ?>
        <?php foreach($site->children()->visible()->sortBy('title', 'asc') as $c): ?>
        <?php echo new Snippet('pages/sidebar/subpage', array('subpage' => $c)) ?>
        <?php endforeach ?>

        <?php foreach($site->children()->invisible()->sortBy('title', 'asc') as $c): ?>
        <?php echo new Snippet('pages/sidebar/subpage', array('subpage' => $c)) ?>
        <?php endforeach ?>
      <?php endif ?>
      </ul>

    </div>


    <?php foreach($widgets as $widget): ?>
    <div class="section white dashboard-section">

      <h2 class="hgroup hgroup-single-line cf">
        <span class="hgroup-title">
          <?php __($widget['title']) ?>
        </span>
      </h2>

      <?php echo $widget['html']() ?>

    </div>
    <?php endforeach ?>


    <div class="section white dashboard-section">

      <h2 class="hgroup hgroup-single-line cf">
        <span class="hgroup-title">
          <?php _l('dashboard.index.metatags.title') ?>
        </span>
      </h2>

      <div class="field">
        <div class="input input-is-readonly input-with-tags">

          <?php foreach($site->content()->toArray() as $key => $meta): ?><!--
       --><a class="tag" href="#/metatags/<?php __($key) ?>"><span class="tag-label"><?php __($key) ?></span></a><!--
       --><?php endforeach ?>

        </div>
      </div>
    </div>

    <?php if (!c::get('hideHistory')): ?>
    <div class="section white dashboard-section">

      <h2 class="hgroup hgroup-single-line cf">
        <span class="hgroup-title">
          <?php _l('dashboard.index.history.title') ?>
        </span>
      </h2>

      <div class="field">

        <div class="dashboard-box">
          <?php if(empty($history)): ?>
          <div class="text"><?php _l('dashboard.index.history.text') ?></div>
          <?php else: ?>
          <ul>
            <?php foreach($history as $item): ?>
            <li>
              <a title="<?php __($item->title()) ?>" href="<?php _u($item, 'show') ?>">
                <?php i('file-o', 'left') . __($item->title()) ?>
              </a>
            </li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>

      </div>
    </div>
    <?php endif ?>

  </div>

</div>
