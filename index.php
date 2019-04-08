<?php 
// récuperer le fichier de config principal
require 'assets/config/bootstrap.php';
?>

<?php 
// Récuperer l'url de notre site + /// + le lien de l'image
$link = $_SERVER['REQUEST_URI'];
// Séparer notre URL et celui de l'image
$linkExploded = explode('///',$link);

// Vérifier si il existe une URL après les /// et qu'il est différent de ''
if (sizeof($linkExploded) > 1 && $linkExploded[1]!=='') {
  // Source correspond au lien de l'image
  $source = explode('///',$link)[1];
}

 // Rechercher le lien sur mySQL
$req = $pdo->prepare(
  'SELECT source
  FROM liens
  WHERE source = :source'
);
$req->bindParam(':source', $source);
$req->execute();

$liens = $req->fetch(PDO::FETCH_ASSOC);


if ($liens) {
  // Si le lien existe
  echo '<h1>Le lien existe déjà</h1>';
}elseif ($source) {  
  // Si le lien existe pas et qu'il est différent de ''
  // Ajouter le lien sur mySQL
  $req = $pdo->prepare(
    "INSERT INTO liens VALUES ( '', :source, 'none', 'none', 'none' )
    "
  );
  $req->bindParam(':source', $source);
  $req->execute();
  
  
}
 // Rechercher les liens sur mySQL
$req = $pdo->prepare(
  'SELECT source
  FROM liens
  '
);
$req->execute();
$liens = $req->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- AFFICHER LES IMAGES   -->
<?php foreach ($liens as $lien):?>
<img style='display:block;' src=<?=$lien['source']?> alt="">
<?php endforeach;?>