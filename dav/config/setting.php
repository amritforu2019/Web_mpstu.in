<?
if($HTTP_SERVER_VARS['HTTP_HOST']=="localhost")
{
	function pathchange($str)
	{
		$pathchange="";
		if(counter($str)==3)		
		$pathchange="";
		if(counter($str)==4)
		$pathchange="../";
		if(counter($str)==5)
		$pathchange="../../";
		if(counter($str)==6)
		$pathchange="../../../";
		if(counter($str)==7)
		$pathchange="../../../../";
		return $pathchange;
	}
}
else
{
	function pathchange($str)
	{
		$pathchange="";
		if(counter($str)==3)
		$pathchange="../";
		if(counter($str)==4)
		$pathchange="../../";
		if(counter($str)==5)
		$pathchange="../../../";
		if(counter($str)==6)
		$pathchange="../../../../";
		if(counter($str)==7)
		$pathchange="../../../../../";
		return $pathchange;
	}	
} 
//// function for string string
function change_string($str)
{
	$str=stripslashes(strtolower($str));
	$str=str_replace("-",'_', $str);
	$str=str_replace("--",'__', $str);	
	$str=str_replace(" ",'-', $str);
	$str=str_replace("&",'+', $str);
	$str=str_replace("?",'^', $str);	
	return $str;
}
function change_revstring($str)
{
	
	$str=str_replace("-",' ', $str);
	$str=str_replace("+",'&', $str);
	$str=str_replace("__",'--', $str);
	$str=str_replace("_",'-', $str);
	$str=str_replace("^",'?', $str);
	return stripslashes($str);
}

function counter($str)
{
	$th=explode("/",$str);
	$counter=count($th);
	return $counter;
}

function lastcaption($str)
{
	$th=explode("/",$str);
	$counter=count($th);
	if(preg_match('/page[0-9]+.html/', $str))
	{
	$cp=$th[$counter-3];
	//$cp1=explode(".", $cp);
	return $cp;
	}
	
	else
	{
	if(eregi('.html', $str))
	return $th[$counter-2];
	else
	return $th[$counter-3];
	//return print_r($th);
	}
}
function last_lastcaption($str)
{
	$th=explode("/",$str);
	$counter=count($th);
	if(preg_match('/page[0-9]+.html/', $str))
	{
	$cp=$th[$counter-4];
	//$cp1=explode(".", $cp);
	return $cp;
	}
	else
	{
		if(eregi('.html', $str))
		return $th[$counter-3];
		else
		return $th[$counter-4];
		//return print_r($th);
	}
}
function last_last_lastcaption($str)
{
	$th=explode("/",$str);
	$counter=count($th);
	if(preg_match('/page[0-9]+.html/', $str))
	{
	$cp=$th[$counter-5];
	//$cp1=explode(".", $cp);
	return $cp;
	}
	else
	{
		if(eregi('.html', $str))
		return $th[$counter-4];
		else
		return $th[$counter-5];
		//return print_r($th);
	}
}
function last_last_last_lastcaption($str)
{
	$th=explode("/",$str);
	$counter=count($th);
	if(preg_match('/page[0-9]+.html/', $str))
	{
	$cp=$th[$counter-6];
	//$cp1=explode(".", $cp);
	return $cp;
	}
	else
	{
		if(eregi('.html', $str))
		return $th[$counter-5];
		else
		return $th[$counter-6];
		//return print_r($th);
	}
}
function caption($str)
{
$th=explode("/",$str);
$counter=count($th);
if(preg_match('/page[0-9]+.html/', $str))
{
$cp=$th[$counter-2];
//$cp1=explode(".", $cp);
return $cp;
}

else if(preg_match('/html/', $str))
{
$cp=$th[$counter-1];
$cp1=explode(".", $cp);
return $cp1[0];
}
else
{
$cp=$th[$counter-2];
//$cp1=explode(".", $cp);
return $cp;
}
}

?>