    <?php 

//permets la transformation des donnees en JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

  
    // on établit la connexion à la BDD
$bdd = new PDO('mysql:host=109.234.161.110;dbname=raem3615_bbaroini','raem3615_bbaroini','9gE!]XZcdi,8');

        //préparation de l'insertion des valeurs dans la BDD
$pdoValue = $bdd->prepare('INSERT INTO conversation VALUES(NULL, :pseudo, :msg)');


      // ici je lie chaque marqueur à une valeur
$pdoValue->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);

$pdoValue->bindValue(':msg', $_POST['msg'], PDO::PARAM_STR);



//J'exécute la variable $pdoValue que je mets dans la variable $insertIsOk pour
// pouvoir utiliser le résultat de cette exécution par la suite
$insertIsOk = $pdoValue->execute();






//je parse en JSON ma variable qui contient mes données pour pouvoir la lire avec 
//le dossier js

$pdoValue = $bdd->prepare('SELECT * FROM conversation');
$pdoValue->execute();
$insertIsOk = $pdoValue->fetchAll();
json_encode($insertIsOk) ;


//-----------________---------_________----------__________----------_________---------
//-----------________---------_________----------__________----------_________---------




// j'établis un if/else pour afficher l'information de la réussite ou echec de la connexion à la BDD
// if($insertIsOk) {
//     $message =  'ca marche';
// } else {
//     $message =  'ca marche pas';
    
// }

?>


<?php

//je prépare ma requête
$pdoValue = $bdd->prepare('SELECT * FROM conversation ORDER BY id DESC');

//J'exécute ma requête
$displayIsOk = $pdoValue->execute();


// Aller chercher tous le contenu de la table conversation présente dans $pdoValue
$catchMsg = $pdoValue->fetchAll();



//Maintenant ma variable $catchMsg contient toute les informations que la table possède
// $recieved = $bdd->query('SELECT * FROM conversation ORDER BY id DESC');
//     while ($tableData = $recieved->fetch())
// {
// 	echo '<span><b>' . htmlspecialchars($tableData['user']) . '</b> : ' . htmlspecialchars($tableData['message']) . '</span>';
// }
// $recieved->closeCursor();

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/index.css">
    <title>Document</title>
</head>

<body>


    <h1> Exprimez-vous</h1>
    <h2>Discutez avec des gens du monde entier!</h2>
    <hr>

  <main>

    <article>

      <div id="content">  

       <ul>
          <?php foreach ($catchMsg as $oneMsg): ?>
              <li>
                <?=$oneMsg['user'] ?> :<br>
                <?= $oneMsg['message'] ?> <br> <br>
              </li>
          <?php endforeach ?>
        </ul>  

      </div>

      <form action="insert.php" method="post">
          <label for="pseudo">Pseudo</label>
          <input type="text" id="pseudo" name="pseudo">

          <label for="msg">Votre message:</label>
          <textarea name="msg" id="msg"></textarea>
          <input type="submit" class="submit">
      </form>

    </article>


  </main>

    <script src="script/ajax.js"></script>
</body>

</html>