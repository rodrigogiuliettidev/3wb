<?php
session_start();
require_once 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id_usuario'])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit;
}

// Exibe o tipo do usuário para personalizar a experiência (opcional)
$tipo_usuario = $_SESSION['usuario']['tipo'];

// Consulta para buscar as barbearias
try {
    $stmt = $pdo->query("SELECT nome, imagem FROM barbearias");
    $barbearias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar barbearias: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Harstil</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/Venobox/venobox.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  

<!-- navigation -->
<section class="fixed-top navigation">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <img src="images/logo.png" alt="logo" class="logoHarstil">
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- navbar -->
      <div class="collapse navbar-collapse text-center" id="navbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="indexlogado.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="#pricing">Planos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Suporte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro.php">Cadastro</a>
          </li>
          <!--<li class="nav-item">
           <a class="nav-link" href="addEstabelecimento.php">ASD</a>
          </li>-->
        </ul>
        <a href="logout.php" class="btn btn-primary ml-lg-3 primary-shadow">Logout</a>
      </div>
    </nav>
  </div>
</section>
<!-- /navigation -->

<!-- hero area -->
<section class="hero-area">
  <video loop muted autoplay playsinline class="video-bg">
    <source src="uploads/video-background.mp4" type="video/mp4">
    Seu navegador não suporta o elemento <code>video</code>.
  </video>

  <div class="content-overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mb-3">Bem-vindo ao Harstil</h1>
          <p class="mb-4">As melhores barbearias reunidas em um único lugar.</p>
          <input type="email" class="newsletter-form" id="newsletter" placeholder="Procurar Barbearias">
        </div>
      </div>
    </div>
  </div>
</section>
 


<!-- /hero-area -->


<!-- harstil -->


<!-- barbearias section -->
<!-- barbearias section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Barbearias Cadastradas</h2>
    <div class="row">
        <?php
        // Exibindo as barbearias
        if (!empty($barbearias)) {
            foreach ($barbearias as $barbearia) {
                echo '<div class="col-md-4">';
                echo '<div class="barbearia-card mb-4">';
                echo '<a href="servicos.php?id=' . htmlspecialchars($barbearia['id']) . '">'; // Passando o ID da barbearia
                echo '<img src="' . htmlspecialchars($barbearia['imagem']) . '" alt="' . htmlspecialchars($barbearia['nome']) . '" class="imagemBarbearia img-fluid">';
                echo '<div class="barbearia-info text-center">';
                echo '<h3>' . htmlspecialchars($barbearia['nome']) . '</h3>';
                echo '<p>' . htmlspecialchars($barbearia['endereco']) . '</p>'; // Exibindo o endereço
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p class='text-center'>Não há barbearias cadastradas no momento.</p>";
        }
        ?>
    </div>
</div>

<!-- /barbearias section -->


  

</section>

<!-- feature -->

<!-- /feature -->

<!-- marketing -->

<!-- /marketing -->

<!-- service -->

<!-- /service -->

<!-- team -->
<section class="section-lg team" id="team">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h5 class="feedback">Feedback</h5>
        <p class="mb-100">Opiniões de clientes que utilizaram nosso site.</p>
      </div>
    </div>
    <div class="col-10 mx-auto">
      <div class="team-slider">
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="images/team/team-1.jpg" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Becroft</h4>
              <h6 class="text-color">João</h6>
            </div>
          </div>
          <p>O site funciona bem e cumpre com as expectativas.</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="images/team/team-2.jpg" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>John Doe</h4>
              <h6 class="text-color">Gabriel</h6>
            </div>
          </div>
          <p>Com o site, consegui conhecer barbearias próximas.</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="images/team/team-3.jpg" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Erik Ligas</h4>
              <h6 class="text-color">Ana</h6>
            </div>
          </div>
          <p>Esse site me ajudou bastante, pude conhecer bons serviços na região.</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="images/team/team-1.jpg" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Erik Ligas</h4>
              <h6 class="text-color">Marcelo</h6>
            </div>
          </div>
          <p>Finalmente descobri bons lugares para cortar o cabelo, graças a esse site que conheci!</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="images/team/team-2.jpg" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>John Doe</h4>
              <h6 class="text-color">Pedro</h6>
            </div>
          </div>
          <p>O site é intuitivo e cumpre o objetivo de ligar o cliente ao barbeiro.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- backgound image -->
  <img src="images/backgrounds/team-bg.png" alt="team-bg" class="img-fluid team-bg">
  <!-- background shapes -->
  <img class="team-bg-shape-1 up-down-animation" src="images/background-shape/seo-ball-1.png" alt="background-shape">
  <img class="team-bg-shape-2 left-right-animation" src="images/background-shape/seo-ball-1.png" alt="background-shape">
  <img class="team-bg-shape-3 left-right-animation" src="images/background-shape/team-bg-triangle.png" alt="background-shape">
  <img class="team-bg-shape-4 up-down-animation img-fluid" src="images/background-shape/team-bg-dots.png" alt="background-shape">
</section>
<!-- /team -->

<!-- pricing -->
<section class="section-lg pb-0 pricing" id="pricing">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h7 class="feedback">Planos de Assinatura</h7>
        <p class="mb-50">Planos de assinatura do nosso site.</p>
      </div>
      <div class="col-lg-10 mx-auto">
        <div class="row justify-content-center">
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-1">
              <h3>Mensal</h3>
              <h1><span>R$</span>119,00</h1>
              <p>  - Um cadastro de barbearia
              </p>
              <p>  - Dois barbeiros por barbearia
              </p>
              <p>  - Agendamentos ilimitados
              </p>
              <p>  - Pagamento antecipado
              </p>
              <p>  - Taxa de 5% no serviço
              </p>
              <a href="#" class="btn pricing-btn px-2">Assinar</a>
            </div>
          </div>
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-2">
              <h3>Trimestral</h3>
              <h1><span>R$</span>299,90</h1>
              <p>  - Três cadastros de barbearia
              </p>
              <p>  - Cinco Barbeiros por barbearia
              </p>
              <p>  - Agendamentos ilimitados
              </p>
              <p>  - Pagamento antecipado
              </p>
              <p>  - Marketplace
              </p>
              <p>  - Taxa de 5% no serviço ou produto
              </p>
              <a href="#" class="btn pricing-btn px-2">Assinar</a>
            </div>
          </div>
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-3">
              <h3>Anual</h3>
              <h1><span>R$</span>729,99</h1>
              <p>  - Cadastros ilimitados
              </p>
              <p>  - Barbeiros ilimitados
              </p>
              <p>  - Agendamentos ilimitados
              </p> 
              <p>  - Pagamento antecipado
              </p>
              <p>  - Marketplace
              </p>
              <p>  - Isento de taxa
              </p>
              
              <a href="#" class="btn pricing-btn px-2">Assinar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- background shapes 
  <img class="pricing-bg-shape-1 up-down-animation" src="images/background-shape/seo-ball-1.png" alt="background-shape">
  <img class="pricing-bg-shape-2 up-down-animation" src="images/background-shape/seo-half-cycle.png" alt="background-shape">
  <img class="pricing-bg-shape-3 left-right-animation" src="images/background-shape/team-bg-triangle.png" alt="background-shape">-->
</section>

<!-- client logo slider -->
<section class="section">
  <div class="container">
      <div class="client-logo-slider align-self-center">
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/salon-linelogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/DrjonesLogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/SkalaLogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/Barbaranalogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/baboonlogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/salon-linelogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/DrjonesLogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/SkalaLogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/Barbaranalogo.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="images/baboonlogo.png" alt="client-logo"></a>
      </div>
  </div>
</section>
<!-- /client logo slider -->

<!-- newsletter -->
<section class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h7 class="feedback">Receba notícias!</h7>
        <p class="mb-5">Receba atualizações e ofertas do nosso site</p>
      </div>
      <div class="col-lg-8 col-sm-10 col-12 mx-auto">
        <form action="#">
          <div class="input-wrapper position-relative">
            <input type="email" class="newsletter-form" id="newsletter" placeholder="Insira seu email">
            <button type="submit" value="send" class="btn newsletter-btn">inscreva-se</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <img class="newsletter-bg-shape left-right-animation" src="images/background-shape/seo-ball-2.png" alt="background-shape">
</section>
<!-- /newsletter -->

<!-- footer -->
<footer class="footer-section footer" style="background-image: url(images/backgrounds/footer-bg.png);">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center text-lg-left mb-4 mb-lg-0">
        <!-- logo -->
       
          <img class="img-fluid" src="images/logo.png" alt="logo">
       
      </div>
      <!-- footer menu 
      <nav class="col-lg-8 align-self-center mb-5">
        <ul class="list-inline text-lg-right text-center footer-menu">
          <li class="list-inline-item active"><a href="index.html">Home</a></li>
          <li class="list-inline-item"><a class="page-scroll" href="#feature">Feature</a></li>
          <li class="list-inline-item"><a href="about.html">About</a></li>
          <li class="list-inline-item"><a class="page-scroll" href="#team">Team</a></li>
          <li class="list-inline-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
          <li class="list-inline-item"><a href="contact.html">Contact</a></li>
        </ul>
      </nav>-->
      <!-- footer social icon -->
      <nav class="col-12">
        <ul class="list-inline text-lg-right text-center social-icon">
          <li class="list-inline-item">
            <a class="facebook" href="#"><i class="ti-facebook"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="black" href="#"><i class="ti-github"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/Venobox/venobox.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>