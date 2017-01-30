<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Mon Potager</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </head>

  <body>
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="./" class="brand-logo">Mon Potager</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="signup.php">S'inscrire</a></li>
          <li class="active"><a href="login.php">Connexion</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="signup.php">S'inscrire</a></li>
          <li class="active"><a href="login.php">Connexion</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>

    <div class="container">
      <div class="section">

        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12">
            <h1>
              Connexion
            </h1>
          </div>

          <form action="login_verify.php" method="post">
            <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input id="email" name="email" type="email" value="" class="validate" required>
              <label for="email" class="">Courriel</label>
            </div>

            <div class="input-field col s12">
              <i class="material-icons prefix">vpn_key</i>
              <input id="password" name="password" type="password" class="validate <?php if (isset($_GET['error'])) { echo 'invalid'; } ?>" required>
              <label for="password" class="">Mot de passe</label>
            </div>

            <div class="input-field col s12">
              <input class="btn" type="submit" value="Connexion">
            </div>
          </form>


        </div>

      </div>
      <br><br>

      <div class="section">

      </div>
    </div>
  </body>
</html>
