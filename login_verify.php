<?php

require_once '_include/connection.php';

// Authentification
$sql = 'SELECT password
        FROM `users`
        WHERE email = ?';

$r = $db->prepare($sql);
echo $_POST['email'];
$r->execute(array($_POST['email']));

if ($r->rowCount() != 1) {
  // L'adresse email est introuvable.
  header('Location: login.php?error=email');
  exit();
}

$user = $r->fetch();

if ($user['password'] != $_POST['password']) {
  // Le mot de passe est incorrect.
  header('Location: login.php?error=password');
  exit();
}

// Creation d'un nouveau token unique en base de donnees.

$token = mt_rand();

$sql = 'UPDATE users
        SET token = ?
        WHERE email = ?';

$r = $db->prepare($sql);
$r->execute(array($token, $_POST['email']));
$r->closeCursor();

?>

<!-- Redirection vers la page d'accueil de l'utilisateur. -->
<meta http-equiv="refresh" content="0; URL=vegetables.php?my_token=<?php echo $token ?>">
