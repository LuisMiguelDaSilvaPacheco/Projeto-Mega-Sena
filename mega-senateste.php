<?php

menu();

function menu(): void {
	$continuar = true;

	do {
		print "
		*************************
		*  Escolha uma loteria  *
		*************************
		*  1 - Mega Sena        *
		*  2 - Quina            *
		*  3 - Lotomania        *
		*  4 - Lotofácil        *
		*************************
		*  0 - Sair             *
		*************************
		Opção: ";

		$opcao = trim(readline());

		switch ($opcao) {
			case '1':
				print("\nVocê escolheu a Mega-Sena!\n");
				mega_sena();
				break;

			case '2':
				print("\nVocê escolheu a Quina!\n");
				quina();
				break;

			case '3':
				print("\nVocê escolheu a Lotomania!\n");
				lotomania();
				break;

			case '4':
				print("\nVocê escolheu a Lotofácil!\n");
				lotofacil();
				break;

			case '0':
				print("\nSaindo...");
				$continuar = false;
				break;

			default:
				print("\nResposta inválida\n");
				break;
		}

	} while ($continuar);

}

function mega_sena(): void {
	$qntd_jogos = (int) readline('Quantos jogos deseja? ');
	$qntd_dezenas = (int) readline('Quantas dezenas para cada jogo? ');

	if ($qntd_dezenas >= 6 && $qntd_dezenas <= 20){

		for ($jogos = 0; $jogos < $qntd_jogos; $jogos++) {
			$sorteados = [];

			while (count($sorteados) < $qntd_dezenas) {
				$dezena_sorteada = rand(1, 60);

				if (!in_array($dezena_sorteada, $sorteados)){
					$sorteados[] = $dezena_sorteada;
				}
			}
			sort($sorteados);
			mostrarSorteados($sorteados);
		}

		print ("\n O seu jogo custará R$". tabelaValoresMega($qntd_dezenas). ",00 \n");

	} else {
		print("\nResposta inválida. Escolha entre 6 à 20 dezenas\n");
		return;
		}
}

function tabelaValoresMega($qntd_dezenas){

    $tabela = [
        6 => 6,
        7 => 42,
        8 => 168,
        9 => 504,
        10 => 1260,
        11 => 2772,
        12 => 5544,
        13 => 10296,
        14 => 18018,
        15 => 30030,
        16 => 48048,
        17 => 74256,
        18 => 111384,
        19 => 162792,
        20 => 232560
    ];

    return $tabela[$qntd_dezenas];
}

function quina(): void {
    $qntd_jogos = (int) readline('Quantos jogos deseja? ');
    $qntd_dezenas = (int) readline('Quantas dezenas para cada jogo? ');

	if ($qntd_dezenas >= 5 && $qntd_dezenas <= 15){

        for ($jogos = 0; $jogos < $qntd_jogos; $jogos++) {
            $sorteados = [];

            while (count($sorteados) < $qntd_dezenas) {
                $dezena_sorteada = rand(1, 80);

                if (!in_array($dezena_sorteada, $sorteados)){
                     $sorteados[] = $dezena_sorteada;

                }

        	}

        sort($sorteados);

        mostrarSorteados($sorteados);

        }

		print ("\n O seu jogo custará R$". tabelaValoresQuina($qntd_dezenas). ",00 \n");

	} else{
		print("\nResposta inválida. Escolha entre 5 à 15 dezenas\n");
		return;
	}
}

function tabelaValoresQuina($qntd_dezenas){

    $tabela = [
        5 => 3,
        6 => 18,
        7 => 63,
        8 => 168,
        9 => 378,
        10 => 756,
        11 => 1386,
        12 => 2376,
        13 => 3861.50,
        14 => 6006,
        15 => 9009
    ];

    return $tabela[$qntd_dezenas];
}

function lotomania(): void{
    $qntd_jogos = readline('Quantos jogos deseja? ');
    $qntd_dezenas = 50;

    for ($jogos = 0; $jogos < $qntd_jogos; $jogos++){
        $sorteados = [];

        while (count($sorteados) < $qntd_dezenas){
            $dezena_sorteada = rand(1, 100);

            if (!in_array($dezena_sorteada, $sorteados)){
                $sorteados[] = $dezena_sorteada;

			}
        }

    sort($sorteados);
    mostrarSorteados($sorteados);

    }

	print ("O seu jogo custará R$". 5 * $qntd_jogos. ",00 \n");
}

function lotofacil(): void{
	$qntd_jogos = (int) readline('Quantos jogos deseja? ');
	$qntd_dezenas = (int) readline('Quantas dezenas para cada jogo? ');

	if ($qntd_dezenas >= 15 && $qntd_dezenas <= 20){

        for ($jogos = 0; $jogos < $qntd_jogos; $jogos++){
            $sorteados = [];

            while (count($sorteados) < $qntd_dezenas){
                $dezena_sorteada = rand(1, 25);

                if (!in_array($dezena_sorteada, $sorteados)){
                    $sorteados[] = $dezena_sorteada;
                }
            }

            sort($sorteados);
            mostrarSorteados($sorteados);

        	}

		print ("\n O seu jogo custará R$". tabelaValoresLotofacil($qntd_dezenas). ",00 \n");

	} else{
		print("\nResposta inválida. Escolha entre 15 à 20 dezenas\n");
		return;
	}
}

function tabelaValoresLotofacil($qntd_dezenas){

    $tabela = [
        15 => 3.50,
        16 => 56,
        17 => 476,
        18 => 2856,
        19 => 13566,
        20 => 54264

    ];

    return $tabela[$qntd_dezenas];
}

function mostrarSorteados($sorteados) {

	print("Os números escolhidos foram:\n");

	foreach ($sorteados as $sorteado) {
  		print "$sorteado  ";
	}
	print("\n");
}
