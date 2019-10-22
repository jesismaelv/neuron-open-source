<?php
  include('estructura/funciones.php');

  if($_GET['delete'] == 'true') {
    $has_children = get_archive('idea_relation', ['id_father' => $_GET['id']]);
    if(!is_array($has_children)) {
      if(eliminar('idea', $_GET['id']) &&
         eliminar('idea_relation', ['id_children' => $_GET['id']])) {
        echo 'done';
      } else {
        echo 'Error al eliminar la idea o la idea_relation';
      }
    } else {
      print_x($has_children);
    }
  }

  if(isset($_GET['value'])) {
    $args = [
      'content' => $_GET['value'],
    ];
    if(update('idea', $_GET['id'], $args)) {
      echo 'done';
    } else {
      echo 'error';
    }
  }
?>