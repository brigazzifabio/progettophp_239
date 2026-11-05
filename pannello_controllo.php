<?php
session_start();

include("dbconf.php");
?>
<html>
    <head>
        <title>Pannello di Controllo - Progetto PHP 239</title>

        <script>
            function Esci(){
                if(confirm("Sei sicuro di voler Uscire ?")){
                    window.open("login.php?azione=logout","_top");
                }
            }
        </script>

    </head>
<body>
    <center>
        <h2>Pannello di Controllo</h2>
        <?php
        echo "Benvenuto/a " . ucwords($_SESSION["username"]) . "<br><br>";

        //esercizio menu
        //-> 0. struttura di esempio menu in html nativo
        //-> 1. creare una tabella mysql chiamata "menu" o "voci_menu"
        //-> 2. inserire delle voci di menu con nome e pagina dove devono andare
        //3. collegarsi in select alla tabella
        //4. costruire un menu di pulsanti verticale
        //5. nb. come ultimo menu aggiungere Esci (non ce nella tabella mysql) per fare il logout 

        //punto 3
        $select_voci_menu = "SELECT nome, url, attivo FROM voci_menu where canc = 0";
        $result_voci_menu = mysqli_query($conn, $select_voci_menu);
        
        ?>
        <table>
        <?php
        while($array_voci_menu = mysqli_fetch_array($result_voci_menu)){
            $nome_voce = $array_voci_menu["nome"];
            $url_voce = $array_voci_menu["url"];
            $voce_attiva = $array_voci_menu["attivo"];

            $strVoceAttiva = "";
            if($voce_attiva == 0) $strVoceAttiva = " disabled ";
            ?>
            <tr>
                <td>
                    <a href="<?php echo $url_voce; ?>" title="<?php echo $nome_voce; ?>" alt="<?php echo $nome_voce; ?>">
                        <button id="btn<?php echo $nome_voce; ?>" style="width:120px" <?php echo $strVoceAttiva; ?>><?php echo $nome_voce; ?></button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td style="text-align:center">
                    <!--<input type="button" value="Anagrafica" id="btnAnagrafica">//-->
                    <button id="btnEsci" style="width:80px" onclick="Esci();">Esci</button>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>