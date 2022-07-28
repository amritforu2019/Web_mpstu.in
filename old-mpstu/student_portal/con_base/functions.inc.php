<?php
 
 session_start();

require_once"config.inc.php";
require_once"validate_eng.php";
$qry_global=mysqli_query($DB_LINK,"select * from tbl_setting  ")or die(mysqli_error($DB_LINK));
$global_fetch=mysqli_fetch_array($qry_global);
$SITE_NAME= stripslashes($global_fetch['site_name']);
$SITE_SORT_NAME= stripslashes($global_fetch['site_short_name']);
$SITE_URL= stripslashes($global_fetch['site_url']);
$SITE_NAME_SHORT= stripslashes($global_fetch['site_short_name']);
$EMAIL_ID=stripslashes($global_fetch['email']);
$phone=stripslashes($global_fetch['phone']);
$unit=stripslashes($global_fetch['unit']);
$ADDRESS=stripslashes($global_fetch['destag']);
$AUTHOR=stripslashes($global_fetch['metatag']);
$MAP=stripslashes($global_fetch['contenttag']);
$PHONE_NO=stripslashes($global_fetch['unit']);
$DESCRIPTION=stripslashes($global_fetch['destag']);
$F=stripslashes($global_fetch['f']);
$L=stripslashes($global_fetch['l']);
$T=stripslashes($global_fetch['t']);
$Y=stripslashes($global_fetch['y']);
$G=stripslashes($global_fetch['g']);
$flip=stripslashes($global_fetch['flip']);
$amaz=stripslashes($global_fetch['amaz']);
$snap=stripslashes($global_fetch['snap']);

$PORT=stripslashes($global_fetch['port']);
$HOST=stripslashes($global_fetch['host']);
$MPASS=stripslashes($global_fetch['mpass']);
$WEBMAIL=stripslashes($global_fetch['webmail']);

$msg_typ=stripslashes($global_fetch['msg_typ']);
$msg_contact=stripslashes($global_fetch['msg_contact']);
$msg_pass=stripslashes($global_fetch['msg_pass']);
$msg_sender_id=stripslashes($global_fetch['msg_sender_id']);

$SESSION_MIN = 10;
$current_year = date('Y');
 
 $ADMIN_HTML_TITLE=stripslashes($global_fetch['site_admin_title']);
// function for admin login validation
function master()
{
if(!isset($_SESSION['master']))
header("Location: index.php");
}

 function validate_admindav()
{
if(!isset($_SESSION['master_sess_mpstu']))
header("Location: index.php");
}

function validate_rolid_admin()
{
if($_SESSION['master_mpstu_rolid']!=3)
header("Location:home");
}

function validate_stddav()
{
if(!isset($_SESSION['sess_student_id']))
header("Location:../ index.php");
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


function date_dmy($date)
{
    if($date!='' && $date!='0000-00-00 00:00:00')
    {
        return date("j M Y h:i A", strtotime($date));
    }
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
function enc($val){

if($val!='')

	{

	$new_val=base64_encode(base64_encode(base64_encode(base64_encode($val))));

	return $new_val;

	}

}



function dec($val){

if($val!='')

	{

	$org_val=base64_decode(base64_decode(base64_decode(base64_decode($val))));

	return $org_val;

	}

}

function show_descr($id)

{

	$row=mysqli_fetch_array(mysqli_query($DB_LINK,"select content from content where id='$id'"));

	return stripcslashes($row['content']);

}
function show_title($id)

{

	$row=mysqli_fetch_array(mysqli_query($DB_LINK,"select title from content where id='$id'"));

	return $row['title'];

}

function show_img($id)

{

	$row=mysqli_fetch_array(mysqli_query($DB_LINK,"select img from content where id='$id'"));

	return $row['img'];

}

function data_cutter($data,$cut)

{

	if(strlen(stripslashes($data))>$cut)
	{
	$cutdata=ucfirst(substr(stripslashes($data),0,$cut))."..."; }
	else {
	$cutdata=stripslashes($data); 
	}
	return $cutdata;

}



function calculate_bg()

{

	$c=mysqli_query($DB_LINK,"select * from bg where status=1 limit 1")or die(mysqli_error($DB_LINK));

	$c1=mysqli_fetch_array($c);

	if($c1['type']==1)

	{

		// image

		$image=$c1['blocation'];

		$x="style=\"background:url(admin/banner/ori/$image) center 0px no-repeat fixed #517bad;\"";

		return $x;

	}

	else

	{

		// bg color

		$color=$c1['burl'];

		$x=" bgcolor=$color";

		return $x;

	}	

}




function date_dm($date)
{
  if($date!='' || $date!='0000-00-00 00:00:00')
  {


  return date("j M Y",strtotime($date));
  }
}


function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$currentPG=curPageName(); 
//session_destroy();

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function get_ip() {
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
	}
	
	function ip_store($ip)
	{
	$qry_ip=mysqli_query($DB_LINK,"select * from log_data where ip='$ip'")or die(mysqli_error($DB_LINK));
	$count_ip=mysqli_num_rows($qry_ip);
	if($count_ip>0)
	{
    	$global_ip=mysqli_fetch_array($qry_ip);
		$ip_open=$global_ip['count']+1;
   		mysqli_query($DB_LINK,"update log_data set count='$ip_open',dt='".date("Y-m-d")."' where ip='$ip'");
	}
	else
	{
	mysqli_query($DB_LINK,"insert into log_data set count='1',dt='".date("Y-m-d")."',ip='$ip'");
	}
	}
	
	
	
	function sms_sender($typ,$contact,$pass,$sender_id,$msg,$mob)
	{
	if($typ==1)
	{
		$text=$msg;
	    $data = "username=amitsoft&password=amit123@&sender=SVSSMS&to=".$mob."&message=".$text."&reqid=1&format={json|text}"; 
		$ch = curl_init('http://www.smssigma.com/API/WebSMS/Http/v1.0a/index1.php?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); 
		curl_close($ch);
	}
	if($typ==2)
	{
		$sendsms = str_replace(' ', '+',  $msg);
$url = "http://www.smssigma.com/API/WebSMS/Http/v1.0a/index1.php?username=amitsoft&password=amit123@&sender=SVSSMS&to=".$mob."&message=".$text."&reqid=1&format={json|text}";
        $ret = file($url);
        $send = explode(":",$ret[0]);
if ($send[0] == "ID") { echo "successnmessage ID: ". $send[1];       } 
		
	}
	}
	
	
	function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

function get_subject_title($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_course_subject  where id='$id'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->title;
}

function get_student_img($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_student  where id='$id'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->image;
}

function get_curr_session()
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_session  where status='1'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->title;
}

function get_course_branch($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_course  where title='$id'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->branch;
}
function get_student_data($roll,$session,$col)
{
    global  $DB_LINK;
    $sql="SELECT $col FROM  tbl_student  where  student_id='".$roll."'    ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->$col;
}
function get_child_count($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_menu  where  parent='".$id."'    ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_num_rows($result);
    return $data;
}

//SEO URL Friendly
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
function numberToRomanRepresentation($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
?>