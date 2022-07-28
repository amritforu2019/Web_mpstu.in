<?php ob_start(); include('../con_base/functions.inc.php');

//validate();  
master_main(); 
 

$mainid=100001; 
//$mainid=$_SESSION['staff_m_id'];
 if(isset($_GET['p_id'])) { $mainid=$_GET['p_id']; }
   
    
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Organization Tree</title>
  <!-- Bootstrap Core Css -->
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <link rel="stylesheet" href="assets/trees/css/jquery.orgchart.min.css">
  <link rel="stylesheet" href="assets/trees/css/style.css">
  <style type="text/css">
    .orgchart { background: #fff; }
    .orgchart .node.matched { background-color: rgba(238, 217, 54, 0.5); }
    #edit-panel {
      text-align: center;
      position: relative;
      left: 10px;
      width: calc(100% - 40px);
      border-radius: 4px;
      float: left;
      margin-top: 10px;
      padding: 10px;
      color: #fff;
      background-color: #449d44;
    }
    #edit-panel * { font-size: 20px; }
    .orgchart .middle-level .title { background-color: #006699; }
    .orgchart .middle-level .content { border-color: #006699; }
    .orgchart .product-dept .title { background-color: #009933; }
    .orgchart .product-dept .content { border-color: #009933; }
    .orgchart .rd-dept .title { background-color: #993366; }
    .orgchart .rd-dept .content { border-color: #993366; }
    .orgchart .pipeline1 .title { background-color: #996633; }
    .orgchart .pipeline1 .content { border-color: #996633; }
    .orgchart .frontend1 .title { background-color: #cc0066; }
    .orgchart .frontend1 .content { border-color: #cc0066; }
  </style>
</head>
<body>
 

<div class="h2 text-center"  >Tree View</div>
  <div id="chart-container"></div>
  <div id="edit-panel" class="view-state">
  
<div class="row">
<div class="col-5 col-xl-5 col-md-5 col-sm-12 "><input type="text" id="key-word" class="form-control " placeholder="Quick Filter By Member ID / Name ">
</div>
<div class="col-2 col-xl-2 col-md-2 col-sm-12 text-left ">  <button type="button" class="btn btn-warning" id="btn-filter-node"><i class="fa fa-lg fa-search "></i></button>
    <button type="button" id="btn-cancel" class="btn btn-primary"><i class="fa fa-lg fa-refresh fa-spin"></i></button>
     <button type="button" class="btn btn-danger" onclick="location.href='index.php'" id="btn-cancel1"><i class="fa fa-times fa-lg"></i></button>
</div>
</div>

    
  
  </div>
   

  <script type="text/javascript" src="assets/trees/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/trees/js/jquery.orgchart.min.js"></script>
  <script type="text/javascript">
    function filterNodes(keyWord) {
    if(!keyWord.length) {
      window.alert('Please type key word firstly.');
      return;
    } else {
      var $chart = $('.orgchart');
      // disalbe the expand/collapse feture
      $chart.addClass('noncollapsable');
      // distinguish the matched nodes and the unmatched nodes according to the given key word
      $chart.find('.node').filter(function(index, node) {
          return $(node).text().toLowerCase().indexOf(keyWord) > -1;
        }).addClass('matched')
        .closest('table').parents('table').find('tr:first').find('.node').addClass('retained');
      // hide the unmatched nodes
      $chart.find('.matched,.retained').each(function(index, node) {
        $(node).removeClass('slide-up')
          .closest('.nodes').removeClass('hidden')
          .siblings('.lines').removeClass('hidden');
        var $unmatched = $(node).closest('table').parent().siblings().find('.node:first:not(.matched,.retained)')
          .closest('table').parent().addClass('hidden');
        $unmatched.parent().prev().children().slice(1, $unmatched.length * 2 + 1).addClass('hidden');
      });
      // hide the redundant descendant nodes of the matched nodes
      $chart.find('.matched').each(function(index, node) {
        if (!$(node).closest('tr').siblings(':last').find('.matched').length) {
          $(node).closest('tr').siblings().addClass('hidden');
        }
      });
    }
  }

  function clearFilterResult() {
    $('.orgchart').removeClass('noncollapsable')
      .find('.node').removeClass('matched retained')
      .end().find('.hidden').removeClass('hidden')
      .end().find('.slide-up, .slide-left, .slide-right').removeClass('slide-up slide-right slide-left');
  }

  $(function() {

    var datascource = {
      <?php $qry=mysqli_query($DB_LINK,"select city_n,state_n,m_id,p_id,name,placing,login_id,status from tbl_staff where m_id='$mainid'   ");  
  if(mysqli_num_rows($qry)>0)
        {          
          $data_get=mysqli_fetch_array($qry);
           ?> 'name': '<?=$data_get['login_id'];?>', 'title': '<a title="<?=$data_get['name'];?> City  : <?=$data_get['city_n'];?> State : <?=$data_get['state_n'];?>" href="tree-list?p_id=<?=$data_get['m_id'];?>"><?=$data_get['name'];?> </a>' ,'className': '<?php if($data_get['status']==1) echo 'product-dept'; else echo 'frontend1';?>'  

           <?php 
             $qry1=mysqli_query($DB_LINK,"select m_id,p_id,name,placing,login_id,status from tbl_staff where p_id='".$data_get['m_id']."' order by placing asc   ");  
  if(mysqli_num_rows($qry)>0)
        {   ?>
,'children': [
        <?php       
          foreach($qry1 as $data_get1)
          {
            ?>
            { 'name': '<?=$data_get1['login_id'];?>', 'title': '<a title="<?=$data_get1['name'];?>" href="tree-list?p_id=<?=$data_get1['m_id'];?>"><?=$data_get1['name'];?></a>','className': '<?php if($data_get1['status']==1) echo 'product-dept'; else echo 'frontend1';?>'
<?php 
             $qry2=mysqli_query($DB_LINK,"select m_id,p_id,name,placing,login_id,status from tbl_staff where p_id='".$data_get1['m_id']."' order by placing asc   ");  
  if(mysqli_num_rows($qry2)>0)
        {   ?>
,'children': [
        <?php       
          foreach($qry2 as $data_get2)
          {
            ?>
            { 'name': '<?=$data_get2['login_id'];?>', 'title': '<a href="tree-list?p_id=<?=$data_get2['m_id'];?>"><?=$data_get2['name'];?></a>' , 'className': '<?php if($data_get2['status']==1) echo 'product-dept'; else echo 'frontend1';?>'

<?php 
             $qry3=mysqli_query($DB_LINK,"select m_id,p_id,name,placing,login_id,status from tbl_staff where p_id='".$data_get2['m_id']."' order by placing asc   ");  
  if(mysqli_num_rows($qry3)>0)
        {   ?>
,'children': [
        <?php       
          foreach($qry3 as $data_get3)
          {
            ?>
            { 'name': '<?=$data_get3['login_id'];?>', 'title': '<a href="tree-list?p_id=<?=$data_get3['m_id'];?>"><?=$data_get3['name'];?></a>' , 'className': '<?php if($data_get3['status']==1) echo 'product-dept'; else echo 'frontend1';?>'

<?php 
             $qry4=mysqli_query($DB_LINK,"select m_id,p_id,name,placing,login_id,status from tbl_staff where p_id='".$data_get3['m_id']."' order by placing asc   ");  
  if(mysqli_num_rows($qry4)>0)
        {   ?>
,'children': [
        <?php       
          foreach($qry4 as $data_get4)
          {
            ?>
            { 'name': '<?=$data_get4['login_id'];?>', 'title': '<a href="tree-list?p_id=<?=$data_get4['m_id'];?>"><?=$data_get4['name'];?></a>' , 'className': '<?php if($data_get4['status']==1) echo 'product-dept'; else echo 'frontend1';?>' },

            <?php 
          }
           ?>]<?php  
          }
         
          ?>

             },

            <?php 
          }
           ?>]<?php  
          }
         
          ?>

             },

            <?php 
          }
           ?>]<?php  
          }
         
          ?>


             },

            <?php 
          }
           ?>]<?php  
          }
        }
          ?>
      /*'name': 'Lao Lao',
      'title': 'general manager',
      'children': [
        { 'name': 'Bo Miao', 'title': 'department manager',
          'children': [
            { 'name': 'Li Jing', 'title': 'senior engineer' },
            { 'name': 'Li Xin', 'title': 'senior engineer',
              'children': [
                { 'name': 'To To', 'title': 'engineer' },
               
                { 'name': 'Xuan Xuan', 'title': 'engineer' }
              ]
            }
          ]
        },
        { 'name': 'Su Miao', 'title': 'department manager',
          'children': [
            { 'name': 'Pang Pang', 'title': 'senior engineer' },
            { 'name': 'Hei Hei', 'title': 'senior engineer',
              'children': [
                { 'name': 'Xiang Xiang', 'title': 'UE engineer' },
                 
                { 'name': 'Zai Zai', 'title': 'engineer' }
              ]
            }
          ]
        }
      ]*/
    };

    $('#chart-container').orgchart({
      'data' : datascource,
      'nodeContent': 'title'
    });

    $('#btn-filter-node').on('click', function() {
      filterNodes($('#key-word').val());
    });

    $('#btn-cancel').on('click', function() {
      clearFilterResult();
    });

    $('#key-word').on('keyup', function(event) {
      if (event.which === 13) {
        filterNodes(this.value);
      } else if (event.which === 8 && this.value.length === 0) {
        clearFilterResult();
      }
    });

  });
  </script>
  </body>
</html>

<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>