<?php
  if (!$level) {
    $level = 1;
  }

  if(!function_exists("father_idea")) :
    function father_idea($child_id, $father_idea, $level, $root_idea) {
      $father_id = $father_idea['id'];
      $child_id = $root_idea['id'];
  ?>

      <div class="father-idea">
        <button class="remove-as-parent" data-remove-as-parent="<?php echo "$father_id,$child_id" ?>"> X </button>
        <a href="?idea=<?php echo $father_idea['id'] ?>" >
          <?php echo $father_idea['content']; ?>
        </a>


      </div>

      <?php
        $parent_ideas = get_archive('idea', ['order' => 'date', 'son' => $father_idea['id']]);
        if(is_array($parent_ideas) && $level <= 3) {
          $level += 1;
          foreach($parent_ideas as $father_idea) {
            include ('father-idea.php');
          }
        }
      ?>
<?php
      }
endif;
  father_idea($child_id, $father_idea, $level, $root_idea);
?>