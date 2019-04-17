</div>
</div>
<div class="footer">

</div>

<?php 
ob_start();
//include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

?>

<!-- Add new maincategory modal -->
<?php include'addmaincategory.php'; ?>

<!-- Add new subcategory modal -->
<?php include'addsubcategory.php'; ?>



<div id="new_installment" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> قسط جديد </h3>
      <form method="post" class="uk-grid-small" uk-grid>
     <?php 
          if(!empty($_GET['i'])){
                $miwis = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
            $uusww = mysqli_fetch_assoc($miwis);
              if(!empty($uusww['id'])){
                  $name = myf2($uusww['name']);
              }
          }else if(!empty($_GET['pro']) && !empty($_GET['i'])){
                  $miwis = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
            $uusww = mysqli_fetch_assoc($miwis);
              if(!empty($uusww['id'])){
                  $name = myf2($uusww['name']);
              }
              
                $mwrrs = mysqli_query($mu2,"SELECT * FROM el2st WHERE id='".myf2($_GET['pro'])."'");
            $uuww = mysqli_fetch_assoc($mwrrs);
              if(!empty($uuww['id'])){
                  $name = myf2($uuww['product_name']);
              }/*else if(empty($uuww['id'])){
                      $mwr2rs = mysqli_query($mu2,"SELECT * FROM cash WHERE id='".myf2($_GET['pro'])."'");
            $uuwwws = mysqli_fetch_assoc($mwr2rs);
                  if(!empty($uuwwws['id'])){
                  $names = myf2($uuwwws['product_name']);
              }
              }*/
          }
          ?>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="client1" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="text" placeholder="إسم المنتج الأول" name="product1">
        </div>
              <?php 
//          if(!empty($_GET['i'])){
          $ni = 0;
                 $m3is = mysqli_query($mu2,"SELECT * FROM users WHERE name='".myf1($name)."'");
            $u2sww = mysqli_fetch_assoc($m3is);
              
                $m20is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($u2sww['id'])."' AND date_y!='' AND date_m!='' AND date_d!='' AND kind=''");
            while($u20ww = mysqli_fetch_assoc($m20is)){
                $ni++;
            }
          
              if($ni==0){
          
                 echo '
                 <div class="uk-width-1-1">
          <input class="uk-input" type="date" name="date" data-uk-datepicker="{format:'."'DD.MM.YYYY'".'}" placeholder="ميعاد القسط">
        </div>
                 
                 ';
              }else if($ni>0){
                  $dat_y = $u20ww['date_y'];
                  $dat_m = $u20ww['date_m'];
                  $dat_d = $u20ww['date_d'];
              }
//          }
          
          ?>
          
        
        <div class="uk-width-1-2@s">
          <input class="uk-input" name="pric" id="pric" onchange="mych('pric','usefu','total')" type="number" placeholder="السعر">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" id="usefu" name="usefu" onchange="mych('pric','usefu','total')" type="text" placeholder="الفائدة">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" id="total" type="text" placeholder="الإجمالي">
        </div>
          <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الثاني" name="product2">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric2" id="pric2" onchange="mych('pric2','usefu2','total2')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu2" name="usefu2" onchange="mych('pric2','usefu2','total2')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total2" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
             <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الثالث" name="product3">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric3" id="pric3" onchange="mych('pric3','usefu3','total3')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu3" name="usefu3" onchange="mych('pric3','usefu3','total3')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total3" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
             <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الرابع" name="product4">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric4" id="pric4" onchange="mych('pric4','usefu4','total4')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu4" name="usefu4" onchange="mych('pric4','usefu4','total4')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total4" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
             <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الخامس" name="product5">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric5" id="pric5" onchange="mych('pric5','usefu5','total5')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu5" name="usefu5" onchange="mych('pric5','usefu5','total5')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total5" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
          <?php
            if($ni==0){
            echo '
              <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="note">
        </div>
            ';
            
            }
          ?>
      
        <div class="uk-width-1-2">
          <input type="submit" class="uk-button uk-button-default uk-width-expand" type="submit" name="cer1" value="تأكيد"/>

        </div>
