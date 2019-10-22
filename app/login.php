<?php
  include('estructura/funciones.php');
  $page_title = __('login');

  if($_SESSION['id'] > 0) {
    header("Location: index.php");
  }

  if($_POST != NULL) {
    $error['status'] = 'ok';
    foreach($_POST as $key => $value) {
      if($value == '') {
        $error['status'] = 'not-ok';
        $status = 'Please fill out all the fields';
      }
    }
    if($error['status'] == 'ok') {
      if( login($_POST) ){
        html_redirect('index.php');
      }
      else {
        $status = 'Incorrect password or email. Please try again.';
      }
    }
  }

  include('estructura/cabecera.php');
?>
<main class="login-page">

  <div class="login-content">
  <?php
    if($status != '') {
      notice($status, 'warning');
      $class = 'nay-nay';
    }
  ?>
    <h1> <?php __e('login') ?> </h1>
    <form action="login.php" class="<?php echo $class ?>" method='post'>
      <div class="input-group">
        <label> Email </label>
        <input type="email" name="email" required>
      </div>
      <div class="input-group">
        <label> Password </label>
        <input type="password" name="password" required>
      </div>
      <div class="form-button">
        <button class='button'> Login </button>
        <p> Don't have an account?
          <a href='register.php' class="link"> Register </a>
        </p>
      </div>
    </form>
  </div>
</main>
<?php
  include('estructura/footer.php');
?>