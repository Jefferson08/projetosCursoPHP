
<?php 
	class Calculadora{
		public function somar($numero1, $numero2){
			$resulado = $numero1 + $numero2;
			return $resulado;
		}

		public function subtrair($numero1, $numero2){
			$resulado = $numero1 - $numero2;
			return $resulado;
		}

		public function dividir($numero1, $numero2){
			$resulado = $numero1 / $numero2;
			return $resulado;
		}

		public function multiplicar($numero1, $numero2){
			$resulado = $numero1 * $numero2;
			return $resulado;
		}
	}

 ?>