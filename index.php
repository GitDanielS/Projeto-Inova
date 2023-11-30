<?php
session_start();

if(@$_SESSION['$nomeUsuario'] == ""){

}else{
  $telefoneDono = $_SESSION['$telefone'];
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>
<body>
    <div class="navbar bg-base-100">
      <div class="flex justify-center">
        <div class="navbar-start">
          <img class="h-[100px] w-[100px]" src="./imagens/logo.png" alt="logo" />
        </div>
        <div class="">
          <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text3xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Adote/Ame/Sorria</span></h1>
        </div>
    </div>

      <div class="navbar-center text-purple-800 m-4">
        <div class="flex justify-center ml-[300px]">
          <a href="quemsomos.php" class="btn btn-ghost text-2xl normal-case font-bold">Quem somos</a>
          <a href="queroajudar.php" class="btn btn-ghost text-2xl normal-case font-bold">Quero ajudar</a>
          <a href="parcerias.php" class="btn btn-ghost text-2xl normal-case font-bold">Parcerias</a>
        </div>

          <div class="ml-20">          
            <?php if(@$_SESSION['$nomeUsuario'] == ""){
              echo '<a href="telaLoginUsuario.php" class="btn btn-ghost text-2xl normal-case font-bold ">Entrar</a>';
            }else{
              echo '<a href="logout.php" class="btn btn-ghost text-2xl normal-case font-bold ">Sair</a>';}
            ?>
            <?php
            if(@$_SESSION['$nomeUsuario'] != ""){
              echo '<button class="btn btn-active btn-primary text-xl font-bold"><a href="meusanimais.php">Meus animais</a></button>';
            }else{
              echo '<button class="btn btn-active btn-primary text-xl font-bold"><a href="telaCadastroUsuario.php">Cadastrar-se</a></button>';
            }
            ?>
            <!-- <button class="btn btn-active btn-primary text-xl font-bold"><a href="telaCadastroUsuario.php">Cadastrar-se</a></button> --></div>
          </div>
      </div>
      
      <div id="default-carousel" class="relative w-full" data-carousel="slide">
          <!-- Carousel wrapper -->
          <div class="relative overflow-hidden rounded-lg h-[500px] m-2">
              <!-- Item 1 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="./imagens/frase1.png" class="absolute block w-[97%] h-[500px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fill mx-auto rounded-3xl" alt="...">
              </div>
              <!-- Item 2 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="./imagens/frase2.png" class="absolute block w-[97%] h-[500px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fill mx-auto rounded-3xl" alt="...">
              </div>
              <!-- Item 3 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="./imagens/frase3.png" class="absolute block w-[97%] h-[500px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fill mx-auto rounded-3xl" alt="...">
              </div>
        </div>
          <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 bg-red-500 rounded-3xl p-3 gap-3">
                <button type="button" class="w-5 h-5 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-5 h-5 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-5 h-5 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-500 dark:bg-red-500/30 group-hover:bg-red-500/50 dark:group-hover:bg-red-500/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-500 dark:bg-red-500/30 group-hover:bg-red-500/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
          </div>

      <div class="flex justify-center gap-1">

        <button class="btn btn-primary w-[96%] h-[50px] text-xl" <?php if(@$_SESSION['$nomeUsuario'] == "") {echo "onclick='window.location=\"telaLoginUsuario.php\"'";}else{echo "onclick='window.location=\"telaCadastroPet.php\"'";} ?>>Quero divulgar um pet</button>
      </div>

      <h1 class="font-bold text-4xl m-8 text-purple-800">Novos pets para adoção</h1>

      <?php
      // Estabelecendo uma conexão com o banco de dados
      $conexao = new PDO("mysql:dbname=projetoinova;host=localhost", "root", "");

      // Aqui vai inserir os dados no banco de dados
      $status = "Disponivel";
      $statement = $conexao->prepare("SELECT * FROM animais WHERE status = :status");
      $statement->bindParam(":status", $status);
      $statement->execute();
      $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="grid grid-cols-4 gap-3">
        <?php foreach ($consulta as $pet) : ?>
          <div class="card bg-base-100 w-96 shadow-xl m-3">
            <figure class="px-10 pt-10">
              <!-- Usei a sintaxe <_?= $variavel ?> para incorporar variáveis diretamente no HTML -->
              <img src="./imagens/<?= $pet["fotoAnimal"] ?>" alt="foto" class="rounded-xl w-[400px] h-[400px] object-cover" />
            </figure>
            <div class="card-body items-center text-center">
              <h1 class="text-4xl"><?= $pet["nomeAnimal"] ?></h1>
              <h2 class="card-title">Descrição</h2>
              <p><?= $pet["descricao"] ?></p>
              <div class="card-actions">
                <button class="btn btn-primary" <?php if(@$_SESSION['$nomeUsuario'] == "") {echo "onclick='window.location=\"telaLoginUsuario.php\"'";}else{echo "onclick='window.location=\"https://web.whatsapp.com/send?phone=".$pet["telefoneDono"]."\"'";} ?>>Adotar</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      

      <footer class="footer footer-center p-10 bg-primary text-primary-content">
        <aside>
          <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="inline-block fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
          <p class="font-bold">
            Pesquisar animais <br/>Adote com responsabilidade
          </p> 
          <p>Copyright © 2023 - All right reserved</p>
        </aside> 
        <nav>
          <div class="grid grid-flow-col gap-4">
            <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
            <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
            <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
          </div>
        </nav>
      </footer>
    
</body>
</html>