<?php
  if (!$level) {
    $level = 1;
  }
  $is_ajax = false;
  if($idea == NULL) {
    $is_ajax = true;
    include('estructura/funciones.php');
    $ideaArgs = [
      'id_user' => $_SESSION['id'],
      'content' => '',
    ];
    if($_GET['date'] != '') {
      $date = $_GET['date'];
      $ideaArgs['date'] = $date;
    }
    $id = registrar('idea', $ideaArgs);
    $idea = get_single('idea', $id);
    $sub_idea_relationship_args = [
      'id_father' => $_GET['father'],
      'id_children' => $id,
      'id_user' => $_SESSION['id'],
    ];
    $father_id = $_GET['father'];
    $id_relation = registrar('idea_relation', $sub_idea_relationship_args);
    // $relation = get_single('idea_relation', $id_relation);
  }

  if(!function_exists("idea")) :
    function idea($father_id, $idea, $level, $levels) {
      $sub_ideas = get_archive('idea', ['order' => 'date', 'father' => $idea['id']]);
      $parent_ideas = get_archive('idea', ['order' => 'date', 'son' => $idea['id']]);
  ?>
    <article class="idea" data-idea="<?php echo $idea['id'] ?>">
      <div class="idea__content__wrapper">
        <h1 data-father-id="<?php echo $father_id ?>" class="idea__content" <?php if($idea['id'] !== '0') echo 'contenteditable' ?> data-update-id="<?php echo $idea['id'] ?>"><?php echo $idea['content']; ?></h1>
        <a href="./?idea=<?php echo $idea['id'] ?>" class="goto-idea">
          <?php
            if(!is_array($sub_ideas)) $count = 0;
            else $count = count($sub_ideas);
            if(!is_array($parent_ideas)) $parent_count = 0;
            else $parent_count = count($parent_ideas);
          ?>
            <span class="sub-ideas__counter">
              <?php echo $parent_count ?> ⤒
            </span>
            <span class="sub-ideas__counter">
              <?php echo $count ?> ⤓
            </span>
          </a>
        <button class="hide-children"
                data-toggle="--hide"
                data-target="[data-idea='<?php echo $idea['id'] ?>']">
        </button>
      </div>
      <section class="idea__children">

        <?php
          if(is_array($sub_ideas) && $level <= $levels) {
            $level += 1;
            $father_id = $idea['id'];
            foreach($sub_ideas as $idea) {
              include ('idea.php');
            }
          }
        ?>
      </section>
    </article>
<?php
      }
endif;
  idea($father_id, $idea, $level, $levels);
?>