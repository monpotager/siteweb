<?php

// Authentification

require_once '_include/connection.php';

if (!isset($_GET['my_token'])) {
  header('HTTP/1.1 400 Bad Request');
  exit('Non autorisé: le token est introuvable.');
}

$sql = 'SELECT *
        FROM `users`
        WHERE token = ?';

$r = $db->prepare($sql);
$r->execute(array($_GET['my_token']));

if ($r->rowCount() != 1) {
  header('HTTP/1.1 401 Unauthorized');
  exit('Non autorisé: le token est invalide.');
}

$user = $r->fetch();

?>
