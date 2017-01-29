<?php

require_once '_include/authenticate-user.php';

?>

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
          <li class="active"><a href="editor.php?my_token=<?php echo $user['token']; ?>">Mon jardin</a></li>
          <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li class="active"><a href="editor.php?my_token=<?php echo $user['token']; ?>">Mon jardin</a></li>
          <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
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
              Mon jardin
            </h1>
          </div>

          <div class="col s12">
            <div class="row">
              <div class="col s2">
                <ul>
                  <?php

                  // Chargement du legume...
                  $sql = 'SELECT *
                          FROM `users`, `vegetables`
                          WHERE users.id = vegetables.user_id
                            AND users.id = ?';

                  $req = $db->prepare($sql);
                  $req->execute(array($user['id']));

                  // On affiche chaque legume un à un.
                  while ($vegetable = $req->fetch())
                  {
                    ?>
                      <li><a href="vegetable.php?my_token=<?php echo $user['token']; ?>&vegetable_id=<?php echo $vegetable['id']; ?>"><?php echo $vegetable['name']; ?></a></li>
                    <?php
                  }

                  ?>
                </ul>

                <a href="vegetable_new.php?my_token=<?php echo $user['token']; ?>" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
              </div>

              <div class="col s10">
                Bienvenue dans votre potager,
                <?php echo $user['full_name'] ?>.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
