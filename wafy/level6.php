<!DOCTYPE html>
 
<html>
  <body>
    <script>
      function submit() {
        let nameInput = document.getElementById("username");
        let username = nameInput.value;
        window.location.replace("/wafy/level6.php?name=" + username);
      }
    </script>
    <h1>LEVEL 6</h1>
    <p> To zadanie wymaga zainstalowanego Pythona, do którego możemy odwołać się w linii komend/terminalu przez 'python' </p>
    <p> Wykonaj kod<br/> &#60;script&#62;alert("I did this");&#60;/script&#62;</p>
    <img src="/zad3.png">
    <p> Name: </p>
    <input type="text" id="username" name="username">
    <button type="button" onclick="submit()">Submit</button><br/><br/>

    <?php
      if (!array_key_exists("name", $_GET)) exit;
      $blacklist = [
        "alert" => ""
      ];
      $username = $_GET["name"];
      $prev = "";
      while ($username != "" && $prev != $username) {
        $prev = strtolower($username);
        foreach ($blacklist as $key => $value)
          $username = str_replace($key, $value, strtolower($username));
      }

      $message = system("python -c \"print('Hello " . $username . "')\"");

      if(preg_match("/.*alert.*/", $message))
      {
        echo "Congratulations, that's all for today";
      }
    ?>
  </body>
</html>