<HTML>
<HEAD>
<TITLE>PHP TEST</TITLE>
</HEAD>
<BODY>
<?
	class Fig {
		protected $s;
	}
	class Rectangle extends Fig {
		public $length, $width;
		
		public function __construct($lng, $wdt) {
			$this->length = $lng;
			$this->width = $wdt;
			$this->RecSquare();
		}
		private function RecSquare(){
			$this->s = $this->length * $this->width;
			$this->PrintParam();
		}
		private function PrintParam(){
			echo '<br>Length:'. $this->length .' , Width: '. $this->width .' , Square: '. $this->s .' <br> ';
		}
	}
	class Triangle extends Fig {
		public $aSide, $bSide, $cSide, $angle;
		
		public function __construct($aS, $bS, $ang){
			$this->aSide = $aS;
			$this->bSide = $bS;
			$this->angle = $ang;
			$this->cSide = sqrt($aS*$aS + $bS*$bS - 2*$aS*$bS*cos(Deg2rad($ang)));
			$this->TriSquare();
		}
		
		private function TriSquare(){
			$p = ($this->aSide + $this->bSide + $this->cSide)/2;
			$this->s = sqrt($p*($p-$this->aSide)*($p-$this->bSide)*($p-$this->cSide));
			$this->PrintParam();
		}
		private function PrintParam(){
			echo '<br> A-side: '. $this->aSide .' B-side: '. $this->bSide .' C-side: '. round($this->cSide, 3) .' Sqare: '. round($this->s, 3) .'<br>';
		}
	}
	class Circle extends Fig {
		public $radius;
		public function __construct($r){
			$this->radius = $r;
			$this->CirSquare();
		}
		private function CirSquare(){
			$this->s = pi() * $this->radius * $this->radius;
			$this->PrintParam();
		}
		private function PrintParam(){
			echo '<br> Radius: '. $this->radius .' Sqare: '. round($this->s, 3) .'<br>';
		}
	}
	echo 'Задание 1. Последовательность Фибоначчи: <br>';
	$pp = 0;
	$p = 1;
	echo " $pp, $p ";
	for ($i = 0; $i<62; $i++){
		$n=$p+$pp;
		echo ", $n ";
		$pp = $p;
		$p = $n;
	}
	echo '<br>Задание 3:<br>';
	$rect = new Rectangle(rand(1, 20), rand(1, 20));
	$tria = new Triangle(rand(1, 20), rand(1, 20), rand(15, 165));
	$circ = new Circle(rand(1, 20));
?>
</BODY>
</HTML>