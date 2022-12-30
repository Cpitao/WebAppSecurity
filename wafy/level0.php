<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level0.php?name=" + username);
      }
    </script>
    <h1>LEVEL 0</h1>
    <p>W następnych zadaniach należy odpowiednio modyfikując zadany kod wykonać jego odpowiednik stronie serwera.</p>
    <p>W tym przykładzie nie musisz nic modyfikować, przekonaj się o co chodzi wklejając poniższy kod w pole tekstowe:</p>
    <p>&#60;script&#62;alert("I did this");&#60;/script&#62;</p>
    <input type="text" id="username" name="username">
    <button type="button" onclick="submit()">Submit</button><br/><br/>

    <?php
      if (!array_key_exists("name", $_GET)) exit;
      $username = $_GET["name"];

      echo '<h1>Hello ' . $username . '!</h1><br>';
      if(preg_match("/.*<script>.*alert.*<\/script>.*/", $username))
      {
        echo "<a href='/wafy/level1.php'>Congrats, next level</a>";
      }
    ?>
  </body>
</html>