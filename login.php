<?php
session_start();
?>
<html>
    <head>
        <title>Login - Progetto PHP 239</title>
    </head>

<body>
    <?php
    include("dbconf.php");

    $azione = $_GET["azione"] ?? '';        #operatori => null coalescing operator
    $username = $_GET["username"] ?? '';
    $password = $_GET["password"] ?? '';
    ?>

    <center>
        <fieldset style="width: 40%; height: 130px;">
            <legend align="center">Login</legend>

            <form action="login.php" method="get">
                <input type="hidden" id="azione" name="azione" value="accedi">

                <table style="width: 100%;">
                    <tr>
                        <td style="width: 35%; text-align: right;">Username:</td>
                        <td style="width: 65%;">
                            <input type="text" id="username" name="username" required placeholder="inserisci lo username" style="width: 200px;" value="<?php echo $username; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Password:</td>
                        <td>
                            <input type="password" id="password" name="password" required placeholder="inserisci la password" style="width: 200px;" value="<?php echo $password; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Accedi" />
                        </td>
                    </tr>
                </table>
            </form>

        </fieldset>
    </center>

    <?php
    if($azione == "accedi"){

        /*echo "azione: " . $azione . "<br>";
        echo "username: " . $username . "<br>";
        echo "password: " . $password . "<br>";*/

        //comporre la query per vedere se username e password esistono nel dabatase nella tabella utenti
        $select_utenti = "SELECT * FROM `utenti` WHERE `username` = '$username' AND `password` = SHA1('$password') and attivo = 1 and canc = 0";
        //echo "select_utenti: " . $select_utenti . "<br>";

        //eseguire query con la conn a mysql
        $result_utenti = mysqli_query($conn, $select_utenti);
        $totale_utenti = mysqli_num_rows($result_utenti);

        if($totale_utenti == 0){
            echo "<center><span style='color:red'><b>Attenzione! Username e/o passord sbagliati! Riprovare.</b></span></center>";
        }
        else{
            //echo "<center><span style='color:green'><b>Utente Esiste!</b></span></center>";
            
            $_SESSION["username"] = $username;
            header("Location: pannello_controllo.php");
        }
    }

    if($azione == "logout"){
        $_SESSION["username"] = "";
        session_destroy();
    }
    ?>
</body>
</html>