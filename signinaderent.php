
    <?php
        //   verify sign in using email
    session_start(); // start session
    if (isset($_POST['submit'])) {
    $nickname = $_POST['nickname'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $conn = mysqli_connect('localhost', 'root', '', 'gestion_emprunts');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = mysqli_real_escape_string($conn, $nickname); 
    $sql = "SELECT * FROM adherent WHERE nickname = '$nickname' AND mot_de_passe = '$mot_de_passe'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['mot_de_passe'];
        if ($mot_de_passe == $row['mot_de_passe']) {
        // successful sign-in
        $_SESSION['id_adherent'] = $row['id_adherent'];
        header('Location: bibliothecaire.php');
        exit;
        }
    }
    else {
        echo "Invalid password OR nickname";
    }
    $conn->close();
    }

    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="signIn.css">
        <title>Sign In Adherent</title>
    </head>
    <body>
        <div class="conter">
            <h1>Sign In Adherent</h1>
            <form action="#" method="post">
                <div class="txt_field">
                    <input type="text" required name="nickname">
                    <span></span>
                    <label >UserName</label>
                    <!--  -->
                </div>
                <div class="txt_field">
                    <input type="password" required name="mot_de_passe">
                    <span></span>
                    <label>Password</label>              
                </div>
                <input type="submit" value="Sign In" name="submit">
                <p align="center">Don't have an account?&nbsp;<a href="signup.php" style="text-decoration:none; color:red;">Register Now!</a>
            </form>
        </div>
    </body>
    </html>