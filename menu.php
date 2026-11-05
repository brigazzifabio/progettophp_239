<!-- esercizio1. costruiamo un meno html uguale a quello del pannello di controllo ma messo in orizzontale //-->
		
<table style="width: 60%">
	<tr>
		<?php
		$select_voci_menu = "SELECT nome, url, attivo FROM voci_menu where canc = 0";
		$result_voci_menu = mysqli_query($conn, $select_voci_menu);

		while($array_voci_menu = mysqli_fetch_array($result_voci_menu)){
			$nome_voce = $array_voci_menu["nome"];
			$url_voce = $array_voci_menu["url"];
			$voce_attiva = $array_voci_menu["attivo"];

			$strVoceAttiva = "";
			if($voce_attiva == 0) $strVoceAttiva = " disabled ";

			?>
			<td>
				<a href="<?php echo $url_voce; ?>" title="<?php echo $nome_voce; ?>" alt="<?php echo $nome_voce; ?>">
					<button id="btn<?php echo $nome_voce; ?>" style="width:120px" <?php echo $strVoceAttiva; ?>><?php echo $nome_voce; ?></button>
				</a>
			</td>
			<?php
		}
		?>
		<td>
			<a href="pannello_controllo.php" title="Pannello di Controllo" alt="Pannello di Controllo">
				<button id="btnPannelloControllo" style="width:140px">Pannello di Controllo</button>
			</a>
		</td>
		<td style="text-align:center">
			<!--<input type="button" value="Anagrafica" id="btnAnagrafica">//-->
			<button id="btnEsci" style="width:120px" onclick="Esci();">Esci</button>
		</td>
	</tr>
</table>