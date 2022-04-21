<?php
if (isset($_COOKIE["Language"])  && $_COOKIE["Language"] == "Romana") {
  $this->statement1 = "Introduceți comentariul:";
  $this->statement2 = "Trimite comentariu";
  $this->statement3 = "Resetați comentariul!";
} else {
  $this->statement1 = "Enter your comment: ";
  $this->statement2 = "Send Comment";
  $this->statement3 = "Reset comment!";
}
echo <<<MARCAJ
<br>
<form action="NewsWorld.php" method="POST">
<label for="Comment">$this->statement1</label>
<br><br>
<textarea name="Comment"></textarea>
<br>
<br>
<input type="submit" name="SendComment" value="$this->statement2">
<input type="reset" name="reset" value="$this->statement3">
<input type="hidden" name="CommentTitle" value="$this->title">
<input type="hidden" name="Category" value="$this->CategoryContent">
</form>
MARCAJ;
