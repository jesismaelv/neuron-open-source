<?php
  if($_GET['idea'] == '') {
    $father_id = '0';
  } else {
    $father_id = $_GET['idea'];
  }
  if($_SESSION['id'] > 0) :
    $root_idea = get_single('idea', $father_id);
    if($father_id == '0') {
      $root_idea = [
        'id_user' => $_SESSION['id'],
        'id' => '0',
        'creation' => Date('Y-m-d H:i:s'),
        'date' => Date('Y-m-d H:i:s'),
        'content' => '^Neuron',
      ];
    }
?>

<main class="home">
  <div class="container">
    <?php
      $father_ideas = get_archive('idea', ['order' => 'date', 'son' => $father_id]);
      if($father_id != '0') :
    ?>
      <section class="father-ideas">
        <a href="?idea=0" class="father-home">^Neuron</a>
        <?php
        if(is_array($father_ideas)) :
          foreach($father_ideas as $father_idea) :
          ?>
          <div class="father-idea__wrapper">

            <?php
              $is_first = true;
              include('father-idea.php');
            ?>
          </div>
        <?php
            endforeach;
          endif;
          // <button class="father-idea add-father-idea"> + </button>
        ?>
      </section>
    <?php
      endif;
      $idea = $root_idea;
      $level = 0;
      $levels = 4;
      if($_GET['levels'] != '') {
        $levels = $_GET['levels'];
      }
      include ('idea.php');
    ?>
    <button class="add-idea add-main-idea"
            data-add="idea"
            data-father-id="<?php echo $father_id ?>">
    </button>
  </div>

  <section class="father-search">
    <input type="hidden" id="father-search__current-id" value="">
    <input type="text" name="father-search" id="father-search">
    <section id="father-search__results">
    </section>
    <section class="button-wrapper">
      <button class="button" data-close=".father-search"> Close </button>
    </section>
  </section>
</main>

<?php else :
    header('Location:index.php');
endif;
  ?>