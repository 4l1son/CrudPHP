<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    </form>
   <?php
   
    $arr = array(1,2,3,4);
    foreach($arr as &$valor){
        $valor = $valor*2;
       
    }
    print_r($arr);
   

    ?>
    
</body>
</html>