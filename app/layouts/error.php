<!DOCTYPE html>
<html lang="en">
  <head>

    <?php echo $meta ?>

    <title><?php __(site()->title() . ' | ' . l('error')) ?></title>

    <?php echo assets::css() ?>
    <link rel="stylesheet" href="<?php echo url('panel/assets/css/custompanel.css')?>">
    <link rel="icon" href='<?php echo url('panel/assets/images/favicon.ico')?>' sizes="32x32">

  </head>
  <body class="app">

    <?php echo $content ?>
    <?php echo assets::js() ?>

    <script>

      // init all global dropdowns
      $(document).dropdown();

    </script>

  </body>
</html>