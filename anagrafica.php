<?php
session_start();

include("dbconf.php");
?>
<html>
    <head>
        <title>Gestione Anagrafica - Progetto PHP 239</title>
		
		<style></style>
		
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
		
		<?php
		include("menu.php");
		?>
		
        <h2>Gestione Anagrafica</h2>
		
		
	</center>
</body>
</html>