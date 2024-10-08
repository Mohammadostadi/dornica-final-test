<?php

session_start();

$permitted_chars = '0123456789';

function generate_string($input, $strength = 10)
{
  $input_length = strlen($input);
  $random_string = '';
  for ($i = 0; $i < $strength; $i++) {
    $random_character = $input[random_int(0, $input_length - 1)];
    $random_string .= $random_character;
  }

  return $random_string;
}

$image = imagecreatetruecolor(170, 50);

imageantialias($image, true);

$colors = [];

$red = (int) rand(125, 175);
$green = (int) rand(125, 175);
$blue = (int) rand(125, 175);

for ($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20 * $i, $green - 20 * $i, $blue - 20 * $i);
}

imagefill($image, 0, 0, $colors[0]);

for ($i = 0; $i < 10; $i++) {
  imagesetthickness($image, (int) rand(2, 10));
  $line_color = $colors[(int) rand(1, 4)];
  imagerectangle($image, (int) rand(-10, 190), (int) rand(-10, 10), (int) rand(-10, 190), (int) rand(40, 60), $line_color);
}

$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];

$fonts = ['..\..\admin-panel\assets\fonts\irsans.ttf', '..\..\admin-panel\assets\fonts\irsans.ttf', '..\..\admin-panel\assets\fonts\irsans.ttf', '..\..\admin-panel\assets\fonts\irsans.ttf'];

$string_length = rand(6, 8);
$captcha_string = generate_string($permitted_chars, $string_length);
$_SESSION['captcha'] = $captcha_string;

for ($i = 0; $i < $string_length; $i++) {
  $letter_space = (int) (150 / $string_length);
  $initial = 8;

  imagettftext($image, 24, (int) rand(-1, 15), $initial + $i * $letter_space, (int) rand(25, 45), $textcolors[(int) rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>