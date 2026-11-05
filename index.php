<html>
    <head>
        <title>Home PHP | ProgettoPHP 239</title>
    </head>
<body>
    <h1>Benvenuti in PHP!</h1>

    <i>prima pagina</i> di php<br><br>

    Data Oggi: 06/08/2026 16:53:30<br>

    <?php
    //VARIABILI
    $qta = 3;                           //intero 
    $prezzo = 49.99;                    //double/float => intero + decimale
    $totale = $prezzo * $qta;           //operatori aritmetici * / + - ()     
    $data_oggi = date("d/m/Y H:i:s");   //date
    $eDisponibile = true;               //boolean => true/false | on/off | 1/0 | si/no

    echo $data_oggi . "<br>";           //il punto . serve come concatenazione di stringhe e/o variabili
    echo "<b>seconda riga</b> in php nativo<br>";

    //STRUTTURE CONDIZIONALI
    //1o if....else if.....else

    if($qta > 4){                       //operatori condizionali < <= > >= == !=
        //qui faccio questo
    }
    else if($qta <= 4 || $prezzo < 30){               //&& => AND E , || => OR O
        //qui faccio un altra cosa
    }
    else{
        //altrimenti faccio altro
    }

    //esercizio 1 - stampa scontrino
    //ok - 1. se qta > 3 si applica un sconto del 10%
    //ok - 2. se qta <=3 e prezzo > 40, si applica uno sconto del 5%
    //ok - 3. altrimenti non si applica nessuno sconto.
    //ok - 4. creare le variabili sconto, sconto_euro, prezzo_scontato e totale_scontato
    //5. stampare uno scontrino unico con anche i valori delle variabile alle righe 14, 15 e 16
	
	if($qta > 3){
		$sconto = 10;
	}
	else if($qta <= 3 && $prezzo > 40){
		$sconto = 5;
	}
	else{
		$sconto = 0;
	}
	
	$prezzo_scontato = $prezzo - (($prezzo / 100) * $sconto);
	$sconto_euro = ($prezzo / 100) * $sconto;
	
	$totale_scontato = $prezzo_scontato * $qta;
	
	
	
	echo "<br>--------SCONTRINO--------<br>";
	echo "<b>quantita':</b> " . $qta . "<br>";					//echo "<b>quantita': $qta <br>"; versione breve
	echo "<b>prezzo:</b> " . convertiNumeroInITA($prezzo, 2) . "<br>";
	echo "<b>sconto:</b> " . $sconto . "&nbsp;% - " . convertiNumeroInITA($sconto_euro,3) . "<br>";				//&#37; => %
	echo "<b>prezzo scontato:</b> " . convertiNumeroInITA($prezzo_scontato,2) . "<br>";
	echo "<b>totale:</b> " . convertiNumeroInITA($totale,2) . "<br>";
	echo "<b>totale scontato:</b> " . convertiNumeroInITA($totale_scontato,2) . "<br>";
	echo "<b>totale sconto:</b> " . convertiNumeroInITA(($totale-$totale_scontato),2) . "<br>";
	echo "---------------------------------<br>";
	
	function convertiNumeroInITA($prezzo, $numdec){
		$prezzoITA = number_format($prezzo,$numdec,',','.');
		return $prezzoITA . "&nbsp;&euro;";
	}

    //STRUTTURE CONDIZIONALI
    //2o switch.....case

    switch($qta){ //4
        case 3:
                //codice x 3
            break;
        case 5:
                //codice x 5
            break;
        case 10:
                //codice x 10
            break;
        default:
            //codice se non soddisfa nessuno dei case
            break;
    }

    /* Esercizio 1 – Listino prodotti

    Hai una variabile $prodotto (stringa) e una variabile $qta (intero). 
    Usando uno switch sul prodotto, assegna il prezzo unitario secondo questo listino:

    "penna" → 1,50 €
    "quaderno" → 3,00 €
    "zaino" → 25,00 €
    qualsiasi altro prodotto → stampa "Prodotto non disponibile" e non calcolare nulla

    Calcola il totale (prezzo × qta) e stampa un riepilogo del tipo:
    3 x quaderno a 3,00 € = 9,00 € */

    $prodotto = "quaderno";
    $qta = 3;
    $prezzo = 0;

    switch($prodotto){
        case "penna":
            $prezzo = 1.50;
            break;
        case "quaderno":
            $prezzo = 3.00;
            break;
        case "zaino":
            $prezzo = 25.00;
            break;
        default:
            echo "Prodotto non disponibile";
            break;
    }

    if($prezzo != 0){
        $totale = $prezzo * $qta;
        
        echo "<br>--------ESERCIZIO SWITCH--------<br>";
        echo "<b>quantita':</b> " . $qta . "<br>";
        echo "<b>prezzo:</b> " . convertiNumeroInITA($prezzo, 2) . "<br>";
        echo "<b>totale:</b> " . convertiNumeroInITA($totale,2) . "<br>";
        echo "---------------------------------<br>";
    }

    //ARRAY o VETTORI

    $frutti = ["mela","arancia","pera","ananas","susina"];   //lunghezza: 5
    
    echo "<br>--------ESERCIZIO ARRAY e CICLO--------<br>";
    
    //stampa manuale o riferimento
    /*echo $frutti[0] . "<br>";        
    echo $frutti[1] . "<br>";
    echo $frutti[2] . "<br>";
    echo $frutti[3] . "<br>";*/

    //CICLI - 1o FOR - 1o start; 2o condizione; 3o aumento/diminuzione
    echo "<ol>";
    for($f = 0; $f < count($frutti); $f++){ //$f = $f + 1 => versione lunga
        echo "<li>". $frutti[$f] . "</li>";
    }
    echo "</ol>";

    /*  Esercizio 1 – Base: somma e media
        Dato l'array:
        $voti = [7, 8, 5, 9, 6, 10, 4];
        Usando un ciclo for, calcola la somma di tutti i voti e poi la media. 
        Stampa entrambi i risultati, con la media arrotondata a due decimali. */

    $voti = [7, 8, 5, 9, 6, 10, 5];  
    $somma = 0;
    $voti_totali = count($voti);

    for($v = 0; $v < $voti_totali; $v++){
        $somma = $somma + $voti[$v];
        //$somma += $voti[$v];
    }

    $media = $somma / $voti_totali;

    echo "<b>somma: </b> " . $somma . "<br>";
    echo "<b>media: </b> " . round($media,2) . "<br>";

    /*
    Esercizio 2 – Intermedio: massimo, minimo e conteggio
    Dato l'array:
    $temperature = [18, 23, 15, 27, 21, 12, 25, 19];
    Con un solo ciclo for (senza usare max() o min()):
    trova la temperatura massima e quella minima
    conta quante temperature sono sopra i 20 gradi
    salva in un nuovo array le posizioni (indici) in cui la temperatura supera i 20
    Stampa tutti i risultati.
    */

    $temperature = [18, 23, 15, 27, 21, 12, 25, 19];
    $max = $temperature[0];
    $min = $temperature[0];
    $sopra20 = 0;
    $indici = [];
    //$indici = [1,3,4,6];
    $valoriSopra20 = [];

    for($t = 0; $t < count($temperature); $t++){
        $temperatura = $temperature[$t];

        if($temperatura > $max) $max = $temperatura;
        if($temperatura < $min) $min = $temperatura;

        if($temperatura > 20){
            $sopra20++;
            $indici[] = $t;
            $valoriSopra20[] = $temperatura;
        }
    }

    echo "<br><b>massima: </b>: " . $max . "<br>";
    echo "<b>minima: </b>: " . $min . "<br>";    
    echo "<b>quante temperature sopra i 20 gradi: </b>: " . $sopra20 . "<br>";
    echo "<b>posizioni/indici:</b> " . implode(',',$indici) . "<br>";
    echo "<b>valori temperature sopra i 20 gradi:</b> " . implode(',',$valoriSopra20) . "<br>";

    echo "<br>---------------------------------<br>";  
    
    //ciclo while....do while
    //1° WHILE
    /*$p = 0;

    while($p >= 0){

        $p++;

        if($p % 2 == 0){
            continue;
        }
        else{
            echo $p . "<br>";
        }

        if($p == 74){
            break;
        }
  
    }*/ 

    /*
    Esercizio 1 (Base): Filtro numeri e arresto di sicurezza

    Traccia: Scrivi uno script che analizzi i numeri interi a partire da 1. 
    Il ciclo deve stampare a schermo solo i numeri pari. 
    Se incontra un multiplo sia di 2 che di 5 (quindi multiplo di 10), 
    deve saltarlo senza stamparlo (continue). 
    Il ciclo deve interrompersi del tutto (break) non appena si raggiunge un numero maggiore o uguale a 25.

    Suggerimento : Attenzione ai cicli infiniti.
    */
    echo " While Esercizio 1<br>";

    $numero = 0;
    
    while(true){

        $numero++;

        if($numero % 2 == 1){
            continue;
        }

        if($numero % 10 == 0){
            continue;
        }

        if($numero >= 25){
            echo "raggiunto il limite massimo!<br>";
            break;
        }

        echo "numero valido trovato: " . $numero . "<br>";
    }

    /*
    Esercizio 3 (Intermedio): Simulazione prelievi da budget con validazione
    Concetti: Accumulatore, validazione transazioni con continue, tetto massimo con break.

    Traccia: 
    Un utente ha a disposizione un budget iniziale di 300 €. 
    Viene fornita una coda di richieste di prelievo (valori interi positivi e negativi). 
    Il ciclo while elabora una richiesta alla volta:
    a. Se l'importo è minore o uguale a 0, la transazione è anomala e va scartata (continue).
    b. Se l'importo supera il credito residuo, non può essere processata: salta alla successiva (continue).
    c. Se il saldo residuo scende a 0 esatto, termina immediatamente le operazioni (break).
    d. Se la coda termina, il ciclo si chiude normalmente.
    
    Output Atteso:
    1- stampare le transazioni eseguite
    2- stampare il saldo disponibile
    */

    echo "<br><br>Esercizio 3 (Intermedio): <br>Simulazione prelievi da budget con validazione<br><br>";

    $saldoDisponibile = 300;
    $codaRichieste = [50, -20, 120, 0, 150, 80, 50, 40];
    $transazioniEseguite = 0;
    
    $indice = 0;
    $totaleRichieste = count($codaRichieste);

    while($indice < $totaleRichieste){

        $importo = $codaRichieste[$indice];

        $indice++;

        if($importo <= 0){
            echo "<span style='color:purple'>[SCARTATA] Richiesta non valida. $importo €<br></span>";
            continue;
        }

        if($importo > $saldoDisponibile){
            echo "<span style='color:red'>[RIFIUTATA] richiesta di $importo € supera il saldo residuo ($saldoDisponibile €)</span><br>";
            continue;
        }

        $saldoDisponibile -= $importo;
        $transazioniEseguite++;
        echo "<span style='color:green'><b>[OK] Prelievo di $importo €. Saldo residuo: $saldoDisponibile €</b></span><br>";

        if($saldoDisponibile == 0){
            echo "<span style='color:blue'>[FINE] Budget completamente esaurito!</span><br>";
            break;
        }

    }

    echo "<br><b>RIEPILOGO</b><br>";
    echo "Trandazioni Eseguite: $transazioniEseguite<br>";
    echo "Saldo Finale: $saldoDisponibile €<br>";

    /*
    Esercizio 1 (Base): Normalizzazione e Validazione Codici Fiscali/ID
    Concetto: 
    Ciclo while su un array di stringhe, continue per scartare record non conformi e 
    break al raggiungimento di una quota prefissata di record validi.
    
    Traccia:
    Dato un array di codici alfanumerici grezzi, elabora la lista con un ciclo while:
    Rimuovi spazi bianchi e converti il testo in maiuscolo.
    Se il codice ha una lunghezza diversa da 6 caratteri, segnala lo scarto e salta al successivo 
    Se il codice contiene caratteri non alfanumerici, scartalo 
    Salva i codici validi in un nuovo array. 
    Quando la lista dei codici validi raggiunge quota 3 elementi, interrompi subito la scansione
    */

    $datiGrezzi = [
        " a12b3 ",      // Lunghezza 5 (invalido)
        "AB12CD",       // Valido #1
        "xy99z!",       // Contiene carattere speciale '!' (invalido)
        "   ",          // Vuoto (invalido)
        "KL88MN",       // Valido #2
        "123456",       // Valido #3 -> trigger break
        "ZZ99AA",       // Non deve essere elaborato
        "OP77QR"
    ];
    ?>
	
	
</body>
</html>