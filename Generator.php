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
			$filename = 'rectangle-'.$this->length.'-'.$this->width;
			if (file_exists('collection/'.$filename)){
				echo 'Generated rectangle already exist. Come back and try again.';
			} else {
				$text = 'Rectangle||Length='.$this->length.' Width='.$this->width.'||'.$this->s;
				$fp = fopen('collection/'.$filename.".txt", "w");
				fwrite($fp, $text);
				fclose($fp);
				$this->PrintParam();
			}
		}
		private function PrintParam(){
			echo '<br>Length:'. $this->length .' , Width: '. $this->width .' , Square: '. $this->s .' <br> Rectangle was saved. <br>';
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
			$filename = 'triangle-'.$this->aSide.'-'.$this->bSide.'-'.round($this->cSide, 3);
			if (file_exists('collection/'.$filename)){
				echo 'Generated triangle already exist. Come back and try again.';
			} else {
				$text = 'Triangle||Side A='.$this->aSide.' Side B='.$this->bSide.' Side C='.round($this->cSide, 3).'||'.round($this->s, 3);
				$fp = fopen('collection/'.$filename.".txt", "w");
				fwrite($fp, $text);
				fclose($fp);
				$this->PrintParam();
			} 	
		}
		private function PrintParam(){
			echo '<br> A-side: '. $this->aSide .' B-side: '. $this->bSide .' C-side: '. round($this->cSide, 3) .' Sqare: '. round($this->s, 3) .'<br> Triangle was saved. <br>';
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
if (isset($_POST['GenRec'])){
	$rect = new Rectangle(rand(1, 20), rand(1, 20));
}
if (isset($_POST['GenTri'])){
	$tria = new Triangle(rand(1, 20), rand(1, 20), rand(15, 165));
}
if (isset($_POST['GenCir'])){
	$circ = new Circle(rand(1, 10));
}
?>