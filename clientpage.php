<?php
session_start();
ob_start();
include'header.php';

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_GET['i']) || empty($_SESSION['didi'])){
    header("Location: index.php");
}else {

$mss = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
               $nuu=1;
                $mmu = mysqli_fetch_assoc($mss);

                     $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($mmu['area'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);

            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($mmu['section'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);

                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
}




?>
<section>
  <h3>بيانات العميل</h3>
    <form method="post">
      <div class="uk-child-width-1-3" uk-grid>

  <div class="">
    <b class="userLabel">الإسم</b><input class="userInput" type="text" name="names" value="<?php echo myf2($mmu['name']); ?>"/>
  </div>
  <div class="">
    <b class="userLabel">رقم التليفون</b><input class="userInput" type="text" name="phone" value="<?php echo myf2($mmu['phone']); ?>"/>

  </div>
  <div class="">
    <b class="userLabel">العنوان</b><input class="userInput" type="text" name="address" value="<?php echo myf2($mmu['address']); ?>"/>

  </div>
  <div class="">
    <b class="userLabel">القسم</b> <input class="userInput" type="text" name="section" value="<?php echo myf2($m1232mu['name']); ?>"/>

  </div>
  <div class="">
    <b class="userLabel">المنطقة</b> <input class="userInput" type="text" name="area" value="<?php echo myf2($m122mu['name']); ?>"/>

  </div>
  <div class="">
    <b class="userLabel">ميعاد القسط</b>
            <?php

            $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."'");
            $uus3w = mysqli_fetch_assoc($mi2is);
      $m2wi = mysqli_query($mu2,"SELECT * FROM pays WHERE client_id='".$_GET['i']."' AND el2st_or_cash='".myf1("2st")."' ORDER BY id DESC");
              $ssww = mysqli_fetch_assoc($m2wi);
      if(!empty($ssww['id'])){
             $date_sd = "";
              $date_sm = "";
              $date_sy = "";
      $date_dd = date("d");
      $date_mm = date("m");
      $date_yy = date("Y");
      $calcuold=0;
      $calcutod=0;
              $nu=0;
                        //2019 : 03 : 02
                     $texdate = myf2($ssww['date_today']);
                while($nu<strlen($texdate)){
                    if($nu<=3){
                      $date_sy .= $texdate[$nu];
                    }else if($nu>6 && $nu<9){
                        $date_sm .= $texdate[$nu];
                    }else if($nu>11){
                        $date_sd .= $texdate[$nu];
                    }
                    $nu++;
                }
      $calcuold += $date_sy * 365;
      $calcuold += $date_sm * 30;
      $calcuold += $date_sd;

      $calcutod += $date_yy * 365;
      $calcutod += $date_mm * 30;
      $calcutod += $date_dd;

      $total = ($calcutod - $calcuold) - 30;

     if($total>0 && $calcuold>0){
          echo myf2($uus3w['date_d']) . " / " . myf2($uus3w['date_m']) . " / " . myf2($uus3w['date_y'])."   ( " . $total . " يوم تأخير )";
     }else if($total<=0 || $calcuold==0){
         if(!empty($uus3w['date_d']) && !empty($uus3w['date_m']) && !empty($uus3w['date_y'])){
              echo myf2($uus3w['date_d']) . " / " . myf2($uus3w['date_m']) . " / " . myf2($uus3w['date_y']);
         }


     }



      }else if(empty($ssww['id'])){
          $date_sd = "";
              $date_sm = "";
              $date_sy = "";
      $date_dd = date("d");
      $date_mm = date("m");
      $date_yy = date("Y");
      $calcuold=0;
      $calcutod=0;
              $nu=0;

      $calcuold += myf2($uus3w['date_y']) * 365;
      $calcuold += myf2($uus3w['date_m']) * 30;
      $calcuold += myf2($uus3w['date_d']);

      $calcutod += $date_yy * 365;
      $calcutod += $date_mm * 30;
      $calcutod += $date_dd;

      $total = ($calcutod - $calcuold) - 30;

     if($total>0 && $calcuold>0){
          echo myf2($uus3w['date_d']) . " / " . myf2($uus3w['date_m']) . " / " . myf2($uus3w['date_y'])."   ( " . $total . " يوم تأخير )";
     }else if($total<=0 || $calcuold==0){
         if(!empty($uus3w['date_d']) && !empty($uus3w['date_m']) && !empty($uus3w['date_y'])){
              echo myf2($uus3w['date_d']) . " / " . myf2($uus3w['date_m']) . " / " . myf2($uus3w['date_y']);
         }


     }

      }
                ?>
           <div class="uk-width-1-1">
          <input type="date" name="dated" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="ميعاد القسط">
        </div>
  </div>
</div>

         <div class="uk-margin">
<input class="uk-button uk-button-default" type="submit" name="buttosn" uk-toggle="" value="تعديل"/>

  </div>
        <?php
      if(isset($_POST['buttosn'])){
                  if(!empty($_POST['names'])){
                         $missi = mysqli_query($mu2,"UPDATE users SET name='".myf1($_POST['names'])."' WHERE id='".myf2($_GET['i'])."'");
                  }
          if(!empty($_POST['phone'])){
                  $missi = mysqli_query($mu2,"UPDATE users SET phone='".myf1($_POST['phone'])."' WHERE id='".myf2($_GET['i'])."'");
                  }
          if(!empty($_POST['address'])){
                  $missi = mysqli_query($mu2,"UPDATE users SET address='".myf1($_POST['address'])."' WHERE id='".myf2($_GET['i'])."'");
                  }
          if(!empty($_POST['section'])){

        $m2i = mysqli_query($mu2,"SELECT * FROM sections WHERE name='".myf1($_POST['section'])."'");
              $ssw = mysqli_fetch_assoc($m2i);
              if(!empty($ssw['id'])){

        $missi = mysqli_query($mu2,"UPDATE users SET section='".myf1($ssw['id'])."' WHERE id='".myf2($_GET['i'])."'");

                     if(!empty($_POST['area'])){

               $m52i = mysqli_query($mu2,"SELECT * FROM areas WHERE name='".myf1($_POST['area'])."' AND section_id='".myf1($ssw['id'])."'");
              $ssw2 = mysqli_fetch_assoc($m52i);

              if(!empty($ssw2['id'])){


        $missi = mysqli_query($mu2,"UPDATE users SET area='".myf1($ssw2['id'])."' WHERE id='".myf2($_GET['i'])."'");
                  }else {
                     echo "
                    <script>alert('هذه المنطقة الفرعية ليس في هذه المنطقة الرئيسية');</script>
                    ";
                      }
          }
                  if(!empty($_POST['dated'])){
                       $date_sd = "";
              $date_sm = "";
              $date_sy = "";
              $nu=0;
                        //2019-03-31

                while($nu<strlen($_POST['dated'])){
                    if($nu<=3){
                      $date_sy .= $_POST['dated'][$nu];
                    }else if($nu>4 && $nu<7){
                        $date_sm .= $_POST['dated'][$nu];
                    }else if($nu>7 && $nu<10){
                        $date_sd .= $_POST['dated'][$nu];
                    }
                    $nu++;
                }
                      // date_y='".myf1($date_sy)."',
                        $mi8i = mysqli_query($mu2,"UPDATE el2st SET date_m='".myf1($date_sm)."',date_d='".myf1($date_sd)."' WHERE user_id='".$_GET['i']."'");


                      }





              }else {
                     echo "
                    <script>alert('لا توجد هذه المنطقة الرئيسية');</script>
                    ";
                      }
                  }


                if(isset($missi)){
                     header("Location: clientpage.php?i=".$_GET['i']);
                }

                  }


      ?>
        </form>
</section>
<section>
  <div uk-grid>
    <div class="uk-width-1-2">
      <h3>
         <?php
          $nummber =0;
          $nummber2 =0;
          $nummber3 =0;
            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind=''");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber += intval(myf2($uuis['total']));

            }
          $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('2st_pay')."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber2 += intval(myf2($uuis['price']));

            }
           $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('2st_mortag3')."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber3 += intval(myf2($uuis['price']));

            }
          $ttoal = $nummber - ($nummber2 + $nummber3);
          echo " قسط "." ( ".$ttoal." )";
          ?>
        </h3>
      <table class="uk-table uk-table-striped  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>التاريخ</th>
            <th>اسم المنتج</th>
            <th>الإجمالي</th>
            <th>ملاحظات</th>
            <th>الحالة</th>
            <th>تعديل / حذف</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $nunumb=0;
            $tex="";
            $mii = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='' OR user_id='".$_GET['i']."' AND kind='".myf1('2st_pay')."' OR user_id='".$_GET['i']."' AND kind='".myf1('2st_mortag3')."'");
            while($uus = mysqli_fetch_assoc($mii)){
                $totall =  (intval(myf2($uus['price'])) * intval(myf2($uus['useful'])) / 100) + intval(myf2($uus['price']));
                if($nunumb==0){
                    $note = myf2($uus['notes']);
                }

                if($uus['kind']==myf1('2st_mortag3')){
                      $tex=' <td> '.myf2($uus['notes']).' </td>
            <td> <span class="refundinststatus"> مرتجع </span></td>';
                }else if($uus['kind']==myf1('2st_pay')){
                     $tex=' <td> '.myf2($uus['notes']).' </td>
            <td> <span class="payinststatus">  دفع قسط </span></td>';
                }else if($uus['kind']==""){
                    $tex=' <td> '.$note.' </td>
            <td> <span class="inststatus">  قسط جديد</span></td>';
                }
                $nunumb++;
            echo '

          <tr class="table__row">
            <td>'.myf2($uus['date_today']).'</td>
            <td>'.myf2($uus['product_name']).'</td>
            <td>'.$totall.'</td>
           '.$tex;
                if($tex==' <td> '.$note.' </td>
            <td> <span class="inststatus">  قسط جديد</span> </td>'){
                   echo '<td>
                   <a class="uk-button uk-button-default" name="button" href="addeditinstallment.php?in='.myf1($uus['id']).'&i='.$_GET['i'].'" uk-toggle=""> تعديل</a>
            </td>';
                }else {
                    echo '<td></td>';

                }
            echo '

          </tr>
            ';
            }
            ?>
        </tbody>
      </table>

      <div class="" uk-grid>
        <div class="uk-width-1-4">
       <button class="uk-button uk-button-default uk-width-expand" type="button" name="button" href="#new_installment" uk-toggle=""> قسط جديد </button>
        </div>
        <div class="uk-width-1-4">
                 <button class="uk-button uk-button-default uk-width-expand" type="button" name="button" href="#pay_installment" uk-toggle> دفع قسط </button>
        </div>
        <div class="uk-width-1-4">
        <button class="uk-button uk-button-default uk-width-expand" type="button" name="button" href="#refund" uk-toggle=""> مرتجعات </button>
        </div>
        <div class="uk-width-1-4">
          <a class="uk-button uk-button-default" href="tabels.php?in=110&i=<?php echo $_GET['i']; ?>"> طباعة </a>
        </div>
      </div>
    </div>





    <div class="uk-width-1-2">
      <h3>
           <?php
          $nummbers =0;
            $nummber2 =0;
            $nummber3 =0;
    $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash')."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummbers += intval(myf2($uuis['total']));

            }

             $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash_pay')."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber2 += intval(myf2($uuis['price']));

            }

            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash_mortag3')."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber3 += intval(myf2($uuis['price']));

            }

          $tttoal = $nummbers - ($nummber2 + $nummber3);
          echo " كاش "." ( ".$tttoal." )";
          ?>
        </h3>
      <table class="uk-table uk-table-striped  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>التاريخ</th>
            <th>اسم المنتج</th>
            <th>الإجمالي</th>
            <th>ملاحظات</th>
            <th>الحالة</th>
            <th>تعديل / حذف</th>
          </tr>
        </thead>
        <tbody>
               <?php
            $tex="";
            $miis = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".$_GET['i']."' AND kind='".myf1('cash_mortag3')."' OR user_id='".$_GET['i']."' AND kind='".myf1('cash_pay')."' OR user_id='".$_GET['i']."' AND kind='".myf1('cash')."'");
            while($uusw = mysqli_fetch_assoc($miis)){
                $totall =  (intval(myf2($uusw['price'])) * intval(myf2($uusw['useful'])) / 100) + intval(myf2($uusw['price']));

                 if($uusw['kind']==myf1('cash_mortag3')){
                   $tex='<span class="refundinststatus"> مرتجع </span>';
                }else if($uusw['kind']==myf1('cash_pay')){
                  $tex='<span class="payinststatus"> دفع كاش </span>';
                }else if($uusw['kind']==myf1('cash')){
                    $tex='<span class="inststatus"> كاش </span>';
                }

            echo '

          <tr class="table__row">
            <td>'.myf2($uusw['date_today']).'</td>
            <td>'.myf2($uusw['product_name']).'</td>
            <td>'.$totall.'</td>
            <td> '.myf2($uusw['notes']).' </td>
            <td> '.$tex.' </td>
          ';
         if($tex=="<span class="inststatus"> كاش </span>"){
                   echo '<td>
                   <a class="uk-button uk-button-default" name="button" href="addeditinstallment.php?ic='.myf1($uusw['id']).'&i='.$_GET['i'].'" uk-toggle=""> تعديل</a>
            </td>';
                }else {
                    echo '<td></td>';

                }
          echo '</tr>
            ';
            }
            ?>


        </tbody>
      </table>
      <div class="" uk-grid>
        <div class="uk-width-1-4">
          <button class="uk-button uk-button-default uk-width-expand" type="button" name="button" href="#new_installmentss" uk-toggle> كاش جديد </button>
        </div>
        <div class="uk-width-1-4">
          <button class="uk-button uk-button-default uk-width-expand" type="button" name="button" href="#pay_installment_cash" uk-toggle> دفع كاش </button>
        </div>
        <div class="uk-width-1-4">
          <button class="uk-button uk-button-default uk-width-expand" type="button" name="button"  href="#refund2" uk-toggle> مرتجعات </button>
        </div>
        <div class="uk-width-1-4">
          <a class="uk-button uk-button-default" href="tabels.php?ic=110&i=<?php echo $_GET['i']; ?>"> طباعة </a>
        </div>
      </div>
    </div>



        </div>


</section>
<?php include'footer.php'; ?>
