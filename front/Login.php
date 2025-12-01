
<!DOCTYPE html>
<html lang="cs">
<head>


    <!-- load login CSS with cache-bust to ensure latest file is used -->
    <link rel="stylesheet" href="./css/login.css?v=2">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>
<body>

  <form action="./../back/login.php" method="POST" class="everything">
    <input type="text" name="username" placeholder="Uživatel" class="inputi"><br>
    <input type="password" name="password" placeholder="Heslo" class="inputi"><br>
    <button type="submit" class="login">Přihlásit</button>
    <button class="zpet underline">
        <a href="../front/main.php" style="color: white; text-decoration-line: none;">Vráti se</a>
    </button>


      <?php
          session_start();
          if (isset($_SESSION["error"])) {
              echo "<p style='color:red; margin-top:10px;'>" . $_SESSION["error"] . "</p>";
              unset($_SESSION["error"]);
          }
      ?>

  </form>

</body>
</html>
