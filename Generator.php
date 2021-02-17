<?php
namespace Vendor\Model;
	
    class Fig 
	{// Определяем родительский класс Fig с общимb для всех наследников полями - $s - площадью и Cheker - функцией проверки существования идентичной фигуры
        protected $s;
        protected function Cheker($filename, $text)
		{ //Проверяет, была ли такая фигура сгенерирована ранее и если не была, то сохраняет файл с данными о фигруе в  
        //каталог collection
        //кнопка возврата на главную страницу
        echo <<<DT
        <form action="index.php" method="POST">
        <input name="Back" type="submit" value="BACK" />
        </form>
DT;
            if (file_exists('collection/'.$filename.'.txt')) {
                echo 'Generated figure already exist. Come back and try again.';
                return false;
            } else {
				$fp = fopen('collection/'.$filename.".txt", "w");
				fwrite($fp, $text);
				fclose($fp);
				return true;

            }
        }
	}
	class Rectangle extends Fig 
	{// определяем класс Прямоугольника, наследником класса Fig. Поля: длинна - $length, ширина - $width, конструктор, функция вычисления  
	//площади - RecSquare, функция вывода на экран сгенерированных параметров - PrintParam
	
		public $length, $width;
		
		public function __construct($lng, $wdt)
		{ //конструктор принимает значение длинны и ширины и вызывает функцию вычисления площади
			$this->length = $lng;
			$this->width = $wdt;
			$this->RecSquare();
		}
		private function RecSquare()
		{//функция вычисляет площадь,вызывает функцию проверки существования идентичной фигуры, вызывает функцию вывода параметров на экран
			$this->s = $this->length * $this->width;
			$filename = 'rectangle-'.$this->length.'-'.$this->width;
			$text = 'Rectangle||Length='.$this->length.' Width='.$this->width.'||'.$this->s;
			if ($this->Cheker($filename, $text)) {
				$this->PrintParam();
			}
		}
		private function PrintParam()
		{//выводит на экран длину, ширину и полученную площадь
			echo '<br>Length:'. $this->length .' , Width: '. $this->width .' , Square: '. $this->s .' <br> Rectangle was saved. <br>';
		}
	}
	class Triangle extends Fig 
	{//определяем класс Треугольника, наследником класса Fig. Поля: Сторона А - $aSide, Сторона B - $bSide, Сторона С - $cSide,
	//угол между A u B - $angle, конструктор, функция нахождения площади - TriSquare,  функция вывода на экран сгенерированных параметров - PrintParam
		public $aSide, $bSide, $cSide, $angle;
		
		public function __construct($aS, $bS, $ang)
		{//Конструктор получает данные о стороне А, B и угле между ними, затем вычисляет сторону C, далее вызывет функцию TriSquare
			$this->aSide = $aS;
			$this->bSide = $bS;
			$this->angle = $ang;
			$this->cSide = sqrt($aS*$aS + $bS*$bS - 2*$aS*$bS*cos(Deg2rad($ang)));
			$this->TriSquare();
		}
		
		private function TriSquare()
		{//функция вычисляет площадь, вызывает функцию проверки существования идентичной фигуры, вызывает функцию вывода параметров на экран 
			$p = ($this->aSide + $this->bSide + $this->cSide)/2;
			$this->s = sqrt($p*($p-$this->aSide)*($p-$this->bSide)*($p-$this->cSide));
			$filename = 'triangle-'.$this->aSide.'-'.$this->bSide.'-'.round($this->cSide, 3);
			$text = 'Triangle||Side A='.$this->aSide.' Side B='.$this->bSide.' Side C='.round($this->cSide, 3).'||'.round($this->s, 3);
			if ($this->Cheker($filename, $text)) {
				$this->PrintParam();
			}			
		}
		private function PrintParam()
		{ //выводит на экран длину, ширину и полученную площадь
			echo '<br> A-side: '. $this->aSide .' B-side: '. $this->bSide .' C-side: '. round($this->cSide, 3) .' Sqare: '. round($this->s, 3) .'<br> Triangle was saved. <br>';
		}
	}
	class Circle extends Fig 
	{ //определяем класс Круга, наследников класса Fig. Поля: радиус - $radius, конструктор, функция вычисления площади - CirSquare, 
	//функция вывода параметров на экран
		public $radius;
		public function __construct($r)
		{//получает радиус и вызывает функцию вычисления площади
			$this->radius = $r;
			$this->CirSquare();
		}
		private function CirSquare()
		{//функция вычисляет площадь, вызывает функцию проверки существования идентичной фигуры, вызывает функцию вывода параметров на экран
			$this->s = pi() * $this->radius * $this->radius;
			$filename = 'circle-'.$this->radius;
			$text = 'Circle||Radius='.$this->radius.'||'.round($this->s, 3);
			if ($this->Cheker($filename, $text)) {
				$this->PrintParam();
			}
		}
		private function PrintParam()
		{//выводит на экран длину, ширину и полученную площадь
			echo '<br> Radius: '. $this->radius .' Sqare: '. round($this->s, 3) .'<br>Circle was saved. <br>';
		}
	}
//в зависимости от нажатой кнопки создаётся одна из трёх фигур
if (isset($_POST['GenRec'])){
	$rect = new Rectangle(rand(1, 20), rand(1, 20));
}
if (isset($_POST['GenTri'])){
	$tria = new Triangle(rand(1, 20), rand(1, 20), rand(15, 165));
}
if (isset($_POST['GenCir'])){
	$circ = new Circle(rand(1, 10));
}
