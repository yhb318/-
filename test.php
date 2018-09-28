<?php
	//求容积
	//给定一个数组a，数组每个成员代表X轴上每个区域宽度为1的一个台阶高度，计算$a=[0,1,0,2,1,0,1,3,2,1,2,1];时台阶最多能够积水多少
	function rj($a='')
	{
		if($a==''|| !is_array($a))	$a=[0,1,0,2,1,0,1,3,2,1,2,1];
		$rj=0;
		while (is_array($a) && count($a)>1) {
			foreach ($a as $k => $v) {
				for ($i=$k+1; $i <count($a) ; $i++) { 
					if ($v<=$a[$i]) {
						break;
					}elseif($i==count($a)-1){
						$temp=$a; 
						array_splice($temp,0,1);
						$next_max=max($temp); 
						$i=array_search($next_max,$a); 
						break;
					}
				}
				break;
			}
			$h=$a[$i];
		 	if($a[0]<=$a[$i]) $h=$a[0];

		 	$num=$h*($i+1);
		 	$jm=0;
		 	foreach ($a as $k => $v) {
		 		if($k>$i) break;
		 		$jm+=$v;
		 	}
		 	$jm=$jm-abs($a[$i]-$a[0]);
		 	$s=0;
		 	if($num>$jm) $s=$num-$jm;
			$rj+=$s;    
			array_splice($a,0,$i);
		}

		echo '<br> 容积'.$rj;
	}
		
	rj(); 
	
?>

    