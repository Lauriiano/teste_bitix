<?php 

include('Precos.php');

	class Beneficiario extends Precos {

		private $nomes;
		private $idades;
		private $planoBeneficiario; //retorna o plano caso seja variavel
		private $codPlano;

		public function __construct($dados) {
			parent::__construct();
			$this->planoBeneficiario = parent::getPreco($dados['total_vidas'], $dados['codPlano']);
			$this->nomes = $dados['nome'];
			$this->idades = $dados['idade'];
			$this->codPlano = $dados['codPlano'];
		}



		public function getData() {
			$data = $this->juntarDados();
			array_push($data, (object) parent::getPlanoEscolhido($this->codPlano));
			return $data;

		}

		public function juntarDados() {
			$data = array();
			$valorTotal = 0;
			foreach ($this->idades as $key => $value) { // separa os beneficiários por nome idade e valor do plano e pega o valor total. OBS: Plano ja está com as variações
				if ($value == 0 || $value <= 17) {
					array_push($data, (object) array("nome" => $this->nomes[$key], "idade" => $value, "preco" => (float) $this->planoBeneficiario->faixa1));
					$valorTotal += $this->planoBeneficiario->faixa1;
				} else if($value == 18 || $value <= 40) {
					array_push($data, (object) array("nome" => $this->nomes[$key], "idade" => $value, "preco" => (float) $this->planoBeneficiario->faixa2));
					$valorTotal += $this->planoBeneficiario->faixa2;
				} else {
					array_push($data, (object) array("nome" => $this->nomes[$key], "idade" => $value, "preco" => (float) $this->planoBeneficiario->faixa3));
					$valorTotal += $this->planoBeneficiario->faixa3;
				}

			}
				array_push($data, (object) array("ValorTotal" => $valorTotal));
				return $data;
		}

	}