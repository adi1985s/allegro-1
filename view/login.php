<?php
  if(isset($data['error'])) print $data['error'];
?>
<div id="wrapper">
  <form method="post" action="?login">
    <label>Login:</label><input type="text" name="login"><br>
    <label>Hasło:</label><input type="password" name="password"><br>
    <input type="submit" value="Login" id="submit">
  </form>
  <div id="control">
    <a href="?register">Zarejestruj się</a>
    <a href="?remember">Nie pamiętasz hasła?</a>
  </div>
</div>

