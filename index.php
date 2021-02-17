<HTML>
<HEAD>
<TITLE>PHP TEST</TITLE>
</HEAD>
<BODY>
<?php
	
	echo 'Task 1. Fibonacci sequence: <br>';
	$pp = 0;//Задаём первые два элемента последовательности
	$p = 1;
	echo " $pp, $p ";
	for ($i = 0; $i<62; $i++){// в цикле находим следующее число, складывая два предидущих, выводим на экран и меняем значения на новые 
		$n=$p+$pp;
		echo ", $n ";
		$pp = $p;
		$p = $n;
	}
	echo '<br>Task 3:<br>';
	echo 'Collection of figures:<br>';
	echo <<<DT
<table align="left" bgcolor="white" border=1px bordercolor="blue" cellpadding=3px>
	<tr>
		<td>Figure type</td><td>Params of figure</td><td>Square</td>
	</tr>
DT;
	$files = scandir('./collection');//сканируем директорию с фигурами
	for ($i=2; $i<count($files); $i++){//в цикле по имени файла заносим данные о фигурах в массив
		$name = $files[$i];
		$arrOfFigs[] = explode('||',file_get_contents('collection/'.$name));
	}
	if ($arrOfFigs != null) {//проверяем, есть ли сгенерированные фигуры, если таких нет, то выводим сообщение об этом
		usort($arrOfFigs, function($a, $b) { //сортируем массив по плащади фигур, выставляем их по убыванию
			return ($a[2] > $b[2]) ? -1 : 1; 
			});
		foreach ($arrOfFigs as &$value){//заполняем таблицу данными
			echo <<<DT
			<tr> <td>$value[0]</td><td>$value[1]</td><td>$value[2]</td> </tr>
DT;
		}
	} else {
    echo '<tr><td>No figures</td> </tr>';
	}
	echo '</table>';//делаем кнопки перехода на скрипт генерации фигур Generator.php. Для каждого вида фигур своя кнопка
	echo <<<DT
	<form action="generator.php" method="POST">
     <input name="GenRec" type="submit" value="Generate rectangle" />
	</form>
DT;
	echo <<<DT
	<form action="generator.php" method="POST">
     <input name="GenTri" type="submit" value="Generate triangle" />
	</form>
DT;
	echo <<<DT
	<form action="generator.php" method="POST">
     <input name="GenCir" type="submit" value="Generate Circle" />
	</form>
DT;
	
?>
</BODY>
</HTML>