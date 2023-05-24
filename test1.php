<?php
function roma($romastr){
	if (!preg_match("/^[IVXLCDM]+$/",$romastr)) {
		return '格式不符合';
	}
	$romaArr = [
		"I" => 1,
		"V" => 5,
		"X" => 10,
		"L" => 50,
		"C" => 100,
		"D" => 500,
		"M" => 1000,
	];
	$inputArr = preg_split('//', $romastr, -1, PREG_SPLIT_NO_EMPTY);

	$amount = 0;
	foreach ($inputArr as $k => $v) {
		if ($k >= 1) {
			if ($v == 'V' && $inputArr[$k - 1] == 'I') {
				$romaArr[$v] = 4;
				$amount = $amount - 1;
			} elseif ($v == 'X' && $inputArr[$k - 1] == 'I') {
				$romaArr[$v] = 9;
				$amount = $amount - 1;
			} elseif ($v == 'L' && $inputArr[$k - 1] == 'X') {
				$romaArr[$v] = 40;
				$amount = $amount - 10;
			} elseif ($v == 'C' && $inputArr[$k - 1] == 'X') {
				$romaArr[$v] = 90;
				$amount = $amount - 10;
			} elseif ($v == 'D' && $inputArr[$k - 1] == 'C') {
				$romaArr[$v] = 400;
				$amount = $amount - 100;
			} elseif($v == 'M' && $inputArr[$k - 1] == 'C') {
				$romaArr[$v] = 900;
				$amount = $amount - 100;
			}
		}
		$amount += $romaArr[$v];
	}
	return $amount;
}

echo roma("MCMXCIX");
