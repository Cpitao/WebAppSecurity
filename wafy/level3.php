<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level3.php?name=" + username);
      }
    </script>
    <h1>LEVEL 3</h1>
    <p> To zadanie wymaga zainstalowanego Pythona, do którego możemy odwołać się w linii komend/terminalu przez 'python' </p>
    <p> Wykonaj kod<br/> &#60;script&#62;alert("I did this");&#60;/script&#62;</p>
    <p> Dozwolone znaki: abcdefghijklmnopqrstuvwxyz0123456789()+-.'\ </p>
    <img src="/zad3.png">
    <p> Name: </p>
    <input type="text" id="username" name="username">
    <button type="button" onclick="submit()">Submit</button><br/><br/>
    <?php
      if (!array_key_exists("name", $_GET)) exit;
      $whitelist_chars = "abcdefghijklmnopqrstuvwxyz0123456789()+-.'\\ ";
      $username = $_GET["name"];
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
        echo "<a href='/wafy/level4.php'>Congrats, next level</a>";
      }
    ?>
  </body>
</html>