<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level1.php?name=" + username);
      }
    </script>
    <h1>LEVEL 1</h1>
    <p> Wykonaj kod<br/> &#60;script&#62;alert("I did this");&#60;/script&#62;</p>
    
    <p> Name: </p>
    <input type="text" id="username" name="username">
    <button type="button" onclick="submit()">Submit</button><br/><br/>

    <?php
      if (!array_key_exists("name", $_GET)) exit;
      $blacklist = [
        "<script>" => "",
        // "alert" => ""
      ];
      $username = $_GET["name"];
      $prev = strtolower($username);
      foreach ($blacklist as $key => $value)
        $username = str_replace($key, $value, strtolower($username));
      
      echo '<h1>Hello ' . $username . '!</h1><br>';

      if(preg_match("/.*<script>.*alert.*<\/script>.*/", $username))
      {
        echo "<a href='/wafy/level2.php'>Congrats, next level</a>";
      }
    ?>
  </body>
</html>