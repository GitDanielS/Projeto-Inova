<?php
echo $idAnimal = $_GET['idAnimal'];
echo $status = $_GET['status'];

if($idAnimal != "" || $status != ""){
    try{

        $conexao = new PDO("mysql:dbname=projetoinova;host=localhost","root","");
    
        $statement = $conexao->prepare("UPDATE animais SET status = :status WHERE idAnimais = :idAnimal");
        $statement->bindParam(":status", $status);
        $statement->bindParam(":idAnimal", $idAnimal);
        $statement->execute();
        header("Location: index.php");
    
    }catch(PDOException $erro){
        echo "ERRO";
    }
}else{
    echo "ERRO";
}

?>