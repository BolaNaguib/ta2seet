<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
if(empty($_GET['i']) || empty($_SESSION['didi'])){
    header("Location: index.php");
}
            $users = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
        $info_users = mysqli_fetch_assoc($users);

?>
<div class="uk-flex-top" >

    <div class="uk-padding">
        <?php 
        if(!empty($_GET['in']) && !empty($_GET['i'])){
           echo '<h3> تعديل قسط </h3>';
        }else if(!empty($_GET['ic']) && !empty($_GET['i'])){
           echo '<h3> تعديل كاش </h3>';
        }
        
        ?>
      
      <form class="uk-grid-small" method="post" uk-grid>
<!--
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="التاريخ">
        </div>
-->
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" value="<?php echo myf2($info_users['name']); ?>" placeholder="إسم العميل">
        </div>
      <?php 
            
          if(!empty($_GET['in'])){
                $usesrs = mysqli_query($mu2,"SELECT * FROM el2st WHERE id='".myf2($_GET['in'])."'");
        $elsst = mysqli_fetch_assoc($usesrs);
               $note = myf2($elsst['notes']);
              
               $price = myf2($elsst['price']);
               $useful = myf2($elsst['useful']);
               $totals = myf2($elsst['total']);
              echo '
                <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" name="el2storcash" value="'.myf2($elsst['product_name']).'" placeholder="إسم المنتج">
        </div>
              ';
          }else if(!empty($_GET['ic'])){
                 $usesrs = mysqli_query($mu2,"SELECT * FROM el2st WHERE id='".myf2($_GET['ic'])."'");
        $elsst = mysqli_fetch_assoc($usesrs);
               $note = myf2($elsst['notes']);
              
               $price = myf2($elsst['price']);
               $useful = myf2($elsst['useful']);
               $totals = myf2($elsst['total']);
              
              echo '
              
                <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" name="el2storcash" value="'.myf2($elsst['product_name']).'" placeholder="إسم المنتج">
        </div>
              '; 
          }
          if(!empty($_GET['ic']) || !empty($_GET['in'])){
              echo '  <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" name="pric" id="pr" onchange="mych('."'pr',"."'us',"."'to'".')" value="'.$price.'" placeholder="السعر">
        </div>
  <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" name="usef" onchange="mych('."'pr',"."'us',"."'to'".')" value="'.$useful.'" id="us" placeholder="الفائدة">
        </div>
            <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" id="to" value="'.$totals.'" name="tolta" placeholder="الإجمالي">
        </div>
          ';
          }
          ?>

        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" name="note" value="<?php echo $note; ?>" placeholder="ملاحظات">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="inp_btn" value="تأكيد"/>

        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="delete_btn" value="حذف"/>

        </div>
            <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="retun" value="العودة"/>

        </div>
<?php
          if(isset($_POST['delete_btn'])){
              if(!empty($_GET['in'])){
          $delete_ta2 = mysqli_query($mu2,"DELETE FROM el2st WHERE id='".myf2($_GET['in'])."'");
if(isset($delete_ta2)){
       header("Location: clientpage.php?i=".$_GET['i']);
}
              }else if(!empty($_GET['ic'])){
                     $delete_cash = mysqli_query($mu2,"DELETE FROM el2st WHERE id='".myf2($_GET['ic'])."'");
if(isset($delete_cash)){
         header("Location: clientpage.php?i=".$_GET['i']);
}
              }
          }
          
              if(isset($_POST['inp_btn'])){
                  $total = ($_POST['pric'] * $_POST['usef'] / 100) + $_POST['pric'];
              if(!empty($_GET['in'])){


          $update_ta2 = mysqli_query($mu2,"UPDATE el2st SET total='".myf1($total)."',product_name='".myf1($_POST['el2storcash'])."',price='".myf1($_POST['pric'])."',useful='".myf1($_POST['usef'])."' WHERE id='".myf2($_GET['in'])."' AND user_id='".$_GET['i']."'");
                  
                      
    
                      
if(isset($update_ta2)){
      header("Location: clientpage.php?i=".$_GET['i']);
}
                  
              }else if(!empty($_GET['ic'])){
                  
    $update_ta2 = mysqli_query($mu2,"UPDATE el2st SET total='".myf1($total)."',product_name='".myf1($_POST['el2storcash'])."',notes='".myf1($_POST['note'])."',price='".myf1($_POST['pric'])."',useful='".myf1($_POST['usef'])."' WHERE id='".myf2($_GET['ic'])."' AND user_id='".$_GET['i']."'");

                      
if(isset($update_ta2)){
      header("Location: clientpage.php?i=".$_GET['i']);
}
                  }
              }
          
          if(isset($_POST['retun'])){
              header("Location: clientpage.php?i=".$_GET['i']);
          }
          ?>
      </form>
    </div>
<script type="application/javascript">
    function mych(tr1,tr2,tr3){
  var price = document.getElementById(tr1);
  var useful = document.getElementById(tr2);
  var total = document.getElementById(tr3);
    
    total.value = (Number(price.value) * Number(useful.value)/100) + Number(price.value);

}
    </script>
</div>
<?php include'footer.php'; ?>
