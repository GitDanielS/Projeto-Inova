<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Faça seu cadastro para poder adotar!</h1>
      <p class="py-6 text-2xl">Adotar um animal é dar uma segunda chance à vida, um gesto de amor que enche o coração de quem doa e de quem recebe uma família para chamar de sua 🐾💖.</p>
    <label class="swap swap-flip mx-[30%]">
      <!-- this hidden checkbox controls the state -->
      <input type="checkbox" />
      <div class="swap-on">
        <div class="badge badge-primary" style="width: 300px; height: 150px;"><p class="text-9xl">&#128150;</p></div>
      </div>
      <div class="swap-off">
        <div class="badge badge-primary" style="width: 300px; height: 150px;"><p class="text-9xl">&#128054;</p></div>
      </div>
    </label>
    </div>
    <div class="card flex-shrink-0 w-[500px] shadow-2xl bg-base-100 mr-7">
      <form action="telaCadastroUsuario.php" class="card-body" method="post">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Nome</span>
          </label>
          <input name="nomeUsuario" type="text" placeholder="nome do usuário" class="input input-bordered" required />
        </div>
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
        <div class="form-control">
          <label class="label">
            <span class="label-text">Telefone</span>
          </label>
          <input name="telefone" type="text" placeholder="insira seu telefone" class="input input-bordered" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Cidade</span>
          </label>
          <input name="cidade" type="text" placeholder="insira sua cidade" class="input input-bordered" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Estado</span>
          </label>
          <input name="estado" type="text" placeholder="insira seu estado" class="input input-bordered" required />
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
    $nome = $_POST["nomeUsuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    // Teste de variaveis
    // echo "<h1>$nomeUsuario<h1/>";
    // echo "<h1>$email<h1/>";
    // echo "<h1>$senha<h1/>";
    // echo "<h1>$cidade<h1/>";
    // echo "<h1>$estado<h1/>";

    if($nome != "" || $email != "" || $senha != "" || $cidade != "" || $estado !="" || $telefone != ""){
      try{
        //Estabelecendo uma conexão com o banco de dados
        $conexao = new PDO("mysql:dbname=projetoinova;host=localhost","root","");

        //Aqui vai inserir os dados no banco de dados
        $statement = $conexao->prepare("INSERT INTO usuario VALUES(0,'','$nome','$telefone','$email',md5(sha1('$senha')),'$cidade','$estado')");
        $statement->execute();
        echo '<script>window.location.replace("index.php");</script>';

        // echo "<h1>Cadastrado com sucesso</h1>";
        // echo "<h1>Já pode matricular alunos e professores</h1>";
        
      }catch(PDOException $erro){
        echo "Ocorreu um erro".$erro->getMessage();
      }
    
    }else{
      header("Location: telaCadastroUsuario.php");

    }
?>

</body>
</html>
