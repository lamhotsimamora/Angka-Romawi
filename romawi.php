<?php 

/*
* Written by Lamhot Simamora
* lamhotsimamora36@gmail.com
* 26 Mei 2019
*/
if (isset($_POST['_angka']))
{
	$angka = $_POST['_angka'];

	exit(konversi($angka));
}

function konversi($angka=null){

	if (is_null($angka) || $angka==='')
	{
		exit("Masukkan angka !");
	}

	$angka = (int) ($angka);

	if ($angka>=5000)
	{
		exit("Angka maximum 5000 !");
	}

	$romawi = array(
		1=>'I',
		4=>'IV',
		5=>'V',
		9=>'IX',
		10=>'X',
		40=>'XL',
		50=>'L',
		60=>'LX',
		70=>'LXX',
		80=>'LXXX',
		90=>'XC',
		100=>'C',
		400=>'CD',
		500=>'D',
		600=>'DC',
		700=>'DCC',
		800=>'DCCC',
		900=>'CM',
		1000=>'M'
	);


	// check angka apakah ratusan ? ribuan ? 
	$result = '';
	if ($angka>0)
	{
		if ($angka<5)
		{
			for ($i = 0; $i < $angka; $i++) {
				if ($angka==4)
				{
					$result = $romawi[4];
				}else{
					$result .= $romawi[1];
				}
			}
		}
		else if ($angka==5)
		{
			$result = $romawi[5];
		}
		else if ($angka< 10)
		{
			$start = '';
			if ($angka==9)
			{
				$result .= $romawi[9];
			}else{
				for ($i = 5; $i < $angka; $i++) {
					$start .= $romawi[1];
				}
				$result = $romawi[5].$start;
			}
		}
		else if ($angka==10)
		{
			$result = $romawi[10];
		}
		else
		{
			$satuan = check($angka);

			// puluhan
			if ($satuan==2)
			{
				$first = substr($angka, 0,1);
				$first = (int) ($first);

				$last = substr($angka, 1,strlen($angka));
				$last = (int) $last;

				if ($angka==90)
				{
					$result = $romawi[90];
				}
				else if ($angka>=40 && $angka <= 49)
				{
					if ($angka==40)
					{
						$result = $romawi[40];
					}else{
						$result = $romawi[40].konversi($last);
					}
				}
				else if ($angka>=50 && $angka <= 59)
				{
					if ($angka==50)
					{
						$result = $romawi[50];
					}else{
						$result = $romawi[50].konversi($last);
					}
				}
				else if ($angka>=60 && $angka <= 69)
				{
					if ($angka==60)
					{
						$result = $romawi[60];
					}else{
						$last = konversi($last);

						$result = $romawi[60].$last;
					}
				}
				else if ($angka>=70 && $angka <= 79)
				{
					if ($angka==70)
					{
						$result = $romawi[70];
					}else{
						$last = konversi($last);

						$result = $romawi[70].$last;
					}
				}
				else if ($angka>=80 && $angka <= 89)
				{
					if ($angka==80)
					{
						$result = $romawi[80];
					}else{
						$last = konversi($last);

						$result = $romawi[80].$last;
					}
				}
				else if ($angka>=90 && $angka <= 99)
				{
					if ($angka==90)
					{
						$result = $romawi[90];
					}else{
						
						$result = $romawi[90].konversi($last);
					}
				}
				else
				{
					$start = '';
					for ($i = 0; $i < $first  ; $i++) {
						$start .= $romawi[10];
					}
					$result = $start. konversi($last);
				}
			}
			// ratusan
			else if ($satuan==3)
			{
				$first = substr($angka, 0,1);
				$first = (int) $first;

				$last = substr($angka, 1,strlen($angka)+1);
				$last = (int) $last;

				if ($angka==100)
				{
					$result = $romawi[100];
				}
				else if ($angka>=101 && $angka <= 399)
				{
					$get_first = '';
					for ($i = 0; $i <= $first-1 ; $i++) {
						$get_first .= $romawi[100]; 
					}
					
					$result = $get_first.konversi($last);
				}
				else if ($angka==400)
				{
					$result = $romawi[400];
				}
				else if ($angka>=401 && $angka<= 499)
				{
					$result = $romawi[400].konversi($last);
				}
				else if ($angka==500)
				{
					$result = $romawi[500];
				}
				else if ($angka>=501 && $angka <= 599)
				{
					$result = $romawi[500].konversi($last);
				}
				else if ($angka==600)
				{
					$result = $romawi[600];
				}
				else if ($angka>=601 && $angka <= 699)
				{
					$result = $romawi[600].konversi($last);
				}
				else if ($angka==700)
				{
					$result = $romawi[700];
				}
				else if ($angka>=701 && $angka <= 799)
				{
					$result = $romawi[700].konversi($last);
				}
				else if ($angka==800)
				{
					$result = $romawi[800];
				}
				else if ($angka>=801 && $angka <= 899)
				{
					$result = $romawi[800].konversi($last);
				}
				else if ($angka==900)
				{
					$result = $romawi[900];
				}
				else if ($angka>=901 && $angka <= 999)
				{
					$result = $romawi[900].konversi($last);
				}	
			}
			// ribuan
			else if ($satuan==4)
			{
				$first = substr($angka, 0,1);
				$first = (int) $first;

				$last = substr($angka, 1,strlen($angka)+2);
				$last = (int) $last;

				if ($angka==1000)
				{
					$result = $romawi[1000];
				}
				else if ($angka>=1001 && $angka <= 4999)
				{
					$get_first = '';
					for ($i = 1; $i <= $first ; $i++) {
						$get_first .= $romawi[1000]; 
					}
					$last   = konversi($last);
					
					$result = $get_first.$last;
				}
			}
			
		}
	}
	return $result;
}

function check($angka){
	if (strlen($angka)==1)
	{
		return 1;
	}
	else if (strlen($angka)==2)
	{
		return 2;
	}
	else if (strlen($angka)==3)
	{
		return 3;
	}
	else if (strlen($angka)==4)
	{
		return 4;
	}
}