<?php
            if(isset($_POST['cer1'])){
                  $date_d = "";
              $date_m = "";
              $date_y = "";
                
                if($ni>0){
                    $date_y = myf2($dat_y);
                    $date_m = myf2($dat_m);
                    $date_d = myf2($dat_d);
                }
              $total = ($_POST['pric'] * $_POST['usefu']/100) + $_POST['pric'];
            
             $date_today = date("Y : m : d");
                
            if(!empty($_POST['date'])){
                  $nu=0;
                while($nu<strlen($_POST['date'])){
                    if($nu<=3){
                      $date_y .= $_POST['date'][$nu];
                    }else if($nu>4 && $nu<7){
                        $date_m .= $_POST['date'][$nu];
                    }else if($nu>7 && $nu<10){
                        $date_d .= $_POST['date'][$nu];
                    }
                    $nu++;
                }
             
            }
                $mmu = mysqli_query($mu2,"SELECT * FROM users WHERE name='".myf1($_POST['client1'])."'");
                $uio = mysqli_fetch_assoc($mmu);
                if(!empty($uio['id'])){
                    if($ni==0){
                        $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,notes,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product1'])."','".myf1($_POST['pric'])."','".myf1($_POST['usefu'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."')");
                    }else if($ni>0){
                         $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product1'])."','".myf1($_POST['pric'])."','".myf1($_POST['usefu'])."','".myf1($total)."','".myf1($date_today)."')");
                    }
                        if(!empty($_POST['product1']) && !empty($_POST['product2'])){
              $total = ($_POST['pric2'] * $_POST['usefu2']/100) + $_POST['pric2'];
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,notes,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product2'])."','".myf1($_POST['pric2'])."','".myf1($_POST['usefu2'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."')");

                        }
                     if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3'])){
                                   $total = ($_POST['pric3'] * $_POST['usefu3']/100) + $_POST['pric3'];
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,notes,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product3'])."','".myf1($_POST['pric3'])."','".myf1($_POST['usefu3'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."')");

                        }
                       if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3']) && !empty($_POST['product4'])){
                                     $total = ($_POST['pric4'] * $_POST['usefu4']/100) + $_POST['pric4'];
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,notes,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product4'])."','".myf1($_POST['pric4'])."','".myf1($_POST['usefu4'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."')");

                        }
                       if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3']) && !empty($_POST['product4']) && !empty($_POST['product5'])){
                                     $total = ($_POST['pric5'] * $_POST['usefu5']/100) + $_POST['pric5'];
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_y,date_m,	date_d,product_name,price,useful,total,notes,date_today) VALUES ('".myf1($uio['id'])."','".myf1($date_y)."','".myf1($date_m)."','".myf1($date_d)."','".myf1($_POST['product5'])."','".myf1($_POST['pric5'])."','".myf1($_POST['usefu5'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."')");

                        }
                    
                if(isset($ms)){
                    
                     header("Location: clientpage.php?i=".$_GET['i']);
                } 
                }
           
                
            }
        
            if(isset($_POST['dele'])){
                if(!empty($_POST['client1']) && !empty($_GET['pro']) && !empty($_GET['i'])){
             $mmuws = mysqli_query($mu2,"SELECT * FROM el2st WHERE id='".$_GET['pro']."'");
                $uios = mysqli_fetch_assoc($mmuws);
                    
                    if($uios['user_id'] == $_GET['i']){
     $delett = mysqli_query($mu2,"DELETE FROM el2st WHERE id='".$_GET['pro']."'");
        if(isset($delett)){
     header("Location: clientpage.php?i=".$_GET['i']);
        }

                    }
                }
            }
            ?>

      </form>
    </div>

  </div>
</div>

<div id="new_installmentss" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> كاش جديد </h3>
      <form method="post" class="uk-grid-small" uk-grid>
     
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="client1" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="text" placeholder="إسم المنتج" name="product1" value="<?php echo $names; ?>">
        </div>
<!--
        <div class="uk-width-1-1">
          <input class="uk-input" type="date" name="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="ميعاد القسط">
        </div>
-->
        <div class="uk-width-1-2@s">
          <input class="uk-input" name="pric" id="pric10" onchange="mych('pric10','usefu10','total10')" type="number" placeholder="السعر">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" id="usefu10" name="usefu10" onchange="mych('pric10','usefu10','total10')" type="text" placeholder="الفائدة">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" id="total10" type="text" placeholder="الإجمالي">
        </div>
            <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الثاني" name="product2">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric20" id="pric20" onchange="mych('pric20','usefu20','total20')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu20" name="usefu20" onchange="mych('pric20','usefu20','total20')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total20" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
              <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الثالث" name="product3">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric30" id="pric30" onchange="mych('pric30','usefu30','total30')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu30" name="usefu30" onchange="mych('pric30','usefu30','total30')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total30" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
              <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الرابع" name="product4">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric40" id="pric40" onchange="mych('pric40','usefu40','total40')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu40" name="usefu40" onchange="mych('pric40','usefu40','total40')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total40" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
            <br>
      <div>
              <div class="uk-width-1-1">
                  <input class="uk-input" type="text" placeholder="إسم المنتج الخامس" name="product5">
            </div>
             <div class="uk-width-1-2@s">
                  <input class="uk-input" name="pric50" id="pric50" onchange="mych('pric50','usefu50','total50')" type="number" placeholder="السعر">
            </div>
            <div class="uk-width-1-2@s">
                  <input class="uk-input" id="usefu50" name="usefu50" onchange="mych('pric50','usefu50','total50')" type="text" placeholder="الفائدة">
            </div>
            <div class="uk-width-1-1">
                  <input class="uk-input" id="total50" type="text" placeholder="الإجمالي">
            </div>
      </div>
          <br>
        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="note">
        </div>
        <div class="uk-width-1-2">
          <input type="submit" class="uk-button uk-button-default uk-width-expand" type="submit" name="cer2" value="تأكيد"/>

        </div>
      
