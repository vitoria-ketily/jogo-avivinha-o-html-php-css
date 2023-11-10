<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Jogo de Adivinhação</h1>
        <form action="" method="POST">
            <label for="guess">Seu Palpite:</label>
           <center> <input type="number" id="guess" name="guess" required></center>
            <button type="submit">Enviar Palpite</button>
        </form>

        <?php
        $min = 1;
        $max = 100;
        $secretNumber = 64; // Defina o número correto aqui

        $guess = isset($_POST['guess']) ? $_POST['guess'] : null;

        if ($guess !== null) {
            $message = "";
            if ($guess < $secretNumber) {
                $message = "Tente um número maior.";
            } elseif ($guess > $secretNumber) {
                $message = "Tente um número menor.";
            } else {
                $message = "Parabéns! Você acertou o número $secretNumber.";
            }

            $proximityMessage = "Você está próximo";
            $proximityThreshold = 10;

            if (abs($guess - $secretNumber) <= $proximityThreshold) {
                $proximityMessage = "Você está muito próximo!";
            }

            $message .= "<br>" . $proximityMessage;
        } else {
            $message = "Bem-vindo ao Jogo de Adivinhação! Tente adivinhar o número entre $min e $max.";
        }
        ?>
        <p><?php echo $message; ?></p>
    </div>
</body>

</html>
