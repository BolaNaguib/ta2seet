<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
if(empty($_GET['i']) || empty($_SESSION['didi'])){
    header("Location: index.php");
}

if(!empty($_GET['i'])){
    $total=0;
    $pay=0;
    $back=0;
   $user = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
            $user_inf = mysqli_fetch_assoc($user);
    if(!empty($_GET['in'])){
          $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind=''");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $total+= myf2($s2t['total']);
            }
         $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('2st_mortag3')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $back+= myf2($s2t['price']);
            }
        
    
     $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('2st_pay')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $pay+= myf2($s2t['price']);
            }
    }else if(!empty($_GET['ic'])){
          $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $total+= myf2($s2t['total']);
            }
    
     $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash_pay')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $pay+= myf2($s2t['price']);
            }
        
        $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash_mortag3')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $back+= myf2($s2t['price']);
            }
    }
}
?>
<section>
  <b> إسم العميل :   <?php echo myf2($user_inf['name']); ?>
    <?php echo date("d")." / ".date("m")." / ".date("Y"); ?>
    </b>
  <?php 
    if(!empty($_GET['in'])){
        echo '<b> اجمالي الأقساط :  '.$total.' </b>';
    }else if(!empty($_GET['ic'])){
        echo '<b> اجمالي الكاش :  '.$total.' </b>';
    }
    if(!empty($_GET['in']) || !empty($_GET['ic'])){
    ?>
    
    
  <b> مرتجعات :   <?php echo $back; ?></b>
  <b> تم دفع :   <?php echo $pay; ?></b>
  <b> باقي :   <?php echo $total-($pay+$back); ?></b>
    <?php } ?>
      <?php
            if(!empty($_GET['i2m'])){
                  $nunumb=0;
      $misi = mysqli_query($mu2,"SELECT * FROM back WHERE user_id='".$_GET['i']."' AND kind='".myf1("2")."'");
            while($uus = mysqli_fetch_assoc($misi)){
                $nunumb += myf2($uus['price']);
            }
                echo "<b> المجموع : ".$nunumb."</b>";
            }else if(!empty($_GET['icm'])){
                 $nunumb=0;
      $misi = mysqli_query($mu2,"SELECT * FROM back WHERE user_id='".$_GET['i']."' AND kind='".myf1("c")."'");
            while($uus = mysqli_fetch_assoc($misi)){
                $nunumb += myf2($uus['price']);
            }
                echo "<b> المجموع : ".$nunumb."</b>";
            }
        
        
        
        ?>
   <button class="uk-button uk-button-defaul" type="submit" id="but" onclick="button()" uk-toggle> طباعة </button>
  <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>إسم المنتج</th>
            <th>السعر</th>
          <?php if(!empty($_GET['ic']) || !empty($_GET['in'])){ ?>
                <th>الفائدة</th>
            <th>الإجمالي</th>
              <?php } ?>
            <th>الملاحظة</th>
            <th>المعاملة</th>
            <th>التاريخ</th>

          </tr>
        </thead>
          
        <tbody>
           
            
             <?php 
          if(!empty($_GET['i']) && !empty($_GET['in'])){
              $yyt=0;
              $tex="";
                  $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='' OR user_id='".$_GET['i']."' AND kind='".myf1('2st_pay')."' OR user_id='".$_GET['i']."' AND kind='".myf1('2st_mortag3')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $yyt++;
               if($s2t['kind']==myf1('2st_mortag3')){
                    $tex="مرتجع";
                }else if($s2t['kind']==myf1('2st_pay')){
                    $tex="دفع قسط";
                }else if($s2t['kind']==""){
                    $tex="قسط";
                } 
                
            echo '
          
          <tr class="table__row">
            <td>'.$yyt.'</td>
            <td>'.myf2($s2t['product_name']).'</td>
            <td>'.myf2($s2t['price']).'</td>
            <td>'.myf2($s2t['useful']).'</td>
            <td>'.myf2($s2t['total']).'</td>
            <td>'.myf2($s2t['notes']).'</td>
            <td>'.$tex.'</td>
            <td>'.myf2($s2t['date_today']).'</td>
            
     
          </tr>
            ';
            }
          }else if(!empty($_GET['i']) && !empty($_GET['ic'])){
                 $yyt=0;
                  $s2r = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash')."' OR user_id='".$_GET['i']."' AND kind='".myf1('cash_pay')."' OR user_id='".$_GET['i']."' AND kind='".myf1('cash_mortag3')."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $yyt++;
                
                   if($s2t['kind']==myf1('cash_mortag3')){
                    $tex="مرتجع";
                }else if($s2t['kind']==myf1('cash_pay')){
                    $tex="دفع كاش";
                }else if($s2t['kind']==myf1('cash')){
                    $tex="كاش";
                } 
            echo '
          
          <tr class="table__row">
            <td>'.$yyt.'</td>
            <td>'.myf2($s2t['product_name']).'</td>
            <td>'.myf2($s2t['price']).'</td>
            <td>'.myf2($s2t['useful']).'</td>
            <td>'.myf2($s2t['total']).'</td>
            <td>'.myf2($s2t['notes']).'</td>
            <td>'.$tex.'</td>
            <td>'.myf2($s2t['date_today']).'</td>
            
     
          </tr>
            ';
            }
          }else if(!empty($_GET['i']) && !empty($_GET['i2m'])){
              $yyt=0;
                  $s2r = mysqli_query($mu2,"SELECT * FROM back WHERE user_id='".$_GET['i']."' AND kind='".myf1("2")."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $yyt++;
            echo '
          
          <tr class="table__row">
            <td>'.$yyt.'</td>
            <td>'.myf2($s2t['product']).'</td>
            <td>'.myf2($s2t['price']).'</td>
            <td>'.myf2($s2t['notes']).'</td>
            <td>'.myf2($s2t['date_today']).'</td>
            
     
          </tr>
            ';
            }
          }else if(!empty($_GET['i']) && !empty($_GET['icm'])){
              $yyt=0;
                  $s2r = mysqli_query($mu2,"SELECT * FROM back WHERE user_id='".$_GET['i']."' AND kind='".myf1("c")."'");
            while($s2t = mysqli_fetch_assoc($s2r)){
                $yyt++;
            echo '
          
          <tr class="table__row">
            <td>'.$yyt.'</td>
            <td>'.myf2($s2t['product']).'</td>
            <td>'.myf2($s2t['price']).'</td>
            <td>'.myf2($s2t['notes']).'</td>
            <td>'.myf2($s2t['date_today']).'</td>
            
     
          </tr>
            ';
            }
          }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<script type="application/javascript">
function button(){
    var btn = document.getElementById("btn");
//    btn.style.display = "none";
window.print();
}
</script>
<?php include'footer.php'; ?>
