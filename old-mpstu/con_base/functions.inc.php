<?php
include("db.config.inc.php");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "");
header("Cache-Control: no-store, must-revalidate");
header("Pragma: no-cache");
 
//// each client should remember their session id for EXACTLY 1 hour
session_start();
 
$qry_global=mysqli_query($DB_LINK,"select * from tbl_setting")or die(mysqli_error($DB_LINK));
$global_fetch=mysqli_fetch_array($qry_global);
$SITE_NAME= stripslashes($global_fetch['site_name']);
$SITE_SHORT_NAME= stripslashes($global_fetch['site_short_name']);
$SITE_URL= stripslashes($global_fetch['site_url']);
$EMAIL_ID=stripslashes($global_fetch['email']);
$MOBILE=stripslashes($global_fetch['phone']);
$ADDRESS=stripslashes($global_fetch['address']);
$F=stripslashes($global_fetch['f']);
$L=stripslashes($global_fetch['l']);
$T=stripslashes($global_fetch['t']);
$Y=stripslashes($global_fetch['y']);
$G=stripslashes($global_fetch['g']);
$WEBMAIL=stripslashes($global_fetch['webmail']);
$MPASS=stripslashes($global_fetch['mpass']);
$HOST=stripslashes($global_fetch['host']);
$PORT=stripslashes($global_fetch['port']);
$msg_contact=stripslashes($global_fetch['msg_contact']);
$msg_pass=stripslashes($global_fetch['msg_pass']);
$msg_sender_id=stripslashes($global_fetch['msg_sender_id']);
$msg_type=stripslashes($global_fetch['msg_typ']);
$SESSION_MIN = 10;
$current_year = date('Y'); 
$ADMIN_HTML_TITLE=stripslashes($global_fetch['site_admin_title']);

// function for admin login validation
function validate()
{
	if (time() - $_SESSION['CREATED'] > 1800) 
    {
   		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		header("location:sign-in");
		exit();
	}
}
function master_main()
{
	if(!isset($_SESSION['session_master']))
	{
		header("location:sign-in");
		exit();
	}
}
// function for user login validation
function validate_user()
{
	if (time() - $_SESSION['CREATED_USER'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_user()
{
	if(!isset($_SESSION['session_user']))
	{
		header("location:../login.html");
		exit();
	}
}
// function for staff login validation
function validate_staff()
{
	if (time() - $_SESSION['CREATED_STAFF'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:../login.html");
		exit();
	}
}
function master_staff()
{
	if(!isset($_SESSION['session_staff']))
	{
		//header("location:sign-in");
		//exit();
		header("location:../login.html");
		exit();
	}
}
// function for user login validation
function validate_branch()
{
	if (time() - $_SESSION['CREATED_BRANCH'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_branch()
{
	if(!isset($_SESSION['session_branch']))
	{
		header("location:sign-in");
		exit();
	}
}

function master_member()
{
if(!isset($_SESSION['session_user'])) {  header("location:../");  exit(); }
}

function master_recruiters()
{
 if(!isset($_SESSION['session_recruiters'])) { header("location:sign-in");  exit(); }
}


function update_kyc()
{
	if($_SESSION['user_uid']=='')
	{
		$_SESSION[ 'warn_msg' ] = "Kindly complete the profile";
		header("Location: ../profile_edit");
		exit;
	}
}

function update_bank()
{
	if($_SESSION['user_bank']=='')
	{
		$_SESSION['warn_msg'] = "Kindly complete the Bank Details";
		header("Location: ../bank_details_edit");
		exit;
	}
}

//SEO URL Friendly
function clean($string) 
{
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function clean_tag($string)
{
  return strip_tags($string);
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
	if($date!='' || $date!='0000-00-00 00:00:00')
  	{
  		$e=mysqli_fetch_array(mysqli_query("select convert_tz('$date','+00:00','+12:00')"));
  		$date= $e[0];
  		list($date_new,$time_new)=explode(" ",$date);
  		list($y,$m,$d)=explode("-",$date_new);
  		list($hr,$min,$sec)=explode(":",$time_new);
  		return date("j M Y h:i A", time());
  	}
}
function date_dmy_small($date)
{
  	if($date!='' && $date!='0000-00-00')
  	{
  		 return date("j M Y", strtotime($date));
  	}
}
// function to access description form content table
function enc($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode(base64_encode(base64_encode($val))));
		return $new_val;
	}
}
function dec($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode(base64_decode(base64_decode($val))));
		return $org_val;
	}
}
function enc_normal($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode($val));
		return $new_val;
	}
}
function dec_normal($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode($val));
		return $org_val;
	}
}
 
