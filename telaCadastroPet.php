<?php
session_start();
$idUsuario = $_SESSION['$idUsuario'];
$telefoneDono = $_SESSION['$telefone'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro dos Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Faça o cadastro do seu pet!</h1>
      <p class="py-6 text-2xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati libero, veritatis ut assumenda id, neque omnis asperiores expedita sit odio atque magnam placeat nihil animi ipsa aliquam, incidunt aliquid? Expedita! 🐾💖.</p>
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
      <form action="telaCadastroPet.php" class="card-body" method="post" enctype="multipart/form-data">
      <div class="form-control">
          <label class="label">
            <span class="label-text">Nome do pet</span>
          </label>
          <input name="nomePet" type="text" placeholder="nome do pet" class="input input-bordered" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Foto do seu pet</span>
          </label>
          <input name="fotoPet" type="file" accept="image/*" required />
        </div>
        <!-- <div class="form-control">
          <label class="label">
            <span class="label-text">Tipo de animal</span>
          </label>
          <input name="tipoAnimal" type="text" placeholder="tipo do pet" class="input input-bordered" required />
        </div> -->

        <div class="form-control">
          <label class="label">
            <span class="label-text">Tipo de Animal</span>
          </label>
          <div class="flex gap-2">
            <div>
                <input type="radio" name="tipoAnimal" value="cachorro" checked>
                <label for="cachorro">Cachorro</label>
            </div>
            <div>
                <input type="radio" name="tipoAnimal" value="gato">
                <label for="gato">Gato</label>
            </div>
            <div>
                <input type="radio" name="tipoAnimal" value="passarinho">
                <label for="passarinho">Passarinho</label>
            </div>
            <div>
                <input type="radio" name="tipoAnimal" value="outros">
                <label for="outros">Outros</label>
            </div>
          </div>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Porte</span>
          </label>
          <div class="flex gap-2">
            <div>
                <input type="radio" name="porte" value="pequeno" checked>
                <label for="pequeno">Pequeno</label>
            </div>
            <div>
                <input type="radio" name="porte" value="medio">
                <label for="medio">Medio</label>
            </div>
            <div>
                <input type="radio" name="porte" value="grande">
                <label for="grande">Grande</label>
            </div>
          </div>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Sexo</span>
          </label>
          <div class="flex gap-2">
            <div>
                <input type="radio" name="sexo" value="macho" checked>
                <label for="macho">Macho</label>
            </div>
            <div>
                <input type="radio" name="sexo" value="femea">
                <label for="femea">Fêmea</label>
            </div>
          </div>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Descrição</span>
          </label>
          <input name="descricao" type="text" placeholder="descrição do pet" class="input input-bordered" required />
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
    $nomePet = $_POST["nomePet"];
    $fotoPet = $_FILES["fotoPet"]["name"];
    $tipoAnimal = $_POST["tipoAnimal"];
    $sexo = $_POST["sexo"];
    $porte = $_POST["porte"];
    $descricao = $_POST["descricao"];
    $status = "Disponivel";

    if($nomePet != "" || $fotoPet != "" || $sexo != "" || $porte != "" || $tipoAnimal != "" || $descricao != ""){
        try{
          //Fazendo upload da imagem do pet
          $imagem = "./imagens/".$_FILES["fotoPet"]["name"];
          move_uploaded_file($_FILES["fotoPet"]["tmp_name"], $imagem);

          $conexao = new PDO("mysql:dbname=projetoinova;host=localhost","root","");

          $statement = $conexao->prepare("INSERT INTO animais VALUES(0,'$idUsuario','$telefoneDono','$nomePet','$fotoPet','$tipoAnimal','$sexo','$porte','$descricao','$status')");
          $statement->execute();
          echo '<script>window.location.replace("index.php");</script>';  
      }catch(PDOException $erro){
          echo "Ocorreu um erro".$erro->getMessage();
      }
    }else{
      echo "Tem campo sem preencher!";
    }
?>

</body>
</html>
