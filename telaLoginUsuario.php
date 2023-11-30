<?php
session_start();
$email = @$_POST["email"];
$senha = @$_POST["senha"];


// echo "<h1>$email</h1>";
// echo "<h1>$senha</h1>";

if($email != "" || $senha != ""){

  try{
    $conexao = new PDO("mysql:dbname=projetoinova;host=localhost","root","");

    $statement = $conexao->prepare("SELECT * FROM usuario WHERE email = :email AND senha = md5(sha1(:senha))");
    $statement->bindParam(":email", $email);
    $statement->bindParam(":senha", $senha);

    $statement->execute();

    //$consulta = $statement->fetch(PDO::FETCH_ASSOC);
    //$email = $consulta["email"];
    //$senha = $consulta["senha"];
    //$nome = $consulta['nomeUsuario'];

      $consulta = $statement->fetch(PDO::FETCH_ASSOC);
      @$_SESSION['$nomeUsuario'] = $consulta['nomeUsuario'];
      @$_SESSION['$idUsuario'] = $consulta['idUsuario'];
      @$_SESSION['$telefone'] = $consulta['telefone'];    

    if(!empty($consulta)){
       header("Location: index.php");

    }else{
      $mensagem = "Informações incorretas,tente novamente";
    }

  }catch(PDOEXception $erro){
    $mensagem = "Ocorreu um erro".$erro->getMessage();
  }
}else{
  $mensagem = "Tem campo sem preencher";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Faça seu Login!</h1>
      <p class="py-6 text-2xl">Preencha os campos com seus dados</p>
    </div>
    <div class="card flex-shrink-0 w-[400px] shadow-2xl bg-base-100 mr-7">
      <form action="telaLoginUsuario.php" class="card-body" method="post">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input name="email" type="email" placeholder="exemplo@gmail.com" class="input input-bordered" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Senha</span>
          </label>
          <input name="senha" type="password" placeholder="senha" class="input input-bordered" required />
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Login</button>
          
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>