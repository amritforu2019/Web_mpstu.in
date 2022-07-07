<?php
//error_reporting(0);
//ini_set('register_globals','on');

//session_start();

require_once "config.inc.php";

$qry_global=mysql_query("select * from global_setting ")or die(mysql_error());

$global_fetch=mysql_fetch_array($qry_global);

$SITE_NAME= stripslashes($global_fetch['site_name']);

$SITE_URL= stripslashes($global_fetch['site_url']); 

$EMAIL_ID=stripslashes($global_fetch['email']);

$PHONE_NO=stripslashes($global_fetch['phone']);

$address=stripslashes($global_fetch['address']);

$site_short_name =stripslashes($global_fetch['site_short_name']);


$F=stripslashes($global_fetch['f']);







$L=stripslashes($global_fetch['l']);







$T=stripslashes($global_fetch['t']);







$Y=stripslashes($global_fetch['y']);







$G=stripslashes($global_fetch['g']);

$SESSION_MIN = 10;

$current_year = date('Y');

//require_once("setting.php");

$SITE_TITLE=stripslashes($global_fetch['title']);

$ADMIN_HTML_TITLE=stripslashes($global_fetch['site_admin_title']);





function dtdif($pageid)

{

$qry=mysql_query("select * from content where id='$pageid'")or die(mysql_error());

$rowsss=mysql_fetch_array($qry);

$then = date("Y-m-d",strtotime($rowsss['last_edit']));

$then = strtotime($then);

$now = time();

$difference = $now - $then;

$days = floor($difference / (60*60*24) );

	return $days ;

}

// function for admin login validation 

function validate_admin()

{

if(!isset($_SESSION['sess_admin_id']))

header("Location:index.php?back=$_SERVER[REQUEST_URI]");

}





function validate_pandit()

{

if(!isset($_SESSION['did']))

header("Location:index.php?back=$_SERVER[REQUEST_URI]");

}

// function for filter the string

function normal_filter($val)

{

return ucfirst(stripslashes($val));

}



function strip_filter($val, $size)

{

return substr(stripslashes(strip_tags($val)),0,$size);

}



function caps_filter($val)

{

return strtoupper(stripslashes($val));

}



function normalall_filter($val)

{

return ucwords(stripslashes($val));

}



// function for page handling

function get_qry_str($over_write_key = array(), $over_write_value= array())

{

	global $_GET;

	$m = $_GET;

	if(is_array($over_write_key)){

		$i=0;

		foreach($over_write_key as $key){

			$m[$key] = $over_write_value[$i];

			$i++;

		}

	}else{

		$m[$over_write_key] = $over_write_value;

	}

	$qry_str = qry_str($m);

	return $qry_str;

} 



function qry_str($arr, $skip = '')

{

	$s = "?";

	$i = 0;

	foreach($arr as $key => $value) {

		if ($key != $skip) {

			if(is_array($value)){

				foreach($value as $value2){

					if ($i == 0) {

						$s .= "$key%5B%5D=$value2";

					$i = 1;

					} else {

						$s .= "&$key%5B%5D=$value2";

					} 

				}		

			}else{

				if ($i == 0) {

					$s .= "$key=$value";

					$i = 1;

				} else {

					$s .= "&$key=$value";

				} 

			}

		} 

	} 

	return $s;

} 



// function to include http 

function format_url($url)

{

	if(!preg_match('/http:\/\//',$url))

	{

		$url="http://".$url;

	}

	return $url;

}

// function to access description form content table

function show_descr($id)

{

	$row=mysql_fetch_array(mysql_query("select descr from content where id='$id'"));

	return $row['descr'];

}

function enc($val){

if($val!='')

	{

	$new_val=base64_encode(base64_encode($val));

	return $new_val;

	}

}



function dec($val){

if($val!='')

	{

	$org_val=base64_decode(base64_decode($val));

	return $org_val;

	}

}



function date_dmy($date)

{

  if($date!='' || $date!='0000-00-00 00:00:00')

  {

  $e=mysql_fetch_array(mysql_query("select convert_tz('$date','+00:00','+11:30')"));

  $date= $e[0];

  list($date_new,$time_new)=explode(" ",$date);

  list($y,$m,$d)=explode("-",$date_new);

  list($hr,$min,$sec)=explode(":",$time_new);

  return date("j M Y h:i A",mktime($hr,$min,$sec,$m,$d,$y));

  }

}



function dmy_date($date)

{

  if($date!='' || $date!='0000-00-00 00:00:00')

  {

  $e=mysql_fetch_array(mysql_query("select convert_tz('$date','+00:00','+11:30')"));

  $date= $e[0];

  list($date_new,$time_new)=explode(" ",$date);

  list($y,$m,$d)=explode("-",$date_new);

  return date("j M Y ",mktime(0,0,0,$m,$d,$y));

  }

}



function pass($pass)



{



$pass=trim($pass);



global $msg;



$msg=1;



if($pass=="")



$msg="Password Cannot be blank";



else if(strlen($pass)<6)



$msg="Password should be of minimum 6 characters";



else if(strlen($pass)>20)



$msg="Password should not more than 20 characters";



else



{



if (!preg_match('`[a-z]`',$pass))



$msg="password must have one character";



if (!preg_match('`[0-9]`',$pass))



$msg="password must have one integer";



 



}



if($msg!=1)



return FALSE; 



else 



return TRUE;



}

function checkEmail($email) 



{



	if (empty($email))

	{

		return FALSE;

	}

$pattern="^[a-z]+[a-zA-Z0-9_.-]*@[a-z]+[a-zA-Z0-9_.-]*\.[a-z]{2,4}$";		

   if(eregi($pattern, $email)) 

  {

  return TRUE;

  }else

   {

   return FALSE;

   }

   }

   function dformat($dob)

 	{

 	$dob=trim($dob);

	global $datemsg ;

	list($date1,$month,$year)=explode("/",$dob);

	$arr1=array(4,6,9,11);

/* if ($date1<32)

{

	if ($month<13)

	{

		if (in_array($month,$arr1) && $date1==31 )

			$datemsg="Apr,Jun,Sep,Nov do not have 31 days.";

		else

		{

			if ($month=='2' && $date1<30)

			{

				if ($year%4!=0 && $date1==29)

					$datemsg="Feb do not have 29 days in a non leap year.";				

			}

			else 

				$datemsg="Feb do not have 30 days .";			

		}		

	}

} */

}

function date_dm($date)



{



  if($date!='' || $date!='0000-00-00 00:00:00')



  {



  $e=mysql_fetch_array(mysql_query("select convert_tz('$date','+00:00','+00:00')"));



  $date= $e[0];



  list($date_new,$time_new)=explode(" ",$date);



  list($y,$m,$d)=explode("-",$date_new);



  list($hr,$min,$sec)=explode(":",$time_new);



  return date("j M Y",mktime(0,0,0,$m,$d,$y));



  }



}







?>