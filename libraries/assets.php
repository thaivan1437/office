<?php if(!defined('_lib')) die("Error");
require "min/utils.php";
class Assets
{
	public $js;
	public $css;

	public $css_files;
	public $css_path = "";
	public $is_dev = 0;
	function addCss($str){
		$this->css[] = $str;
	}
	function setDeveloper($var){
		$this->is_dev = $var;
	}
	function addJs($str){
		$this->js[] = $str;
	}
	function showJs(){
		if(!$this->is_dev){
		$js = Minify_getUri($this->js);
		echo '<script src="'.getUrl().$js.'" type="text/javascript"></script>';
		}else{
			foreach($this->js as $k=>$v){
				echo '<script defer src="'.$v.'" type="text/javascript"></script>';
			}
		}
	}
	function showCss(){
		if(!$this->is_dev){
			$css = Minify_getUri($this->css);
			echo '<link href="'.getUrl().$css.'" type="text/css" rel="stylesheet"/>';
		}else{
			foreach($this->css as $k=>$v){
				echo '<link href="'.$v.'" type="text/css" rel="stylesheet"/>';
			}
		}
	}
	
}
function sanitize_output($buffer) {
		$ignored = array();
        $i = 0;
        preg_match_all("/<textarea[^>]*?>(.*?)<\/textarea>/s", $buffer, $expr);
        foreach ($expr[0] as $k => $v) {
                $ignored[$i] = $expr[0][$k];
                $buffer = str_replace($expr[0][$k], '<='.$i.'=>', $buffer);
                $i++;
        }

        preg_match_all("/<script[^>]*?>(.*?)<\/script>/s", $buffer, $expr);
        foreach ($expr[1] as $k => $v) {
                if(empty($expr[1][$k]))
                        continue;
                $temp = preg_replace('/\s+\/{2,}.*\s+/', '', $expr[1][$k]);
                $temp = preg_replace('/\s+\/\*.*\*\/\s+/s', '', $temp);
                $buffer = str_replace($expr[1][$k], $temp, $buffer);
        }
        $buffer = preg_replace('/\n\r|\r\n|\n|\r|\t/', '', $buffer);
        $buffer = preg_replace('/ {2,}/', ' ', $buffer);
        foreach($ignored as $k => $v) {
                $buffer = preg_replace('/<='.$k.'=>/', $v, $buffer);
        }
       
    return preg_replace(
        array(
            // t = text
            // o = tag open
            // c = tag close
            // Keep important white-space(s) after self-closing HTML tag(s)
            '#<(img|input)(>| .*?>)#s',
            // Remove a line break and two or more white-space(s) between tag(s)
            '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
            '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
            '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
            '#<(img|input)(>| .*?>)<\/\1\x1A>#s', // reset previous fix
            '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
            // Force line-break with `&#10;` or `&#xa;`
            '#&\#(?:10|xa);#',
            // Force white-space with `&#32;` or `&#x20;`
            '#&\#(?:32|x20);#',
            // Remove HTML comment(s) except IE comment(s)
            '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
        ),
        array(
            "<$1$2</$1\x1A>",
            '$1$2$3',
            '$1$2$3',
            '$1$2$3$4$5',
            '$1$2$3$4$5$6$7',
            '$1$2$3',
            '<$1$2',
            '$1 ',
            "\n",
            ' ',
            ""
        ),
    $buffer);
	}