function show_content($id,$row_name,$DB_LINK)
{
	$grs=mysqli_query($DB_LINK,"select $row_name from tbl_category where id='$id'");
	$row=mysqli_fetch_array($grs);
	return $row[$row_name];
}
 
function data_cutter($data,$cut)
{
	if(strlen(stripslashes($data))>$cut)
	{
		$cutdata=ucfirst(substr(stripslashes($data),0,$cut)).".."; 
	}
	else 
	{
		$cutdata=stripslashes($data); 
	}
	return $cutdata;
}

function data_cutter_clean($data,$cut)
{
	if(strlen(stripslashes($data))>$cut)
	{
		$cutdata=ucfirst(substr(stripslashes($data),0,$cut)); 
	}
	else 
	{
		$cutdata=stripslashes($data); 
	}
	return $cutdata;
}
function date_dm($date)
{
  	if($date!='' && $date!='0000-00-00 00:00:00' && $date!='0000-00-00')
  	{
		return date("j M Y",strtotime($date));
  	}
}
function curPageName() 
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$currentPG=curPageName(); 
//session_destroy();
function get_client_ip() 
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function get_ip() 
{
	//Just get the headers if we can or else use the SERVER global
	if ( function_exists( 'apache_request_headers' ) ) 
	{
		$headers = apache_request_headers();
	} else 
	{
			$headers = $_SERVER;
	}
	//Get the forwarded IP if it exists
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) 			    {
		$the_ip = $headers['X-Forwarded-For'];
	} 
	elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) 
	{
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{
			
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	return $the_ip;
}
	
function ip_store($log_type,$log_id)
{ 
  	global $DB_LINK;
	$ip=get_ip();
	/*$qry_ip=mysqli_query($DB_LINK,"select * from log_data where ip='$ip'");
	$count_ip=mysqli_num_rows($qry_ip);
	if($count_ip>0)
	{
    	$global_ip=mysqli_fetch_array($qry_ip);
		$ip_open=$global_ip['count']+1;
   		mysqli_query($DB_LINK,"update log_data set count='$ip_open',dt='".date("Y-m-d")."' where ip='$ip'");
	}
	else
	{}*/
 // echo "insert into log_data set  ip='$ip',log_typ='$log_type',log_id='$log_id' "; exit;
	mysqli_query($DB_LINK, "insert into log_data set ip='$ip', log_typ='$log_type', log_id='$log_id'");
	
}
	
// Numbetr to words
class number_to_words
{
    public function __construct()
    {
             // initialization values
        $this->_hyphen      = '-';
        $this->_separator   = ', ';
        $this->_negative    = 'negative ';
        $this->_space       = ' ';
        $this->_conjunction = ' ';
        $this->_decimal     = 'point ';
        $this->_rupees      = ' rupees';
        $this->_only        = ' only';
            
        // call array of words
        $this->arr_words();           
    }
    protected function arr_words()
    {
        // array words
        $this->_dictionary   = array(
          "0"                   => 'zero',
          "1"                   => 'one',
          "2"                   => 'two',
          "3"                   => 'three',
          "4"                   => 'four',
          "5"                   => 'five',
          "6"                   => 'six',
          "7"                   => 'seven',
          "8"                   => 'eight',
          "9"                   => 'nine',
          "00"                  => 'zero zero',
          "01"                  => 'zero one',
          "02"                  => 'zero two',
          "03"                  => 'zero three',
          "04"                  => 'zero four',
          "05"                  => 'zero five',
          "06"                  => 'zero six',
          "07"                  => 'zero seven',
          "08"                  => 'zero eight',
          "09"                  => 'zero nine',
          "10"                  => 'ten',
          "11"                  => 'eleven',
          "12"                  => 'twelve',
          "13"                  => 'thirteen',
          "14"                  => 'fourteen',
          "15"                  => 'fifteen',
          "16"                  => 'sixteen',
          "17"                  => 'seventeen',
          "18"                  => 'eighteen',
          "19"                  => 'nineteen',
          "20"                  => 'twenty',
          "30"                  => 'thirty',
          "40"                  => 'fourty',
          "50"                  => 'fifty',
          "60"                  => 'sixty',
          "70"                  => 'seventy',
          "80"                  => 'eighty',
          "90"                  => 'ninety',
          "100"                 => 'hundred',
          "1000"                => 'thousand',
          "1000000"             => 'million',
          "1000000000"          => 'billion',
          "1000000000000"       => 'trillion',
          "1000000000000000"    => 'quadrillion',
          "1000000000000000000" => 'quintillion'
      );
   } // end function arr_words
                                
   /**  
     * @param $number
    * @param $first
    */
    public function convert_number_to_words($number, $first=true) 
    {
       //check number is number or not
       if (!is_numeric($number)) {
          return false;
       }
            
       if (($number >= 0 && intval($number )< 0) || intval($number) < 0 - PHP_INT_MAX) 
	   {
          // overflow
          trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
                 return false;
       }
        
       //check number whether is negative or not
       //if it is negative then call the function with positive number
       if ($number < 0) 
	   {
          return $this->_negative . $this->convert_number_to_words(abs($number));
       }
       //assign null value to variables
       $string = $fraction = null;
            
       // check Decimal place in number
       if (strpos($number, '.') !== false) 
	   {
           list($number, $fraction) = explode('.', $number);
       }
           
       switch (true) 
       {
           case $number < 21:
                    
             $string = $this->_dictionary["$number"];
             break;
                    
           case $number < 100:
                     
              $tens   = (intval($number / 10)) * 10;
              $units  = $number % 10;
              $string = $this->_dictionary["$tens"];
                   
              if ($units) 
			  {
                 $string .= $this->_space . $this->_dictionary["$units"];
              }
              break;
                    
           case $number < 1000:
                    
               $hundreds  = intval($number / 100);
               $remainder = $number % 100;
$string = $this->_dictionary["$hundreds"] . ' ' .$this->_dictionary["100"];
                    
               if ($remainder) 
			   {
                        $string .= $this->_conjunction . $this->convert_number_to_words($remainder, false);
               }
               break;
                    
           default:
                   
              $baseUnit = pow(1000, floor(log($number, 1000)));                
              $numBaseUnits = intval($number / $baseUnit);
              $remainder = $number % $baseUnit;
              $string = $this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];
                    
              if ($remainder) 
			  {
                 $string .= $this->_conjunction;
                 $string .= $this->convert_number_to_words($remainder, false);
              }
              break;
      }
    
     // start - decimal place
     if (null !== $fraction && is_numeric($fraction)) 
	 {
     	$string .= $this->_rupees . $this->_conjunction . $this->_decimal;
        		
        /**
         * if decimal comes 10, 20, 30 ..upto 90. 0 is removing from number.
         * suppose you were not specify decimal place with 2 digits. like 100.5, 3.9
         * so we need CONCAT 0 with number
         * it would come ten twenty..
         */
       if ($fraction < 10) $fraction = $fraction . '0';
        		   
          $string .= $this->convert_number_to_words($fraction, false);
              //add only
          $string .= $this->_only;
       }
       // end  - decimal place
            
       //first time only this condition would execute.
       //without decimal place.
        if ($fraction === null && $first == true) 
		{
            $string .= $this->_rupees . $this->_only;
        }
            
      return $string;
            
   } // end function convert_number_to_words
        
}
//Date ago time
function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        echo "Just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1)
		{
            echo "One minute ago";
        }
        else
		{
            echo "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24)
	{
        if($hours==1){
            echo "An hour ago";
        }else{
            echo "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7)
	{
        if($days==1){
            echo "Yesterday";
        }else{
            echo "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
	{
        if($weeks==1){
            echo "A week ago";
        }else{
            echo "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12)
	{
        if($months==1){
            echo "A month ago";
        }else{
            echo "$months months ago";
        }
    }
    //Years
    else
	{
        if($years==1)
		{
            echo "One year ago";
        }else{
            echo "$years years ago";
        }
    }
} 
function my_data($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from staff where m_id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
  
function my_data_id($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from tbl_customer where id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
function rec($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select m_id,r_id,p_id from staff where p_id='$m_id' ");
  
	if(mysqli_num_rows($qry)>0)
    {
    	$data_get=mysqli_fetch_array($qry);
        return $data_get['m_id'];
    }
    else
        return 'No data';
}
function rec_anyleg($m_id,$place)
{
	global $DB_LINK;
	$placer_id= $m_id; 
  	$qry=mysqli_query($DB_LINK,"select m_id from tbl_staff where p_id='$m_id' and placing='".$place."' ");  
  	if(mysqli_num_rows($qry)>0)
    {          
    	$data_get=mysqli_fetch_array($qry);
        rec_anyleg($DB_LINK,$data_get['m_id'],$place);  
    }
    else 
    {  
        $_SESSION['placer_id']=$placer_id;
        return $placer_id;   
    }            
}
global  $placer_id_all, $tempTree,$exclude, $depth; 
function rec_anyleg_all($m_id,$place)
{
	global $DB_LINK;
	$tempTree='';
  	$depth='0';
  	$placer_id= $m_id; 
  	$placer_id_all='';
  	$qry=mysqli_query($DB_LINK,"select m_id from tbl_staff where p_id='$m_id'     and placing='$place'");
	 
	 
	
  	if(mysqli_num_rows($qry)>0)
    {          
		$data_get=mysqli_fetch_array($qry);
		$placer_id=$data_get['m_id'];
		$placer_id_all .= $data_get['m_id'].'~';
		$placer_id_all.=totaldownlinemembers($DB_LINK,$placer_id); 
	  	return $placer_id_all;		  
    }
    else 
	{  
           
        return $placer_id_all;   
    }            
}
function totaldownlinemembers($DB_LINK,$a)
{  
	//error_reporting(0);
	
	// Refer to the global array defined at the top of this script
	global $DB_LINK;
	$depth=0;
	$tempTree='';
	$child_query = mysqli_query($DB_LINK,"SELECT m_id, p_id FROM tbl_staff WHERE p_id='".$a."' ");
	while ( $child = mysqli_fetch_array($child_query) )
	{
		if ( $child['m_id'] != $child['p_id'] )
		{
			for ( $c=0;$c<$depth;$c++ ) // Indent over so that there is distinction between levels
			{ $tempTree .= ""; }
			$tempTree .= $child['m_id'].'~';
			$depth++;		
			$tempTree .= totaldownlinemembers($DB_LINK,$child['m_id']);	 
		} 
	} 
	return $tempTree;
}
function mem_status($m_id)
{
	global $DB_LINK;
	$c_query = mysqli_query($DB_LINK,"SELECT status FROM staff WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	return $c_data['status'];
	
}
function sum_of_payout($m_id)
{ 
	global $DB_LINK;
	$paid=0;
	$c_query = mysqli_query($DB_LINK,"SELECT sum(lev) as paid FROM tbl_target WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	if($c_data['paid']!='')
	{ 
		$paid=$c_data['paid'];
	}
	return $paid;
	
}
function yearCalculator($dt, $y){
    if(!empty($dt)){
        $dt=strtotime($dt);
		$end = strtotime('+'. $y .'year', $dt);
		$year=date('Y-m-d',$end);
		//$year=date('d M Y',$end);
		return $year;
    }else{
        return 0;
    }
}
function simpleInterest($p, $r, $t){
	
	$si = ($p*$r*$t)/100;
	
	$amt=$p+$si;
	
	return $amt;
}
function refresh_wallet($userid, $byledger)
{
	global $DB_LINK; $inco=0;$expe=0;$final_bal=0;
	//echo "SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' order by id desc";exit;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' and ttyp!='Wallet Credit By FD' order by id desc") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  } 
 	}  
 	return $final_bal=$inco-$expe;
}
function recharge_wallet($userid)
{
	global $DB_LINK;$inco=0;$expe=0;$final_bal=0;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_rec` where member='".$userid."'   ") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  } 
 	}  
   	$recharge_bal=$inco-$expe;
	return round($recharge_bal,2);
}
function insert_ledger($to, $from, $typ, $amt, $prt, $ttyp, $description='', $byledger)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_add` set `to_mem`='".$to."', `from_mem`='".$from."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."', description='$description', byledger='$byledger'";
	mysqli_query($DB_LINK,$ins);
}
function insert_ledger_rec($to, $typ, $amt, $prt, $ttyp)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_rec` set `member`='".$to."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."'";
	mysqli_query($DB_LINK,$ins);
}
function recharge_api($operatorcode, $number, $amount)
{
	global $p2a_cid, $p2a_apitoken, $cnumber;
	function httpGetWithErros($url)
	{
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
			 
		if($output === false)
		{
			echo "Error Number:".curl_errno($ch)."<br>";
			echo "Error String:".curl_error($ch);
		}
		curl_close($ch);
		return $output;
	}
		
	$provider_id = $operatorcode; 
	$number = $number;
	$amount = $amount;
	$client_id = $p2a_cid; //(your system unique id. that you can check in pay2all);
	//end of data collection from form
	//check whether user enter some data or not
	if(empty($provider_id))
	{
		echo"select operator";
		exit;
	}
	if(empty($number))
	{
		echo"enter mobile number";
		exit;
	}
	if(empty($amount))
	{
		echo"enter amount";
		exit;
	}
	$api_token =$p2a_apitoken; // api_token token will in (https://www.pay2all.in/developers/recharge-api-doc) 
			
	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id";
	
	if($rowm['rec_type']=='DTH Recharge')
 	{
	 	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Telephone Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}
	if($rowm['rec_type']=='DataCard Recharge')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Electricity Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}	
	$response = httpGetWithErros($url);
			
	//$response='{"payid":"8952252","operator_ref":"","status":"success","message":"Transaction Submitted Successfully Done, Check Status in Transaction Report, Thanks","txstatus_desc":"Pending"}';
	$result='['.$response.']';
		 
	$status='';
	$txnid='';
	$ref_id='';
	$r_status='';
	$jsonRS = json_decode ($result,true);
	return $jsonRS;
}

function sms_sender($contact, $sms_text)
{ 
	global $msg_contact, $msg_pass, $msg_sender_id;
	
	$data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$contact."&msg=".$sms_text."";
	 
	//echo $data;exit;
	
 	// Send the POST request with cURL
	$ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); //This is the result from Textlocal
	curl_close($ch);
	return $result;
}
function mail_sender($subject, $mail_body, $email, $name) {
    global $HOST, $WEBMAIL, $MPASS, $PORT, $EMAIL_ID, $SITE_NAME;
    include('assets/links/mailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $HOST;                       // Specify main and backup server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $WEBMAIL;                   // SMTP username
    $mail->Password = $MPASS;               // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
    $mail->Port = $PORT;                                    //Set the SMTP port number - 587 for authenticated TLS
    $mail->setFrom($WEBMAIL, $SITE_NAME);     //Set who the message is to be sent from
//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address

    $mail->addAddress($EMAIL_ID, $SITE_NAME);
    $mail->addCC($EMAIL_ID2, $SITE_NAME);
    $mail->addBCC($email, $name);


    // Name is optional
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);              //$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name                    // Set email format to HTML 
    $mail->Subject = $subject;
    $mail->Body = $mail_body;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic pl}ain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

    if ($mail->send()) {
       //  echo 'Message Sent Mailer';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
// echo 'Message not Sent Successfully';
 //echo 'Mailer Error: ' . $mail->ErrorInfo;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
        $headers .= 'From: ' . $SITE_NAME . '<' . $EMAIL_ID . '>' . "\r\n";
//$headers .= 'Cc: info@kashivoyagestours.com' . "\r\n";
        mail($_POST['email'], $subject, $mail_body, $headers);
    }

   
}
/*function msg($type, $module)
{
    switch($type)
    {
        case 'ok': $pop = $module." has been created successfully."; $color = 'success';
        break;
        case 'err': $pop = "Oops ! Something went wrong."; $color = 'warning';
        break;
        case 'invalid': $pop = "Please fill all fields";
        break;
        case 'update': $pop = $module." has been updated successfully.";$color = 'success';
        break;
        case 'exists': $pop = $module." already exists.";$color = 'warning';
        break;
        case 'del': $pop = $module." has been deleted successfully"; $color = 'success';
        break;
    }
    $result = array($pop, $color);
    return $result;
}*/

function alert_msg($type, $module)
{
    switch($type)
    {
        case 'success': $toastr = 'Successfully !!'; $sweetalert = 'success';
        break;
        case 'error': $toastr = 'Error !!'; $sweetalert = 'error';
        break;
        case 'warning': $toastr = 'Warning !!'; $sweetalert = 'warning';
        break;
        case 'info': $toastr = 'Welcome !!'; $sweetalert = 'info';
        break;
    }
    $result = array($toastr, $sweetalert);
    return $result;
}
function logEvent($msg, $message) 
{
	global $DB_LINK;
    if ($message != '') 
	{
		$delim = "\t";   // set delim, eg tab 
		$res = mysqli_query($DB_LINK,$msg); 
		while ($row = mysqli_fetch_row($res)) { 
    		$scoredata = $row;
		} 
        // Add a timestamp to the start of the $message
        //$message = date("Y/m/d H:i:s").': '.$message."\r\n";
		$message = date("Y/m/d H:i:s").': '.$message."".PHP_EOL;
        //$fp = fopen('appLog-'.date('d-m-Y').'.txt', 'a');
		$fp = fopen('logs/appLog-'.date('d-m-Y').'.txt', 'a');
        fwrite($fp, $message);
		fwrite($fp, join($delim, $scoredata) . "\r\n"); 
        fclose($fp);
    }
}
/*
function truncate_number( $number, $precision = 2) {
    // Zero causes issues, and no need to truncate
    if ( 0 == (int)$number ) {
        return $number;
    }
    // Are we negative?
    $negative = $number / abs($number);
    // Cast the number to a positive to solve rounding
    $number = abs($number);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}*/

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
    echo $sql="SELECT * FROM  tbl_session  where status='1'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->title;
}

function get_course_branch($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_course  where title='$id'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_assoc($result);
    return   $data['branch'];

}
function get_student_data($roll,$session,$col)
{
    global  $DB_LINK;
    $sql="SELECT $col FROM  tbl_student  where  student_id='".$roll."'  and session='$session'  ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_fetch_object($result);
    return $data->$col;
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

function get_child_count($id)
{
    global  $DB_LINK;
    $sql="SELECT * FROM  tbl_menu  where  parent='".$id."'    ";
    $result =mysqli_query($DB_LINK,$sql);
    $data =mysqli_num_rows($result);
    return $data;
}
?>