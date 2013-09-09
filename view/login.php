<?php
  if($data['logged']){
    echo 'Zalogowano!';
  }
?>
<div id="accountForm">
  <form method="post" action="?login">
    <label>Login:</label><input type="text" name="login"><br>
    <label>Hasło:</label><input type="password" name="password"><br>
    <input type="submit" value="Login" id="submit">
  </form>
</div>

