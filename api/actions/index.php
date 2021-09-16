<?php
include_once('../database/include.php');
header('X-Frame-Options: DENY');
error_reporting(0);
$conn=getConnection();

try{
    $P_name = $_POST['name'];
    $P_id = $_POST['id'];
    $P_img = $_POST['img'];
}catch(Exception $e){

}


$method = isset($_GET['method'])?$_GET['method']:'none';
$table = isset($_GET['table'])?$_GET['table']:'none';
$name = isset($_GET['name'])?$_GET['name']:'none';
$img = isset($_GET['img'])?$_GET['img']:'none';
$cat_id = isset($_GET['cat_id'])?$_GET['cat_id']:'none';
$id = isset($_GET['id'])?$_GET['id']:'none';

if(empty($method)){
    echo "Error to get Method!";
    exit;
}
if($conn==null){
	echo "Error in Database connection.";
	exit;
}else{


    if($method == "get"){
        //GET
        $conn=getConnection();
        $sql = "SELECT * FROM `$table`";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
        $result1 = mysqli_fetch_assoc($result);
        echo json_encode($result1);
        $conn->close();    
        }
    }elseif($method == "post"){
        //POST
        $conn=getConnection();
        $sql;
        if($table == "products"){
            $P_cat_id = rand(1000,9999);
            $sql = "INSERT INTO `$table` (idCateg, Nome, Imagem) VALUES ('{$P_cat_id}', '{$P_name}', '{$P_img}')";
        }else{
            $sql = "INSERT INTO `$table` (Nome, Imagem) VALUES ('{$P_name}', '{$P_img}')";
        }
        $result = mysqli_query($conn, $sql);
        echo "success";
        $conn->close(); 
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"] . "/admin");
        }
        exit;
    }elseif($method == "put"){
        //PUT
        $conn=getConnection();

        if($table == "products"){
            $cat_id = rand(150,9999);
            $sql = "INSERT INTO `$table` (idCateg, Nome, Imagem) VALUES ('$cat_id', '$name', '$img')";
        }else{
            $sql = "INSERT INTO `$table` (Nome, Imagem) VALUES ('$name', '$img')";
        }
        $result = mysqli_query($conn, $sql);
        echo "success";
        $conn->close(); 

    }elseif($method == "delete"){
         //DELET
         $conn=getConnection();
         $sql = "DELETE FROM `$table` WHERE id='$id'";
         $result = mysqli_query($conn, $sql);
         echo "deleted";
         $conn->close();    
    }



}

?>