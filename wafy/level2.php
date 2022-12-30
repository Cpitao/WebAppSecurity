<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level2.php?name=" + username);
      }
    </script>
    <h1>LEVEL 2</h1>
    <p> Wykonaj kod<br/> &#60;script&#62;alert("I did this");&#60;/script&#62;</p>
    <p> Name: </p>
    <input type="text" id="username" name="username">
    <button type="button" onclick="submit()">Submit</button><br/><br/>

    <?php
      if (!array_key_exists("name", $_GET)) exit;
      $blacklist = [
        "<script>" => "",
      ];
      $username = $_GET["name"];
      $prev = "";
      while ($username != "" && $prev != $username) {
        $prev = $username;
        foreach ($blacklist as $key => $value)
          $username = str_replace($key, $value, $username);
      } 
      echo '<h1>Hello ' . $username . '!</h1><br>';
      if(preg_match("/.*<script>.*alert.*<\/script>.*/", strtolower($username)))
      {
        echo "<a href='/wafy/level3.php'>Congrats, next level</a>";
      }
    ?>
  </body>
</html>