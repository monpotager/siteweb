<?php

require_once '_include/authenticate-user.php';

$sql = 'INSERT INTO vegetables(name, description, user_id)
        VALUES(:name, :description, :user_id)';

$req = $db->prepare($sql);
$req->execute(array(
	'name'        => $_POST['name'],
	'description' => $_POST['description'],
  'user_id'     => $user['id']
));

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Mon Potager - Nouveau légume : <?php echo $_POST['name'] ?></title>

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
          <li class="active"><a href="vegetables.php?my_token=<?php echo $user['token']; ?>">Jardin</a></li>
          <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li class="active"><a href="vegetables.php?my_token=<?php echo $user['token']; ?>">Jardin</a></li>
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
              Nouveau légume : <?php echo $_POST['name'] ?>
            </h1>
          </div>

          <div class="col s12">
            Le légume bien d'être ajouté avec succès.
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
