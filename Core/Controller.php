<?php 

	class Controller {

		public function loadView($viewName, $viewData = array()) {

			$planos = json_decode(file_get_contents('planos.json'));

				extract($viewData);

				if (in_array("end", $viewData)) {
					$control = true;
					array_pop($viewData);
					$planoUsuario = array_pop($viewData);
					$valorTotal = array_pop($viewData);
				}

			require 'views/'.$viewName.'.php';

		}

	}