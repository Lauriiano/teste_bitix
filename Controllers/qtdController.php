<?php 

	class qtdController extends Controller {

		public function index(){

			$getPlano = new Plano;

			$plano = $getPlano->getPlanoEscolhido($_POST['codPlano']);
			$data = array_merge($_POST, $plano);
			$this->loadView('home', $data);
		}

	}