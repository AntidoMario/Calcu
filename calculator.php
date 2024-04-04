<?php
session_start();

if (!isset($_SESSION['input'])) {
    $_SESSION['input'] = '';
}

if (isset($_POST["numb"])) {
    // If the input field contains only "0" and the user clicks another digit,
    // replace "0" with the new digit
    if ($_SESSION['input'] === '0') {
        $_SESSION['input'] = $_POST["numb"];
    } else {
        $_SESSION['input'] .= $_POST["numb"];
    }
} elseif (isset($_POST["op"])) {
    $_SESSION['input'] .= $_POST["op"];
} elseif (isset($_POST["equal"])) {
    $expression = $_SESSION['input'];
    $result = eval("return $expression;");
    $_SESSION['input'] = $result;
}

if (isset($_POST["reset"])) {
    session_destroy();
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="what.css" type="text/css">
    <script>
        function replaceZero(button) {
            var inputField = document.getElementById("inputField");
            if (inputField.value === '0') {
                inputField.value = button.value;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <p class="title">Calculator</p>
            <input id="inputField" type="text" class="result" name="input" value="<?php echo @$_SESSION['input']; ?>">
            <br>
            <input class="fir" value="1" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="2" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="3" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="+" type="submit" name="op">
            <input class="fir" value="4" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="5" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="6" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="-" type="submit" name="op">
            <input class="fir" value="7" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="8" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="9" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="*" type="submit" name="op">

            <input class="fir" value="0" type="submit" name="numb" onclick="replaceZero(this)">
            <input class="fir" value="=" type="submit" name="equal">
            <input class="fir" value="/" type="submit" name="op">
            <input class="reset" value="RS" type="submit" name="reset">

        </form>
    </div>

</body>

</html>
