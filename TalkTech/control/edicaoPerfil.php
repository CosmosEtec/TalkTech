<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifique se a imagem é real ou falsa
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
  } else {
    echo "File is not an image.";
  }
}

// Aqui você pode adicionar código para salvar o caminho da nova imagem de perfil no banco de dados
?>