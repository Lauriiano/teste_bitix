<?php 

	class RegistroController extends Controller {
		public function index() {

			$data = array_merge($_POST, $_GET);
			$registro = new Beneficiario($data);

			$dadosRegistro = $registro->getData();

			array_push($dadosRegistro, "end");

			$this->loadView('home', $dadosRegistro);

		}
	}