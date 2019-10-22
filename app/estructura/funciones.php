<?php
  date_default_timezone_set('America/Tijuana');

  session_start();
  $function_action = $_POST['action'];
  if($_POST['action'] != '') {
    call_user_func($function_action);
  }

  if($_SESSION['idioma'] == 'EN_US') {
    $_SESSION['idioma'] = 'ES_MX';
  }
  $strings = [];
  $strings['EN_US'] = [
    'tutorial' => 'Tutorial',
    'porfile' => 'Porfile',
    'donate' => 'Donate'
  ];

  $strings['ES_MX'] = [
    'tutorial' => 'Tutorial',
    'porfile' => 'Perfil',
    'donate' => 'Donar'
  ];

  function print_x($var, $die = false) {
    echo "<pre>";
      print_r($var);
    echo "</pre>";

    if($die) die();
  }

  function notice($str, $class = '') {
    echo "<div class='notice $class'> $str </div>";
  }

  function html_redirect($url) {
    echo "<meta http-equiv='refresh' content='0; URL='$url' />";
  }

  function check_session() {
    if($_SESSION['id'] > 0) {
      return true;
    }
    else {
      html_redirect('index.php');
    }
  }

  function flash_message( $str = false) {
    $_SESSION['notflash'] = 'hola';
    if($str) {
      $_SESSION['flash'] = $str;
      $_SESSION['notflash'] = 'Le hice set a flash';
    }
    else {
      $str = $_SESSION['flash'];
      $_SESSION['notflash'] = 'Es flash no es falso';

      if($str != '') {
        $_SESSION['notflash'] = 'Ya tiene flash.';
        notice( $str );
        $_SESSION['notflash'] .= ' y te muestro el fhash!';
      }
      $_SESSION['flash'] = '';
      unset($_SESSION['flash']);
    }
  }

  function __e($srt) {
    echo __($srt);
    return;
  }

  function __($str) {

    global $strings;
    $idioma = $_SESSION['idioma'];
    $nstr = $strings[$idioma][$str];
    if( $nstr != '') {
      return $nstr;
    }
    else {
      $str = ucfirst($str);
      $str = str_replace('-', ' ', $str);
      return $str;
    }
  }

  function email_exist($email) {
    $db = mysqli_connect('db','root','root','main');
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      $result = true;
    }
    else {
      $result = false;
    }
    $db->close();
    return $result;
  }


  function login($data) {
    $email = $data['email'];
    $password = md5($data['password']);
    $db = mysqli_connect('db','root','root','main');
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) :
        $_SESSION = $row;
        $res = true;
        $_SESSION['options'] = get_options();
      endwhile;
    }

    else {
      $res = false;
    }
    $db->close();
    return $res;
  }

  function update($table, $id, $args) {
    $db = mysqli_connect('db','root','root','main');
    $primero = true;
    $update = '';
    foreach($args as $index => $value) {
      if($primero) {
        $update .= "$index = '$value'";
        $primero = false;
      }
      else {
        $update .= ", $index = '$value'";
      }
    }
    $usr = $_SESSION['id'];
    $query = "UPDATE $table SET $update WHERE id = '$id' AND id_user = $usr";
    $result = $db->query($query);
    return $result;
  }

  function registrar($table, $args) {
    $db = mysqli_connect('db','root','root','main');
    $primero = true;
    $attributes = '';
    $values = '';
    foreach($args as $index => $value) {
      if($index == 'password2' || $index == 'terms'){ continue; }
      if($index == 'password') $value = md5($value);
      if($index == 'email') $value = strtolower($value);
      if($primero) {
        $attributes .= "$index";
        $values .=  "'$value'";
        $primero = false;
      }
      else {
        $attributes .= ", $index";
        $values .=  ", '$value'";
      }
    }
    $query = "INSERT INTO $table ( $attributes ) VALUES ( $values )";
    $result = $db->query($query);
    if($result === true) {
      $id = $db->insert_id;
      $db->close();
      return $id;
    }
    $db->close();
    return $result;
  }

  function update_imagen($table,$id,$index) {
    $db = mysqli_connect('db','root','root','main');
    if($_FILES[$index]['tmp_name'] != '') {
      $url = "./img/$table/$id/";
      $image = subir_imagen($index, $index, $url);
      if($image) {
        $query = "UPDATE $table SET $index = '$image' WHERE id = '$id'";
        $result = $db->query($query);
        return $result;
      }
      else {
        return false;
      }
    }
  }

  function get_archive($table, $args = null) {
    $db = mysqli_connect('db','root','root','main');
    $usr = $_SESSION['id'];
    $query = "SELECT * FROM $table";

    if($args['father'] != null) {
      $id_father = $args['father'];
      if($id_father == '0') {
        $query .= " WHERE (id IN (SELECT id_children FROM idea_relation WHERE id_father = '$id_father' ) || id NOT IN (SELECT id_children FROM idea_relation))";
      } else {
        $query .= " WHERE id IN (SELECT id_children FROM idea_relation WHERE id_father = '$id_father' )";
      }
    }
    if($args['son'] != null) {
      $id_son = $args['son'];
      $query .= " WHERE id IN (SELECT id_father FROM idea_relation WHERE id_children = $id_son ) AND id_user = '$usr'";
    }
    if($args['search']) {
      $search = $args['search'];
      $query .= " WHERE content LIKE '$search%'";
    }
    $query .= " AND id_user = '$usr'";
    if($args['order'] != '') {
      $query .= ' ORDER BY ' . $args['order'] . ' ASC, idea.creation ASC';
    }



    $is_first = true;
    $where_query = '';
    foreach($args as $cell => $value) {
      $skip = ['order', 'father', 'son', 'search'];
      if(!in_array($cell, $skip)) {
        if($is_first) {
          $where_query .= " $cell = $value ";
          $is_first = false;
        } else {
          $where_query .= " AND $cell = $value ";
        }
      }
    }
    if(!$is_first) {
      $query .= ' WHERE' . $where_query;
    }

    $result = $db->query($query);
    $resultados = [];
    $i = 0;
    if ($result->num_rows > 0) :
        while($row = $result->fetch_assoc()) :
          $resultados[$i] = $row;
          $i++;
        endwhile;
    else :
      $resultados = false;
    endif;
    $db->close();
    return $resultados;
  }

  function get_single($table, $id) {
    $db = mysqli_connect('db','root','root','main');
    $query = "SELECT * FROM $table WHERE id = '$id'";
    $result = $db->query($query);
    if ($result->num_rows > 0) :
        while($row = $result->fetch_assoc()) :
          $resultados = $row;
        endwhile;
    else :
      $resultados = false;
    endif;
    $db->close();
    return $resultados;
  }

  function eliminar($table, $args = []) {
    if(!is_array($args)) {
      $id = $args;
      $where_query = "id = '$id'";
    } else {
      $is_first = true;
      foreach($args as $cell => $value) {
        if($is_first) {
          $is_first = false;
          $where_query .= "$cell = '$value' ";
        } else {
          $where_query .= " AND $cell = '$value'";
        }
      }
    }
    $db = mysqli_connect('db','root','root','main');
    $usr = $_SESSION['id'];
    $query = "DELETE FROM $table WHERE $where_query AND id_user = '$usr' ";
    $result = $db->query($query);
    $db->close();
    return $result;
  }

  function eliminar_imagenes($url) {
    if(is_dir($url)){
        $files = glob( $url . '*', GLOB_MARK );
        foreach( $files as $file ){
          eliminar_imagenes( $file );
        }
        rmdir( $url );
    } elseif(is_file($url)) {
        unlink( $url );
    }
  }

  function subir_imagen($input, $nombre, $url) {
    $name = basename($_FILES[$input]["name"]);
    $tipo = strtolower(pathinfo($name,PATHINFO_EXTENSION));
    if (!is_dir($url)) {
      mkdir($url);
    }
    $url = $url . $nombre . "." . $tipo;
    if ( move_uploaded_file($_FILES[$input]["tmp_name"], $url ) ) {
      return $url;
    }
    else {
      return false;
    }
  }

  function update_options() {
    $id_user = $_SESSION['id'];
    $slug = $_POST['option'];
    $value = $_POST['value'];
    if( get_option($slug) ) {
      $status = update_option_value($slug, $value);
    }
    else {
      $status = register_option_value($slug, $value);
    }
    if($status === true) {
      $_SESSION['options'][$slug] = $value;
      echo 'done';
    }
    return false;
  }

  function get_option($slug) {
    $db = mysqli_connect('db','root','root','main');
    $id_user = $_SESSION['id'];
    $query = "SELECT * FROM user_option WHERE id_user = '$id_user' AND slug = '$slug'";
    $result = $db->query($query);
    if ($result->num_rows > 0) :
      while($row = $result->fetch_assoc()) :
          $resultados = $row;
        endwhile;
    else :
      $resultados = false;
    endif;
    $db->close();
    return $resultados;
  }

  function get_options() {
    $db = mysqli_connect('db','root','root','main');
    $id_user = $_SESSION['id'];
    $query = "SELECT * FROM user_option WHERE id_user = '$id_user'";
    $result = $db->query($query);

    $resultados = [];
    if ($result->num_rows > 0) :
      while($row = $result->fetch_assoc()) :
          $resultados[$row['slug']] = $row['val'];
        endwhile;
    else :
      $resultados = false;
    endif;
    $db->close();
    return $resultados;
  }

  function update_option_value( $slug, $value) {
    $db = mysqli_connect('db','root','root','main');
    $id_user = $_SESSION['id'];
    $query = "UPDATE user_option SET val = '$value' WHERE id_user = '$id_user' AND slug = '$slug'";
    $result = $db->query($query);
    $db->close();
    return $result;
  }

  function register_option_value( $slug, $value) {
    $db = mysqli_connect('db','root','root','main');
    $id_user = $_SESSION['id'];
    $query = "INSERT INTO user_option ( id_user, slug, val ) VALUES ( '$id_user','$slug','$value' )";
    $result = $db->query($query);
    $db->close();
    return $result;
  }

  function no_results($str = false) {
    if( $str == false) {
      $str = $_POST['message'];
    }
    echo "<div class='no_results'>$str</div>";
  }

