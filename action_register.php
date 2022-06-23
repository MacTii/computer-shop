<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza_db";

// creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// start session
session_start();

if ($conn) {

    if (isset($_POST['register'])) {

        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];

        $email = $_POST['email'];

        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $option = $_POST['option'];

        if ($first_name == NULL) {

            header("Location: panel_register.php?error=First name is required");
            exit();

        } else if ($last_name == NULL) {

            header("Location: panel_register.php?error=Last name is required");
            exit();

        } else if ($email == NULL) {

            header("Location: panel_register.php?error=Email is required");
            exit();

        } else if ($user == NULL) {

            header("Location: panel_register.php?error=Username is required");
            exit();

        } else if ($pass == NULL) {

            header("Location: panel_register.php?error=Password is required");
            exit();

        } else if ($option == NULL) {

            header("Location: panel_register.php?error=Choose option");
            exit();

        }
        else {

            $query_email = "SELECT * FROM kontakty WHERE email='$email'";
            $query_user = "SELECT * FROM klienci, pracownicy WHERE k_login='$user' OR p_login='$user'";

            $stmt_email = mysqli_query($conn, $query_email);
            $stmt_user = mysqli_query($conn, $query_user);

            if (mysqli_num_rows($stmt_email) > 0) {

                header("Location: panel_register.php?error=This email exists");
                exit();

            } else if (mysqli_num_rows($stmt_user) > 0) {
                
                header("Location: panel_register.php?error=This username exists");
                exit();

            } else {

                switch($option) {
                    case "klient":
                        $query_insert = "INSERT INTO klienci VALUES (4, 4, 4, '$user', '$pass', '$last_name', '$first_name')";
                        break;
                    case "pracownik":
                        $date_time = date("Y-m-d H:i:s");
                        $query_insert = "INSERT INTO pracownicy VALUES (3, 3, 3, '$user', '$pass', '$last_name', '$first_name', 'admin2', 1, '$date_time', NULL)";
                        break;
                }

                if(!mysqli_query($conn, $query_insert)) {

                    header("Location: panel_register.php?error=Fail query");
                    exit();
                }

                $_SESSION['login_user'] = $user;
                $_SESSION['logged'] = true;

                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;

                header("Location: logged.php");
            }
        }
    }
}

// closing connection
mysqli_close($conn);
