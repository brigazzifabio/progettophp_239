<?php
session_start();

include("dbconf.php");
?>
<html>
    <head>
        <title>Gestione Utenti - Progetto PHP 239</title>
		
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
		
		<?php
		$selectUtenti = "select * from utenti where canc = 0";
		$resultUtenti = mysqli_query($conn, $selectUtenti);
		$totaleUtenti = mysqli_num_rows($resultUtenti)
		?>
		
        <h2>Gestione Utenti - Totale <?php echo $totaleUtenti; ?></h2>
		
		<table style="width: 60%" cellspacing="1">
			<tr style="background-color: lightblue">
				<th>Id</th>
				<th>Username</th>
				<th>Email</th>
				<th>Tel / Cell</th>
				<th>Attivo</th>
				<th>Azioni</th>
			</tr>
			
			<?php
			while($array_utenti = mysqli_fetch_array($resultUtenti)){
				$id = $array_utenti["id"];
				$username = $array_utenti["username"];
				$email = $array_utenti["email"];
				$telcell = $array_utenti["tel_cell"];
				$attivo = $array_utenti["attivo"];
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $username; ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo $telcell; ?></td>
					<td><?php echo $attivo; ?></td>
					<td>[M] [C]</td>
				</tr>
				<?php
			}
			?>
			
		</table>
	</center>
</body>
</html>