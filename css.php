<?php 
$css_cache_file = 'cache/style.css';
$css_path = '';
$css_files = array(
	"assets/font/font-awesome-4.2.0/css/font-awesome.css",
    "assets/css/font.css",
	"assets/css/popup.css",
	"assets/js/rating/star-rating.css",
	"assets/bootstrap-3.2.0/css/bootstrap.css",
	"assets/js/menu/menumaker.css",
	"assets/js/owlcarousel/owl.carousel.css",
	"assets/js/ivewslider/style.css",
	"assets/js/ivewslider/iview.css",
	"assets/js/magiczoomplus/magiczoomplus.css",
	"assets/js/custom-scrollbar/jquery.mCustomScrollbar.css",
	"assets/js/chosen/chosen.css",
	"assets/css/style.css",
);
function update() {
  global $css_path, $css_cache_file, $css_files;
  if (file_exists($css_cache_file)) {
    $cache_time = filemtime($css_cache_file);
    foreach ($css_files as $file) {
      if (file_exists($css_path.$file)) {
        $time = filemtime($css_path.$file);
        if ($time > $cache_time) {
          return joinCSSFiles();
          break;
        }
      }
    }
  } else {
    return joinCSSFiles();
  }
  return file_get_contents($css_cache_file);
}
function compressCSS($file) {
  $filedata = file_get_contents($file);
  $filedata = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $filedata);
  $filedata = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $filedata);
    $filedata = str_replace('{ ', '{', $filedata);
    $filedata = str_replace(' }', '}', $filedata);
    $filedata = str_replace('; ', ';', $filedata);
    $filedata = str_replace(', ', ',', $filedata);
    $filedata = str_replace(' {', '{', $filedata);
    $filedata = str_replace('} ', '}', $filedata);
    $filedata = str_replace(': ', ':', $filedata);
    $filedata = str_replace(' ,', ',', $filedata);
    $filedata = str_replace(' ;', ';', $filedata);  
  return $filedata;
}
function joinCSSFiles() {
  global $css_cache_file, $css_files, $css_path;
  $data = '';
  foreach ($css_files as $file) {
    if (file_exists($css_path.$file)) {
      $data .= compressCSS($css_path.$file);
    }
  }
  file_put_contents($css_cache_file, $data);
  return $data;
}
ob_start ("ob_gzhandler");
ob_start("compress");
header("Content-type: text/css;charset: UTF-8");
echo update();

?>

