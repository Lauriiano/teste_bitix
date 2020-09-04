<?php 

	class Plano {
				
			protected $planosJson;
			protected $plano;

			public function __construct($codPlano = null) {

				$this->planosJson = json_decode(file_get_contents('planos.json'));

					foreach ($this->planosJson as $key => $value) {
						if ($value->codigo == $codPlano) { //pega e retorna o preço do plano escolhido pelo usuario
							$this->plano = $value;
						}
					}
			}

			public function getPlano( $total_vidas, $variable, $unVariable ) {

				/*var_dump($variable);
				var_dump($unVariable);
				var_dump($this->plano);
				exit;*/

				foreach ($variable as $key => $value) {
					if($this->plano->codigo == $value->codigo) { //verifica se o plano escolhido pelo usuario faz parte dos planos com preços variaveis
						if ($total_vidas >= $value->minimo_vidas) { //Caso seja um plano com preço variavel, verifica se tem o minimo de vidas necessario
							return $value;
						}
					}
				}
				return $this->retornarPreco($unVariable);
			}

			private function retornarPreco($unVariable) {

				foreach ($unVariable as $key => $value) {
					if($this->plano->codigo == $value->codigo) { //verifica se o plano escolhido pelo usuario faz parte dos planos com preços variaveis
						return $value;
					}
				}
			}

			public function getPlanoEscolhido($codPlano) {

				foreach ($this->planosJson as $key => $value) {
					if ($value->codigo == $codPlano) { //pega e retorna o plano escolhido pelo usuario no planos.json
						return array("codigo" => $value->codigo, "plano" => $value->nome);
					}
				}
			}
		}
