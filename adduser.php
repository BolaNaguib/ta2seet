<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_SESSION['didi']) || empty($_SESSION['ta2_admin'])){
    header("Location: index.php");
}


if(!empty($_GET['up'])){
      $adminns = mysqli_query($mu2,"SELECT * FROM worker WHERE id='".myf2($_GET['up'])."'");
        $adminns_up = mysqli_fetch_assoc($adminns); 
}

 ?>
<div class="">
  <form method="post">

        <div class="uk-padding">
          <h3> adduser </h3>
          <form class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
              <input class="uk-input" type="text" name="nam" value="<?php echo myf2($adminns_up['name']); ?>" placeholder="name">
            </div>
            <div class="uk-width-1-2@s">
              <input class="uk-input" type="email" name="ema" value="<?php echo myf2($adminns_up['email']); ?>" placeholder="email">
            </div>
            <div class="uk-width-1-1">
              <input class="uk-input" type="password" value="<?php echo myf2($adminns_up['passwd']); ?>" name="pas" placeholder="pw">
            </div>
            <div class="uk-width-1-1">
              <input class="uk-input" type="password" value="<?php echo myf2($adminns_up['passwd']); ?>" name="re_pas" placeholder="re enter pw">
            </div>
            <div class="uk-width-1-1">
              
                <?php
                if(!empty($_GET['up'])){
                          $s2r = mysqli_query($mu2,"SELECT * FROM sections ORDER BY id DESC");
            while($s2t = mysqli_fetch_assoc($s2r)){
                
                    $s2r_per = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".$_GET['up']."' AND section_id='".myf1($s2t['id'])."'");
            $s2t_per = mysqli_fetch_assoc($s2r_per);
                
                if(!empty($s2t_per['id'])){
                     echo '
               <label><input class="uk-checkbox" type="checkbox" value="'.myf2($s2t['name']).'" checked name="chkbox[]"> '.myf2($s2t['name']).'</label>
               '; 
                }else {
                     echo '
               <label><input class="uk-checkbox" type="checkbox" value="'.myf2($s2t['name']).'" name="chkbox[]"> '.myf2($s2t['name']).'</label>
               '; 
                }
              
            
                
                
                }
                    
            
                
                }else {
                   $s2r = mysqli_query($mu2,"SELECT * FROM sections ORDER BY id DESC");
            while($s2t = mysqli_fetch_assoc($s2r)){
               echo '
               <label><input class="uk-checkbox" type="checkbox" value="'.myf2($s2t['name']).'" name="chkbox[]"> '.myf2($s2t['name']).'</label>
               '; 
            }
                }
                ?>
                
             

            </div>




            <div class="uk-width-1-2">
              <input class="uk-button uk-button-default uk-width-expand" type="submit" name="button_cur" value="تأكيد"/>

            </div>
        
<?php
           if(!empty($_GET['up'])){
               echo '
                   <div class="uk-width-1-2">
              <input class="uk-button uk-button-default uk-width-expand" type="submit" name="dele" value="حذف"/>   </div>
               ';
           }    
                if(isset($_POST['button_cur'])){
                   if(empty($_GET['up'])){
                          if(!empty($_POST['nam']) && !empty($_POST['ema']) && !empty($_POST['pas']) && !empty($_POST['re_pas'])){
                           if($_POST['pas'] == $_POST['re_pas']){
                    $s835wa2 = mysqli_query($mu2,"INSERT INTO worker(name,email,passwd) VALUES ('".myf1($_POST['nam'])."','".myf1($_POST['ema'])."','".myf1($_POST['pas'])."')");
                               
                               $user = mysqli_query($mu2,"SELECT * FROM worker WHERE email='".myf1($_POST['ema'])."'");
           $user_i = mysqli_fetch_assoc($user);         
                               
                                       $num=0;
                     while($num<count($_POST['chkbox'])){
                               $user_se = mysqli_query($mu2,"SELECT * FROM sections WHERE name='".myf1($_POST['chkbox'][$num])."'");
           $uer_i = mysqli_fetch_assoc($user_se);  
                         
               $s835wa2 = mysqli_query($mu2,"INSERT INTO persmission(worker_id,section_id) VALUES ('".myf1($user_i['id'])."','".myf1($uer_i['id'])."')");
                       $num++;
                    }
                   
        if(isset($s835wa2)){
           header("Location: adminlist.php");
        }
                           }
                  
                    
                      }
              
                   
                   }else if(!empty($_GET['up'])){
                       
                       if(!empty($_POST['nam']) && !empty($_POST['ema']) && !empty($_POST['pas']) && !empty($_POST['re_pas'])){
                           if($_POST['pas'] == $_POST['re_pas']){
          $userdese = mysqli_query($mu2,"DELETE FROM persmission WHERE worker_id='".$_GET['up']."'");

                    $s835wa2 = mysqli_query($mu2,"UPDATE worker SET name='".myf1($_POST['nam'])."',email='".myf1($_POST['ema'])."',passwd='".myf1($_POST['pas'])."' WHERE id='".myf2($_GET['up'])."'");
                               
                               $user = mysqli_query($mu2,"SELECT * FROM worker WHERE email='".myf1($_POST['ema'])."'");
           $user_i = mysqli_fetch_assoc($user);         
                               
                                         $num=0;
                     while($num<count($_POST['chkbox'])){
                               $user_se = mysqli_query($mu2,"SELECT * FROM sections WHERE name='".myf1($_POST['chkbox'][$num])."'");
           $uer_i = mysqli_fetch_assoc($user_se);  
                         
               $s835wa2 = mysqli_query($mu2,"INSERT INTO persmission(worker_id,section_id) VALUES ('".myf1($user_i['id'])."','".myf1($uer_i['id'])."')");
                       $num++;
                    }
                   
                   
        if(isset($s835wa2)){
            header("Location: adminlist.php");
        }
                           }
                  
                    
                      }
              
                   }
                }
                if(isset($_POST['dele'])){
          $userdese = mysqli_query($mu2,"DELETE FROM worker WHERE id='".myf2($_GET['up'])."'");
                    
          $userdese2 = mysqli_query($mu2,"DELETE FROM persmission WHERE worker_id='".$_GET['up']."'");
   if(isset($userdese2)){
            header("Location: adminlist.php");
        }
                }
                ?>
         

          </form>
        </div>

  </form>
</div>
<style>
    .uk-width-1-1 label {
        float: right;
    }
</style>
<?php include'footer.php'; ?>
