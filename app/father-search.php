<?php
  include('estructura/funciones.php');
  ?>
<ul class="father-results">
  <?php
  $results = '';
  if($_GET['search'] != '') {
    $results = get_archive('idea', ['search' => $_GET['search']]);
  }
  if(is_array($results)) :
  foreach($results as $result) :
?>
  <li>
    <div class="add-as__wrapper">
      <button class="add-as add-as-parent button"
              data-add-as-parent="<?php echo $result['id'].','.$_GET['id'] ?>">
        ⤒
      </button>
      <button class="add-as add-as-child button"
              data-add-as-parent="<?php echo $_GET['id'].','.$result['id'] ?>">
        ⤓
      </button>
    </div>
    <p>
      <span> <?php echo $result['content'] ?> </span>
    </p>
  </li>
<?php
  endforeach;
  endif;
  if($_GET['search'] != '' && false) :
?>
  <li>
    <div class="add-as__wrapper">
      <button class="add-as add-as-parent button"
              data-add-as-parent="<?php echo $_GET['search'] ?>">
        ⤒
      </button>
      <button class="add-as add-as-child button"
              data-add-as-child="<?php echo $result['id'] ?>"> 
        ⤓
      </button>
    </div>
    <p> [+] <span> <?php echo $_GET['search'] ?> </span>
      <input type="hidden" data-add-idea="<?php echo $_GET['search']; ?>">
    </p>
  </li>
</ul>

  <?php endif; ?>