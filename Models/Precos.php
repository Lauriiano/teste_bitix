<?php 

	include('Plano.php');

	class Precos extends Plano {

		protected $variable; //Planos com preços variaveis
		protected $unVariable; //planos sem preços variaveis

		public function __construct() {

			$precos = json_decode(file_get_contents('precos.json'));

			$unVariable = array();
			$variable = array();

			foreach ($precos as $key => $value) { //separa os planos com preços variaveis dos planos que não tem preços variaveis.

				if ($value->minimo_vidas > 1) {
					array_push($variable, $value);
					continue;
				}
					array_push($unVariable, $value);
			}

			$this->variable = $variable;
			$this->unVariable = $unVariable;
		}

		public function getPreco($total_vidas, $codPlano) { //função pra pegar plano tendo preço variavel ou não
			//chama o metodo que verifica se o plano é variavel ou não, ja passando como parametro somente os planos variaveis
			parent::__construct($codPlano);
			return parent::getPlano($total_vidas, $this->variable, $this->unVariable); 

		}

	}	
