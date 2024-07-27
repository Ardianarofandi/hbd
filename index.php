<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday To Me</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<audio autoplay loop>
    <source src="background.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<div class="container">
    <h1>Happy Birthday To Me!</h1>
    <img src="photo.jpg" alt="Foto Ulang Tahun" class="birthday-photo">
    <img src="photo2.jpg" alt="Foto Ulang Tahun" class="birthday-photo">
    <p class="birthday-message">"Happy Birthday to me! May this year bring new adventures, opportunities, and happiness. 
        Grateful for another year of life and the chance to make more wonderful memories."</p>
    
    <form action="index.php" method="post">
        <textarea name="message" placeholder="Tulis ucapan ulang tahun di sini..." required></textarea><br>
        <input type="submit" value="Kirim Ucapan">
    </form>

    <h2>Ucapan dari Teman-teman:</h2>
    <div class="messages">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = htmlspecialchars($_POST['message']);
            file_put_contents("messages.txt", $message . "\n", FILE_APPEND);
        }

        if (file_exists("messages.txt")) {
            $messages = file("messages.txt", FILE_IGNORE_NEW_LINES);
            foreach ($messages as $msg) {
                echo "<p>" . $msg . "</p>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
