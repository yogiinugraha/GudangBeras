<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Bulan {
    var $instan;
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
    }
    function bulan_angka($bulan){
	if($bulan == 'Januari')
	{
		$bulan=1;
		}
	elseif($bulan == 'Februari')
	{
		$bulan=2;
		}
	elseif($bulan == 'Maret')
	{
		$bulan=3;
		}
	elseif($bulan == 'April')
	{
		$bulan=4;
		}
	elseif($bulan == 'Mei')
	{
		$bulan=5;
		}
	elseif($bulan == 'Juni')
	{
		$bulan=6;
		}
	elseif($bulan == 'Juli')
	{
		$bulan=7;
		}
	elseif($bulan == 'Agustus')
	{
		$bulan=8;
		}
	elseif($bulan == 'September')
	{
		$bulan=9;
		}
	elseif($bulan == 'Oktober')
	{
		$bulan=10;
		}
	elseif($bulan == 'November')
	{
		$bulan=11;
		}
	elseif($bulan == 'Desember')
	{
		$bulan=12;
		}

        return $bulan;
    }
     
    function angka_bulan($bulan){
	if($bulan == 1 )
	{
		$bulan='Januari';
		}
	elseif($bulan == 2)
	{
		$bulan='Februari';
		}
	elseif($bulan == 3)
	{
		$bulan='Maret';
		}
	elseif($bulan == 4)
	{
		$bulan='April';
		}
	elseif($bulan == 5)
	{
		$bulan='Mei';
		}
	elseif($bulan == 6)
	{
		$bulan='Juni';
		}
	elseif($bulan == 7)
	{
		$bulan='Juli';
		}
	elseif($bulan == 8)
	{
		$bulan='Agustus';
		}
	elseif($bulan == 9)
	{
		$bulan='September';
		}
	elseif($bulan == 10)
	{
		$bulan='Oktober';
		}
	elseif($bulan == 11)
	{
		$bulan='November';
		}
	elseif($bulan == 12)
	{
		$bulan='Desember';
		}

        return $bulan;
    }
     
}
 
