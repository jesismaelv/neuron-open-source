<?php
  include('estructura/funciones.php');
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
    if($_POST['password'] != $_POST['password2']) {
      $error['status'] = 'not-ok';
      $error['password'] = "Passwords don't match";
    }
    if( email_exist($_POST['email']) ){
      $error['status'] = 'not-ok';
      $error['email'] = "Email already in use.";
    }
    if($error['status'] == 'ok') {
      $id = registrar('user', $_POST);
      if( $id > 0 ){
        flash_message( 'Thank you for registering!' );
        $_SESSION = get_single('user', $id);
        header('Location: index.php');
      }
      else {
        $status = "An error occured, please try again later";
      }
    }
  }

  $page_title = __('register');
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
    <h1> <?php __e('register') ?> </h1>
    <form action="register.php" class="<?php echo $class ?>" method='post'>
      <div class="input-group">
        <label> Name </label>
        <input type="text" name="name" value="<?php echo @$_POST['name'] ?>" required>
      </div>
      <div class="input-group">
        <label> Email </label>
        <input type="email" name="email" value="<?php echo @$_POST['email'] ?>" required>
        <?php if($error['email']) echo "<p class='error'>".$error['email']."</p>" ?>
      </div>
      <div class="input-group">
        <label> Password </label>
        <input type="password" name="password" required>
      </div>
      <div class="input-group">
        <label> Repeat password </label>
        <input type="password" name="password2" required>
        <?php if($error['password']) echo "<p class='error'>".$error['password']."</p>" ?>
      </div>
      <div class="input-group">
        <label>
          <input type="checkbox" name='terms' required>
          <?php __e('accept-terms') ?>
        </label>
      </div>
      <div class="form-button">
        <button class='button'> Make account </button>
      </div>
    </form>
  </div>
</main>
<?php
  include('estructura/footer.php');
?>