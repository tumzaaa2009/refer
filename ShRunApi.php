<?php
//  echo $_POST['value'];
$value = $_POST['value'];
$escapedValue = escapeshellarg($value); // ป้องกันการถูกโจมตี
$typeConnect = $_POST['typeConnect'];
$escapedTypeConnect= escapeshellarg($typeConnect);

$output = shell_exec("cmd /c runapi.sh $escapedValue $escapedTypeConnect");
echo "Shell script executed. Output: $output";
