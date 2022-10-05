<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess Number</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php session_start();?>
<p>Adivinhe o Número entre 1 e 30</p>
    <form action='#' method='post'>
        <input type='number' name='input' min="0" max="30">
        <button type='submit' value='Try'>Enter</button>
    </form></br>  

<?php
if(!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 1;
    $_SESSION['number'] = rand(1,30);
}

if (isset($_POST['input'])&& $_POST ['input'] !="0") {
    $input = $_POST['input'];
    //verifica se o n digitado é igual ao $n
    if ($_SESSION['number'] == $input) {
        echo "Parabéns! O número é: <strong>".$_SESSION['number']."</strong><br/>
        Você usou <strong>".$_SESSION['attempt']."</strong> tentativas</br>
        Para jogar de novo, digite <strong>'0'</strong></br>";

    } elseif ($_SESSION['number'] > $input) {
    echo "O número é maior que ".$input."!";
} else {
    echo "O número é menor que ".$input."!";
}

    $_SESSION['attempts']++;
//se o usuer digitou a letra s para começar de novo, destroi o n anterior
} elseif (isset($_POST['input'])&& $_POST['input'] == "0") {
    unset($_SESSION['number']); session_destroy();
    }
?>
</body>
</html>
