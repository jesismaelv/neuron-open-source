<?php
  include('estructura/funciones.php');
  $args = [
    'id_father' => $_GET['father-id'],
    'id_children' => $_GET['child-id'],
  ];
  $similar_relations = get_archive('idea_relation', $args);
  if($_GET['action'] == 'add') {
    if(is_array($similar_relations)) {
      echo 'done';
    } else {
      $id = registrar('idea_relation', $args);
      if($id > 0) {
        echo 'done';
      } else {
        echo 'error';
      }
    }
  }

  if($_GET['action'] == 'remove') {
    $args = [
      'id_father' => $_GET['father-id'],
      'id_children' => $_GET['child-id'],
    ];
    $result = eliminar('idea_relation', $args);
    if($result) {
      echo 'done';
    } else {
      echo 'error';
      echo $similar_relations . "::";
      print_x($args);
      print_x($_GET);
      print_x($result);
    }
  }

?>