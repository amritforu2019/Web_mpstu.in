<?php
function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') 
{
	global $DB_LINK;
	
	if(isset($_REQUEST['parent']))
	{
	$parent=$_REQUEST['parent'];
	}
  
    if (!is_array($user_tree_array))
    $user_tree_array = array();
	
	
 
  		$sql = "SELECT id, title, parent_id FROM tbl_category WHERE 1 AND id = $parent ORDER BY title ASC";
  		$query = mysqli_query($DB_LINK,$sql);
  		if (mysqli_num_rows($query) > 0) 
		{
    		while ($row = mysqli_fetch_object($query)) 
			{
      			$user_tree_array[] = array("id" => $row->id, "title" => $spacing . $row->title);
      			$user_tree_array = fetchCategoryTree2($row->id, $spacing . '&nbsp;&nbsp;&nbsp;', $user_tree_array);
    		}
  	    }
    return $user_tree_array;
}



function fetchCategoryTree2($parent = 0, $spacing = '', $user_tree_array = '') 
{
	global $DB_LINK;
	
	
  
    if (!is_array($user_tree_array))
    $user_tree_array = array();
	
	
 
  		$sql = "SELECT id, title, parent_id FROM tbl_category WHERE 1 AND parent_id = $parent ORDER BY title ASC";
  		$query = mysqli_query($DB_LINK,$sql);
  		if (mysqli_num_rows($query) > 0) 
		{
    		while ($row = mysqli_fetch_object($query)) 
			{
      			$user_tree_array[] = array("id" => $row->id, "title" => $spacing . $row->title);
      			$user_tree_array = fetchCategoryTree2($row->id, $spacing . '&nbsp;&nbsp;&nbsp;', $user_tree_array);
    		}
  	    }
    return $user_tree_array;
}


function fetchCategoryTree_noleg($parent) 
{
	global $DB_LINK;
	
	
  
    if (!is_array($user_tree_array))
    $user_tree_array = array();
	
	
 
  		$sql = "SELECT id, title, parent_id FROM tbl_category WHERE  id = $parent  ";
  		$query = mysqli_query($DB_LINK,$sql);
  		if (mysqli_num_rows($query) > 0) 
		{
    		while ($row = mysqli_fetch_object($query)) 
			{
      			$user_tree_array[] = array("id" => $row->id, "title" => $spacing . $row->title);
      			 
    		}
  	    }
    return $user_tree_array;
}
?>