<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body>
<form method="POST" ENCTYPE="multipart/form-data">
   <input type="file" name="plik"/><br/>
   <input type="submit" value="Wyslij plik"/>
</form>
<?php
            $typzdj = $_FILES['plik']['type'];

    echo $_SERVER['DOCUMENT_ROOT'];
    echo $typzdj;
    $rozszerenia = array("jpg","png","avif","gif");
    if(isset($_FILES['plik'])){
    move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/zpalinska2d2/czat/zdj/'.$_FILES['plik']['name']);
    }
    ?>

</body>
</html>