<?php 
// récuperer le fichier de config principal
require 'assets/config/bootstrap.php';
?>


<?php 




// Récuperer l'url de notre site + /// + le lien de l'image
$link = $_SERVER['REQUEST_URI'];
$linkExploded = explode('///',$link);
// Séparer notre URL et celui de l'image
// Source correspond au lien de l'image
if (sizeof($linkExploded) > 1 && $linkExploded[1]!=='') {
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

$liens = $req->fetchAll(PDO::FETCH_ASSOC);

// Si le lien existe, la requete nous renvoi un tableau de taille 1
if (sizeof($liens) !== 0) {
  echo '<h1>Le lien existe déjà</h1>';
  // Si le lien existe en rien faire
}elseif(!isset($source)){
  // echo 'entrer une url';
}
  else{
   // Si le lien existe pas
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




<!-- AFFICHER LES IMAGES  -->
<?php foreach ($liens as $lien):?>
<img style='display:block;' src=<?=$lien['source']?> alt="">
<?php endforeach;?>