<?php
            if(isset($_POST['cer2'])){
              $total = ($_POST['pric'] * $_POST['usefu10']/100) + $_POST['pric'];
              $date_d = "";
              $date_m = "";
              $date_y = "";
             $date_today = date("Y : m : d");
              $nu=0;
                while($nu<strlen($_POST['date'])){
                    if($nu<=3){
                      $date_y .= $_POST['date'][$nu];
                    }else if($nu>4 && $nu<7){
                        $date_m .= $_POST['date'][$nu];
                    }else if($nu>7 && $nu<10){
                        $date_d .= $_POST['date'][$nu];
                    }
                    $nu++;
                }
             
                 $mmu = mysqli_query($mu2,"SELECT * FROM users WHERE name='".myf1($_POST['client1'])."'");
                $uio = mysqli_fetch_assoc($mmu);
                if(!empty($uio['id'])){
            $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,product_name,price,useful,total,notes,date_today,kind) VALUES ('".myf1($uio['id'])."','".myf1($_POST['product1'])."','".myf1($_POST['pric'])."','".myf1($_POST['usefu10'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."','".myf1("cash")."')");
                        if(!empty($_POST['product1']) && !empty($_POST['product2'])){
                            $total = ($_POST['pric20'] * $_POST['usefu20']/100) + $_POST['pric20'];
                            $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,product_name,price,useful,total,notes,date_today,kind) VALUES ('".myf1($uio['id'])."','".myf1($_POST['product2'])."','".myf1($_POST['pric20'])."','".myf1($_POST['usefu20'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."','".myf1("cash")."')");
                        }
                     if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3'])){
                         $total = ($_POST['pric30'] * $_POST['usefu30']/100) + $_POST['pric30'];
                            $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,product_name,price,useful,total,notes,date_today,kind) VALUES ('".myf1($uio['id'])."','".myf1($_POST['product3'])."','".myf1($_POST['pric30'])."','".myf1($_POST['usefu30'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."','".myf1("cash")."')");
                        }   
                    if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3']) && !empty($_POST['product4'])){
                        $total = ($_POST['pric40'] * $_POST['usefu40']/100) + $_POST['pric40'];
                            $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,product_name,price,useful,total,notes,date_today,kind) VALUES ('".myf1($uio['id'])."','".myf1($_POST['product4'])."','".myf1($_POST['pric40'])."','".myf1($_POST['usefu40'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."','".myf1("cash")."')");
                        }
                     if(!empty($_POST['product1']) && !empty($_POST['product2']) && !empty($_POST['product3']) && !empty($_POST['product4']) && !empty($_POST['product5'])){
                         $total = ($_POST['pric50'] * $_POST['usefu50']/100) + $_POST['pric50'];
                            $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,product_name,price,useful,total,notes,date_today,kind) VALUES ('".myf1($uio['id'])."','".myf1($_POST['product5'])."','".myf1($_POST['pric50'])."','".myf1($_POST['usefu50'])."','".myf1($total)."','".myf1($_POST['note'])."','".myf1($date_today)."','".myf1("cash")."')");
                        }
                if(isset($ms)){
                     header("Location: clientpage.php?i=".$_GET['i']);
                }
                }
                
            }
              if(isset($_POST['deletecash'])){
                if(!empty($_POST['client1']) && !empty($_GET['pro']) && !empty($_GET['i'])){
             $mmuws = mysqli_query($mu2,"SELECT * FROM el2st WHERE id='".myf2($_GET['pro'])."'");
                $uios = mysqli_fetch_assoc($mmuws);
                    
                    if($uios['user_id'] == $_GET['i']){
     $delett = mysqli_query($mu2,"DELETE FROM el2st WHERE id='".myf2($_GET['pro'])."'");
        if(isset($delett)){
            header("Location: clientpage.php?i=".$_GET['i']);
        }

                    }
                }
            }
            
            ?>

      </form>
    </div>

  </div>
</div>


<div id="refund" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> تسجيل مرتجع </h3>
      <form method="post" class="uk-grid-small" uk-grid>
      
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="clin_name" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="المبلغ" name="pric2">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم المنتج" name="product_n">
        </div>

        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="notes2">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="button2s" value="تأكيد"/>

        </div>
