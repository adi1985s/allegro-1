<?php
  if(isset($data['error'])) print $data['error'];
  if(isset($data['registered'])){
    print '<p>Utworzono konto! Sprawdź swój e-mail i kliknij w link aktywacyjny!</p>';
  } else {
?>
<div id="wrapper">
  <form method="post" action="?register">
    <label>Login:</label><input type="text" name="login" 
      value="<? echo isset($_POST['login']) ? $_POST['login'] : '' ?>"><br>
    <label>Hasło:</label><input type="password" name="password"><br>
    <label>Powtórz hasło:</label><input type="password" name="password2"><br>
    <label>e-mail:</label><input type="text" name="email" 
      value="<? echo isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
    <label>nick:</label><input type="text" name="nick" 
      value="<? echo isset($_POST['nick']) ? $_POST['nick'] : '' ?>"><br>
    <input type="submit" value="Utwórz konto" id="submit">
  </form>
</div>
<?php } ?>
