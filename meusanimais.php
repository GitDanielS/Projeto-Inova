<?php
session_start();
$idUsuario = $_SESSION['$idUsuario'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus animais</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>
<body>
<div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium text-center">Atenção!</span> Quando postar algum pet vai aparecer aqui.
  </div>
</div>
<?php
try {
    $conexao = new PDO("mysql:dbname=projetoinova;host=localhost", "root", "");

    $statement = $conexao->prepare("SELECT * FROM animais WHERE idUsuario = :idUsuario");
    $statement->bindParam(":idUsuario", $idUsuario);
    $statement->execute();

    $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($consulta != ""){
    ?>
    <div class="grid grid-cols-4 gap-3">
        <?php foreach ($consulta as $pet) : ?>
          <div class="card bg-base-100 w-96 shadow-xl">
            <figure class="px-10 pt-10">
              <!-- Usei a sintaxe <_?= $variavel ?> para incorporar variáveis diretamente no HTML -->
              <img src="./imagens/<?= $pet["fotoAnimal"] ?>" alt="foto" class="rounded-xl w-[400px] h-[400px] object-cover" />
            </figure>
            <div class="card-body items-center text-center">
              <h1 class="text-4xl"><?= $pet["nomeAnimal"] ?></h1>
              <h2 class="card-title">Descrição</h2>
              <p><?= $pet["descricao"] ?></p>
              <div class="flex">
                <?php
                if ($pet['status'] != 'Adotado'){
                ?>

                 <a href="editarAnimal.php?idAnimal=<?php echo $pet['idAnimais'];?>&status=Adotado"><button class='btn btn-warning'>Já foi adotado</button></a>

                <?php
                }else{
                ?>
                <a href="editarAnimal.php?idAnimal=<?php echo $pet['idAnimais'];?>&status=Disponivel"><button class='btn btn-error'>Ainda Disponivel</button></a>
             
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        <?php endforeach;}
        else{
            echo "Você não divulgou nada ainda";}
            ?>
    </div>
<?php
} catch (PDOException $erro) {
    // Lida com erros aqui
}
?>
</body>

</html>