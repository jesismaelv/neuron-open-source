<?php
  if($_SESSION['id'] > 0) :
    if($_POST != null) {
      if($_POST['delete'] != '') {
        eliminar('idea', $_POST['delete']);
      }
      else {
        $args = [
          'content' => $_POST['idea'],
          'id_user' => $_SESSION['id'],
        ];
        if($_POST['date'] != '') {
          $args['date'] = $_POST['date'];
        }
        registrar('idea', $args);
      }
    }
    $ideas = get_archive('idea', ['order' => 'date']);
?>

<main class="home">
  <form action="/" method="post">
    <div class="container">
      <header class="home__header">
        <h2> Base </h2>
      </header>
      <?php foreach($ideas as $idea) : ?>
        <div class="idea-list__item__wrapper">
          <p class="idea-list__item"> <?php echo $idea['content'] ?></p>
          <div class="idea__details">
            <span class="idea__date --creation"> <?php echo $idea['creation'] ?> </span>
            <span class="idea__date --assigned"> <?php echo $idea['date'] ?> </span>
          </div>
          <?php
            $new_date = date('Y-m-d H:i:s',strtotime('+1 second',strtotime($idea['date'])));
          ?>
          <label class="date-selector --inline-selector">
            <input type="radio" class="new-date" name='date' value="<?php echo $new_date ?>">
            <span class="checkbox-appearance"> [+] </span>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="_welcome-ideas">
      <section class="container">
        <label class='date-selector --current-date'>
          <input type="radio" class="new-date" name='date'>
          <span class="checkbox-appearance"> [+] Today </span>
        </label>
        <input class="idea-input" id="idea-input" name="idea">
        <div class="button-wrapper">
          <button class="button --primary"> Save </button>
        </div>
      </section>
    </div>
  </form>
</main>

<script>
  document.getElementById("idea-input").focus();
  window.scrollTo(0,document.body.scrollHeight);

</script>


<?php else :
    header('Location:index.php');
endif;
  ?>