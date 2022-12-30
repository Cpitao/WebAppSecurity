<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level4.php" + username);
      }
    </script>
    <h1>LEVEL 4</h1>
    <p> To zadanie wymaga zainstalowanego Pythona, do którego możemy odwołać się w linii komend/terminalu przez 'python' </p>
    <p> Wykonaj kod<br/> &#60;script&#62;alert("bypassed")&#60;/script&#62;</p>
    <p> Dozwolone znaki: abcdefghijklmnopqrstuvwxyz()+-.'" </p>
    <img src="/zad3.png">
    <p> Name: </p>
    <form method="post">
        <input type="text" id="username" name="username">
        <input type="submit" value="Submit" onclick="submit()"><br/><br/>
    </form>
    <?php
      if (!array_key_exists("username", $_POST)) exit;
      $whitelist_chars = "abcdefghijklmnopqrstuvwxyz()+-.'\" ";
      $username = $_POST["username"];
      $sanitized = "";
      foreach (str_split($username) as $char) {
        if (str_contains($whitelist_chars, $char)) {
            $sanitized = $sanitized . $char;
        }
      }
      $username = $sanitized;
      $message = system("python -c \"print('Hello " . $username . "')\"");
      if(preg_match("/.*<script>.*alert.*<\/script>.*/", $message))
      {
        echo "<a href='/wafy/level5.php'>Congrats, next level</a>";
      }
    ?>
  </body>
</html>
