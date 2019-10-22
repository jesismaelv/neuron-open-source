<?php 
  include('estructura/funciones.php');
  $page_title = __('inicio');
  include('estructura/cabecera.php');

  if($_SESSION['id'] > 0) {
    include ('home.php');
  }
  else {
    include ('public-home.php');
  }

  include('estructura/footer.php');
?>