<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Warna {
    var $instan;
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
    }
    function color($no){
	if($no == 1)
	{
		$no="#991c18";
		}
	elseif($no == 2)
	{
		$no="#eae81f";
		}
	elseif($no == 3)
	{
		$no="#2aff00";
		}
	elseif($no == 4)
	{
		$no="#0000ff";
		}
	elseif($no == 5)
	{
		$no="#3ca3ff";
		}
	elseif($no == 6)
	{
		$no="#ea701f";
		}
	else
	{
		$no="#b1d8f6";
		}

        return $no;
    }
    function color2($no){
	if($no == 12)
	{
		$no="#991c18";
		}
	elseif($no == 11)
	{
		$no="#000";
		}
	elseif($no == 10)
	{
		$no="#2aff00";
		}
	elseif($no == 9)
	{
		$no="#0000ff";
		}
	elseif($no == 8)
	{
		$no="#3ca3ff";
		}
	elseif($no == 7)
	{
		$no="#ea701f";
		}
	else
	{
		$no="blue";
		}

        return $no;
    }
     
}
 
