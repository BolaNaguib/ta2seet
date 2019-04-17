<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
$_GET['i'] = str_replace("'","",$_GET['i']);
$_GET['n'] = str_replace("'","",$_GET['n']);
if(empty($_GET['i']) || empty($_GET['n']) || empty($_SESSION['didi'])){
    if(empty($_GET['de'])){
    
        header("Location: index.php");
    }
}else {
     $m8s5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($_GET['i'])."' AND name='".$_GET['n']."'");
             $m18mu = mysqli_fetch_assoc($m8s5);
    if(empty($m18mu['name'])){
           header("Location: index.php");
    }else {
             $m8105 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($m18mu['section_id'])."'");
             $m1810u = mysqli_fetch_assoc($m8105);
        
        $area_2 = myf1($m18mu['id']);
        
        $section_2 = myf2($m1810u['name']);
        $section_id = myf1($m1810u['id']);
    }
}

?>
<div class="">
  <form class="" method="post">
    <div class="uk-width-1-1">
      <label for="">name</label>
      <input class="uk-input uk-width-1-1" type="text" name="us_name" value="">
    </div>
    <div class="uk-width-1-1">
      <label for="">phone</label>
      <input class="uk-input uk-width-1-1" type="text" name="us_phone" value="">
    </div>
    <div class="uk-width-1-1">
      <label for="">address</label>
      <input class="uk-input uk-width-1-1" type="text" name="us_addre" value="">
    </div>
 
          <?php 
      /*   <div class="uk-width-1-1">
      <label for="">main category</label>
      <select class="uk-input uk-width-1-1" type="text" name="us_category" id="cat">
        <option> - </option>
            if(empty($_SESSION['ta2_admin'])){
             $per = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".$_SESSION['didi']."'");
           while($pers = mysqli_fetch_assoc($per)){
             $cate = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($pers['section_id'])."'");
             while($cates = mysqli_fetch_assoc($cate)){
                 echo '   <option> '.myf2($cates['name']).' </option>';
             }
           }
            }else {
                 $cate = mysqli_query($mu2,"SELECT * FROM sections ORDER BY id DESC");
             while($cates = mysqli_fetch_assoc($cate)){
                 echo '   <option> '.myf2($cates['name']).' </option>';
             }
            }
       </select>    </div>*/
          ?>
     
     
 
        <?php 
      /*   <div class="uk-width-1-1">
      <label for="">sub category</label>
      <select class="uk-input uk-width-1-1" type="text" name="us_sub" id="sub" value="">
      <option> - </option>
              if(empty($_SESSION['ta2_admin'])){
             $per = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".$_SESSION['didi']."'");
           while($pers = mysqli_fetch_assoc($per)){
             $cate = mysqli_query($mu2,"SELECT * FROM areas WHERE section_id='".$pers['section_id']."'");
            while($cates = mysqli_fetch_assoc($cate)){
                 echo '   <option> '.myf2($cates['name']).' </option>';
            }
           }
              }else {
                   $cate = mysqli_query($mu2,"SELECT * FROM areas ORDER BY id DESC");
            while($cates = mysqli_fetch_assoc($cate)){
                 echo '   <option> '.myf2($cates['name']).' </option>';
            }
              }
/*         </select>
  </div>*/
          ?>
   
<!--
    <div class="uk-width-1-1">
      <label for="">due date </label>
      <input class="uk-input uk-width-1-1" type="text" name="us_date" value="">
    </div>
-->
    <div class="uk-width-1-2">
      <input class="uk-button uk-button-default uk-width-expand" type="submit" name="buttons" value="تأكيد"/>

    </div>
  
      <?php
      if(!empty($_GET['de'])){
          echo '
            <div class="uk-width-1-2">
      <input class="uk-button uk-button-default uk-width-expand" type="submit" name="button" value="حذف"/>

    </div>
          ';
      }
    if(isset($_POST['buttons'])){
              if(!empty($_POST['us_name']) || !empty($_POST['us_phone']) || !empty($_POST['us_addre']) || !empty($section_id) || !empty($area_2)){
                     $date_today = date("Y : m : d");
//                     $cate = mysqli_query($mu2,"SELECT * FROM sections WHERE name='".myf1($section_2)."'");
//            $cates = mysqli_fetch_assoc($cate);
//                  
//                    $are = mysqli_query($mu2,"SELECT * FROM areas WHERE name='".myf1($_POST['us_sub'])."' AND section_id='".myf1($cates['id'])."'");
//            $area = mysqli_fetch_assoc($are);
//                
                   $ms5s5 = mysqli_query($mu2,"INSERT INTO users(name,phone,address,area,section,date_today) VALUES ('".myf1($_POST['us_name'])."','".myf1($_POST['us_phone'])."','".myf1($_POST['us_addre'])."','".$area_2."','".$section_id."','".myf1($date_today)."')");
                  
                  if(isset($ms5s5)){
             header("Location: clients.php?n=".$_GET['n']."&i=".$_GET['i']);

                  }            
              }
    }
        if(isset($_POST['button'])){
              $ms5s5 = mysqli_query($mu2,"DELETE FROM users WHERE id='".myf2($_GET['de'])."'");
                  
                  if(isset($ms5s5)){
                         header("Location: clients.php?n=".$_GET['n']."&i=".$_GET['i']);
                  }    
        }
        ?>
  </form>
</div>


<?php include'footer.php'; ?>
