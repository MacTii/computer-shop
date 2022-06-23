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

    if (isset($_POST['login'])) {
        
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

        if ($user == NULL) {

            header("Location: panel_login.php?error=Username is required");
            exit();

        } else if ($pass == NULL) {

            header("Location: panel_login.php?error=Password is required");
            exit();

        } else {


            $query_client = "SELECT * FROM klienci WHERE k_login='$user' AND k_haslo='$pass'";
            $query_employee = "SELECT * FROM pracownicy WHERE p_login='$user' AND p_haslo='$pass'";

            $stmt_client = mysqli_query($conn, $query_client);
            $stmt_employee = mysqli_query($conn, $query_employee);

            if (mysqli_num_rows($stmt_client) > 0) {

                $_SESSION['login_user'] = $user;
                $_SESSION['logged'] = true;
                $_SESSION['client'] = true;

                $row = mysqli_fetch_assoc($stmt_client);

                $_SESSION['first_name'] = $row["k_imie"];
                $_SESSION['last_name'] =  $row["k_nazwisko"];

                header("Location: logged.php");

            } else if (mysqli_num_rows($stmt_employee) > 0) {

                $_SESSION['login_user'] = $user;
                $_SESSION['logged'] = true;
                $_SESSION['client'] = false;

                $row = mysqli_fetch_assoc($stmt_employee);

                $_SESSION['first_name'] = $row["p_imie"];
                $_SESSION['last_name'] =  $row["p_nazwisko"];

                header("Location: logged.php");
            }
            else {
                
                header("Location: panel_login.php?error=Incorrect username or password");
                exit();
            }
        }
    }
}

// closing connection
mysqli_close($conn);

?>
