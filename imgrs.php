<?php

	function ImageResizeProportional(&$img, $max_w, $max_h)
	  {
	  $max_w = 550;
	  $max_h = 450;
	  if (($h = imageSY($img)) >= ($w = imageSX($img)))
	    {
	    $k = $max_h / $h;
	    $img_h = $max_h;
		$img_w = $max_w;
	    $img_w = round($w * $k);
	    }
	  else
	    {
	    $k = $max_w / $w;
	    $img_w = $max_w;
	    $img_h = round($h * $k);
	    }
	  $dst_img = imagecreatetruecolor($img_w, $img_h);
	  ImageCopyResampled($dst_img, $img, 0, 0, 0, 0, $img_w, $img_h, $w, $h);
	  $img = $dst_img;
	  }

    function resize2Image($filename, $newwidth=false, $newheight=false){

	$size = getimagesize($filename);
    $width = $size[0];
    $height = $size[1];
    $type = $size[2];

    switch($type) {
        case 1: $source = ImageCreateFromGif($filename);  break;
        case 2: $source = ImageCreateFromJpeg($filename); break;
        case 3: $source = ImageCreateFromPng($filename);  break;
        default: return false;
    }

	if($newwidth) ImageResizeProportional(&$source, $newwidth, $newheight);

	Header("Content-type: ".$size['mime']);

    switch($type) {
        case 1: print ImageGif($source);  break;
        case 2: print ImageJpeg($source); break;
        case 3: print ImagePng($source);  break;
        default: return false;
    }

      }

$_SERVER['QUERY_STRING'] = str_replace("%22",'',$_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING'] = str_replace('"','',$_SERVER['QUERY_STRING']);
$size = getimagesize($_SERVER['QUERY_STRING']);
$size = $size[0];
$IMG_S = 300;
if($size < $IMG_S) {
$IMG_S = $size;	
header('Location: '.$_SERVER["QUERY_STRING"].'');
} else {
resize2Image($_SERVER['QUERY_STRING'],$IMG_S,$IMG_S);	
}

?>
