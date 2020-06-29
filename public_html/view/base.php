<?php $this->title = "Accueil"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bienvenue sur le blog de l'écrivain Jean Forteroche.">
  <meta name="author" content="Jean Forteroche">

  <title><?= $title ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="public/css/blog-home.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><span class="cursive">Jean Forteroche</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <?php
            if ($this->session->get('role')) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=profile&userId=<?= $this->session->get('user_id') ?>">Profil</a>
            </li>
            <?php
              if($this->session->get('role') === 'admin'){
              ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=administration">Administration</a>
            </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=logout">Déconnexion</a>
            </li>
            <?php
          }
          else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=createuser">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=login">Connexion</a>
            </li>
            <?php
          }
          ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <main>
    <div class="container">
      <div class="row">

        <!-- Blog Entries Column -->
        <article class="col-md-10">
          <!-- Blog Post -->
          <?= $content ?>
        </article>

      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Formation Openclassrooms - Développeur Web Junior - Projet
        n°4 : Créez un blog pour un écrivain</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
