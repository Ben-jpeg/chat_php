<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/index.css">
    <title>Document</title>
</head>

<body>

    <h1> Exprimez-vous</h1>
    <h2>Discutez avec des gens du monde entier!</h2>
    <hr>


  <main>


    <article>

       <div id="content">
       <h2>Écrivez un message !</h2>
       
       </div>


    


      <form action="script/insert.php" method="post">
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


