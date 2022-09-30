<?php
session_start();
echo " <p>Guess the number between 0 and 30</p>
<form action='#' method='post'>
    <input type='text' name='input'>
    <input type='submit' value='Try'>
</form></br> ";

if(!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 2;
    $_SESSION['number'] = rand(1,30);
}

if (isset($_POST['input'])&& $_POST ['input'] !="s") {
    $input = $_POST['input'];
    //verifica se o n digitado é igual ao $n
    if ($_SESSION['number'] == $input) {
        echo "Congrats! the number was <strong>".$_SESSION['number']."</strong>.<br/>
        You used <strong>".$_SESSION['attempt']."</strong> attempts.</br>
        To play again, tip <strong>s</strong></br>";

    } elseif ($_SESSION['number'] > $input) {
    echo "The number is bigger than".$input."!";
} else {
    echo "The number is less than".$input."!";
}

    $_SESSION['attempts']++;
//se o usuer digitou a letra s para começar de novo, destroi o n anterior
} elseif (isset($_POST['input'])&& $_POST['input'] == "s") {
    unset($_SESSION['number']); session_destroy();
    }
?>