<!--
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

        </div>
-->

      </form>
    </div>

  </div>
</div>
<?php
            if(isset($_POST['button2s'])){
             $date_today = date("Y : m : d");
         
         
//                $msw = mysqli_query($mu2,"DELETE FROM el2st WHERE product_name='".myf1($_POST['product_n'])."'");
//                echo "DELETE FROM el2st WHERE product_name='".myf1($_POST['product_n'])."'";
                
$ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,price,product_name,date_today,notes,kind) VALUES ('".$_GET['i']."','".myf1($_POST['pric2'])."','".myf1($_POST['product_n'])."','".myf1($date_today)."','".myf1($_POST['notes2'])."','".myf1("2st_mortag3")."')");
                        
         
                if(isset($ms)){
                      header("Location: clientpage.php?i=".$_GET['i']);
                }
                
            }
        
            
            ?>
<div id="refund2" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> تسجيل مرتجع الكاش </h3>
      <form method="post" class="uk-grid-small" uk-grid>
      
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="clin_name" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="المبلغ" name="pric2">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم المنتج" name="product_n">
        </div>

        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="notes2">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="button2ws" value="تأكيد"/>

        </div>
<!--
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

        </div>
-->

      </form>
    </div>

  </div>
</div>
<?php
            if(isset($_POST['button2ws'])){
             $date_today = date("Y : m : d");
         
        
                
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,price,product_name,date_today,notes,kind) VALUES ('".$_GET['i']."','".myf1($_POST['pric2'])."','".myf1($_POST['product_n'])."','".myf1($date_today)."','".myf1($_POST['notes2'])."','".myf1("cash_mortag3")."')");
                        
         
                if(isset($ms)){
                      header("Location: clientpage.php?i=".$_GET['i']);
                }
                
            }
        
            
            ?>
<div id="pay_installment" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> دفع قسط </h3>
      <form class="uk-grid-small" method="post" uk-grid>
   
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="client" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="المبلغ" name="price">
        </div>


        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="notess">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="button2" value="تأكيد"/>

        </div>
     
      </form>
    </div>

  </div>
</div>
<?php
            if(isset($_POST['button2'])){
             $date_today = date("Y : m : d");
         $msss = mysqli_query($mu2,"SELECT * FROM users WHERE name='".myf1($_POST['client'])."'");
                $mmus = mysqli_fetch_assoc($msss);
                if(!empty($mmus['id'])){
            
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_today,price,notes,kind) VALUES ('".myf1($mmus['id'])."','".myf1($date_today)."','".myf1($_POST['price'])."','".myf1($_POST['notess'])."','".myf1("2st_pay")."')");
                        
                if(isset($ms)){
                  header("Location: clientpage.php?i=".$_GET['i']);
                }
            }else {
                    echo "
                    <script>alert('يجب عليك إدخال إسم العميل بطريقة صحيحة');</script>
                    ";
                }
            }

            ?>

<div id="pay_installment_cash" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> دفع كاش </h3>
      <form class="uk-grid-small" method="post" uk-grid>
   
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="إسم العميل" name="client" value="<?php echo $name; ?>">
        </div>
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="المبلغ" name="price">
        </div>


        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات" name="notess">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="bww2" value="تأكيد"/>

        </div>
     

      </form>
    </div>
<?php
            if(isset($_POST['bww2'])){
             $date_today = date("Y : m : d");
         $msss = mysqli_query($mu2,"SELECT * FROM users WHERE name='".myf1($_POST['client'])."'");
                $mmus = mysqli_fetch_assoc($msss);
                if(!empty($mmus['id'])){
       
                $ms = mysqli_query($mu2,"INSERT INTO el2st(user_id,date_today,price,notes,kind) VALUES ('".myf1($mmus['id'])."','".myf1($date_today)."','".myf1($_POST['price'])."','".myf1($_POST['notess'])."','".myf1("cash_pay")."')");
                        
                if(isset($ms)){
                  header("Location: clientpage.php?i=".$_GET['i']);
                }
            }else {
                    echo "
                    <script>alert('يجب عليك إدخال إسم العميل بطريقة صحيحة');</script>
                    ";
                }
            }

            ?>
  </div>
</div>

<script type="application/javascript">
function mych(tr1,tr2,tr3){
  var price = document.getElementById(tr1);
  var useful = document.getElementById(tr2);
  var total = document.getElementById(tr3);
    
    total.value = (Number(price.value) * Number(useful.value)/100) + Number(price.value);

}
    function mych2(){
  var price = document.getElementById("pric2");
  var useful = document.getElementById("usefu2");
  var total = document.getElementById("total2");
    
    total.value = (Number(price.value) * Number(useful.value)/100) + Number(price.value);

}
</script>
</body>

</html>
