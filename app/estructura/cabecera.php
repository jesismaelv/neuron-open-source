
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" href="img/favicon.png" />

  <title> Nemo - <?php echo @$page_title; ?> </title>
</head>
<body>
  <header class="fixed-header">
    <nav class="main-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php
              if($_SESSION['id'] > 0) : ?>
              <p> <?php echo $_SESSION['name']; ?></p>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <div class="menu__links">
              <?php
                if($_SESSION['id'] > 0) {
                  $action = 'logout';
                }
                else {
                  $action = 'register';
              ?>
                <a href="login.php" class="menu__link menu__link__second-action"> Login </a>
              <?php
                }
              ?>
              <a href="./<?php echo $action; ?>.php" class="menu__link menu__link__action"> <?php __e($action); ?> </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>

  <?php flash_message(); ?>