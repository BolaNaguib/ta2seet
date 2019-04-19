<?php
session_start();
ob_start();
include'header.php';

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_SESSION['didi'])){
    header("Location: index.php");
}

$mss = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
               $nuu=1;
                $mmu = mysqli_fetch_assoc($mss);

                     $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($mmu['area'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);

            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($mmu['section'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);

                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);



         function mydate($y1,$m1,$d1,$y2,$m2,$d2){
    $arat=array();
    if($y1==$y2){
        if($m2==$m1){
           if($d1<$d2){
                while($d1<=$d2){
                    array_push($arat,"%$y1 : $m2 : $d1%");
                $d1++;
            }
           }
        }else if($m2>$m1){
            $total1 = $m2 - $m1;
        if($total1==1){
            $total_d = (31 - $d1) + $d2+$d1;
//            echo $total_d."<br>";
            while($m1<=$m2){
                 while($d1<=$total_d){
               if($d1<=31){
                    array_push($arat,"%$y1 : $m1 : $d1%");
               }else if($d1==32){
                 $d1=0;
                   $total_d -= 31;
                   $m1++;
               }
                $d1++;
            }
                $m1++;
            }

        }else if($total1>1){
               $total_d = (( 31 * $total1) - $d1) + $d2+$d1;
//            echo $total_d."<br>";
            while($m1<=$m2){
                 while($d1<=$total_d){
               if($d1<=31){
                    array_push($arat,"%$y1 : $m1 : $d1%");
               }else if($d1==32){
                 $d1=0;
                   $total_d -= 31;
                   $m1++;
               }
                $d1++;
            }
                $m1++;
            }
        }

            }
        }
    return $arat;
    }
    function myda($art){
        $num=0;
        while($num<count($art)){
//            $str = $art[$num];
            $art[$num] = str_replace(": 1 :",": 01 :",$art[$num]);
            $art[$num] = str_replace(": 2 :",": 02 :",$art[$num]);
            $art[$num] = str_replace(": 3 :",": 03 :",$art[$num]);
            $art[$num] = str_replace(": 4 :",": 04 :",$art[$num]);
            $art[$num] = str_replace(": 5 :",": 05 :",$art[$num]);
            $art[$num] = str_replace(": 6 :",": 06 :",$art[$num]);
            $art[$num] = str_replace(": 7 :",": 07 :",$art[$num]);
            $art[$num] = str_replace(": 8 :",": 08 :",$art[$num]);
            $art[$num] = str_replace(": 9 :",": 09 :",$art[$num]);

               $art[$num] = str_replace(": 1%",": 01%",$art[$num]);
            $art[$num] = str_replace(": 2%",": 02%",$art[$num]);
            $art[$num] = str_replace(": 3%",": 03%",$art[$num]);
            $art[$num] = str_replace(": 4%",": 04%",$art[$num]);
            $art[$num] = str_replace(": 5%",": 05%",$art[$num]);
            $art[$num] = str_replace(": 6%",": 06%",$art[$num]);
            $art[$num] = str_replace(": 7%",": 07%",$art[$num]);
            $art[$num] = str_replace(": 8%",": 08%",$art[$num]);
            $art[$num] = str_replace(": 9%",": 09%",$art[$num]);


            $num++;
        }
        return $art;
    }

?>
<section>
  <b> إظهار البيانات  </b>
<form method="post">

      <span> من </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="fromdate" placeholder="ميعاد القسط">
  <span> إلى </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="todate" placeholder="ميعاد القسط">

<input type="submit" class="uk-button uk-button-default" type="submit" name="search" value="بحث"/>
    </form>
<?php

    if(isset($_POST['search'])){
        if(!empty($_POST['todate']) && !empty($_POST['fromdate'])){

           $date_fd = "";
              $date_fm = "";
              $date_fy = "";
      $date_td = "";
              $date_tm = "";
              $date_ty = "";

echo '    <div class="uk-margin">
    <b>من :</b><span>'.$_POST['fromdate'].'</span>
    <b>الي :</b><span>'.$_POST['todate'].'</span>


    </div>';

         $nu=0;
                        //2019-04-02
                     $texdate = myf2($_POST['fromdate']);
                while($nu<strlen($texdate)){
                    if($nu<4){
                      $date_fy .= $texdate[$nu];
                    }else if($nu>4 && $nu<7){
                        $date_fm .= $texdate[$nu];
                    }else if($nu>7){
                        $date_fd .= $texdate[$nu];
                    }
                    $nu++;
                }
                  $nu=0;
                        //2019 : 04 : 02
                     $texdate = myf2($_POST['todate']);
                while($nu<strlen($texdate)){
                    if($nu<4){
                      $date_ty .= $texdate[$nu];
                    }else if($nu>4 && $nu<7){
                        $date_tm .= $texdate[$nu];
                    }else if($nu>7){
                        $date_td .= $texdate[$nu];
                    }
                    $nu++;

                }

        $total_m = $date_tm - $date_fm;
        $total_y = $date_ty - $date_fy;
$aee = mydate($date_fy,$date_fm,$date_fd,$date_ty,$date_tm,$date_td);
    $arra = myda($aee);

          $nuuum=0;
       $el2sts =0;
                        $backs = 0;
                        $cashs =0;
           $Arrr = mysqli_query($mu2,"SELECT * FROM areas ORDER BY id DESC");
            while($Arrr2 = mysqli_fetch_assoc($Arrr)){
                      $sect = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($Arrr2['section_id'])."'");
           $sec = mysqli_fetch_assoc($sect);
        $nuuum++;
               $el2st =0;
                        $back = 0;
                        $cash =0;
 $userrs = mysqli_query($mu2,"SELECT * FROM users WHERE area='".myf1($Arrr2['id'])."'");
            while($userrs2 = mysqli_fetch_assoc($userrs)){
    $nnswuww = 0;



            while($nnswuww<count($arra)){
             $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_pay")."' AND date_today LIKE '".myf1($arra[$nnswuww])."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){
                $el2st = $el2st + intval(myf2($treu1['price']));
               }

            }




                       $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_pay")."' AND date_today LIKE '".myf1($arra[$nnswuww])."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $cash = $cash + intval(myf2($treu1['price']));
               }

            }
     $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND date_today LIKE '".myf1($arra[$nnswuww])."' AND kind='".myf1("2st_mortag3")."' OR user_id='".myf1($userrs2['id'])."' AND date_today LIKE '".myf1($arra[$nnswuww])."' AND kind='".myf1("cash_mortag3")."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $back = $back + intval(myf2($treu1['price']));

               }

            }


              $nnswuww++;
        }

        }
                      $el2sts+=$el2st;
                $cashs+=$cash;
                $backs+=$back;
            }
//          $el2sts=$el2sts/4;
//                $cashs=$cashs/4;
//                $backs=$backs/4;
            $toss = ($el2sts + $cashs ) - $backs;

        echo '
         <div class="uk-margin">
       <b>تم دفع للقسط :</b><span>'.$el2sts.'</span>
 <b>تم دفع للكاش :</b><span>'.$cashs.'</span>
    <b>مرتجعات :</b><span>'.$backs.'</span>

    <b>الباقي :</b><span>'.$toss.'</span>
  </div>
       ';


    $nuuum=0;

                     echo '
          <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table uk-table-striped uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>القسم</th>
            <th>المنطقة</th>
            <th>كاش</th>
            <th>قسط</th>
            <th>مرتجع</th>
            <th>الباقي</th>
            <th>تقارير</th>
            <th>تقارير مفصلة</th>

          </tr>
        </thead>

        <tbody>
        ';

           $Arrr = mysqli_query($mu2,"SELECT * FROM areas ORDER BY id DESC");
            while($Arrr2 = mysqli_fetch_assoc($Arrr)){
                      $sect = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($Arrr2['section_id'])."'");
           $sec = mysqli_fetch_assoc($sect);
        $nuuum++;
               $el2st =0;
                        $back = 0;
                        $cash =0;
 $userrs = mysqli_query($mu2,"SELECT * FROM users WHERE area='".myf1($Arrr2['id'])."'");
            while($userrs2 = mysqli_fetch_assoc($userrs)){
    $nnswuww = 0;



            while($nnswuww<count($arra)){
             $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_pay")."' AND date_today LIKE '".myf1($arra[$nnswuww])."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){
                $el2st = $el2st + intval(myf2($treu1['price']));
               }

            }




                       $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_pay")."' AND date_today LIKE '".myf1($arra[$nnswuww])."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $cash = $cash + intval(myf2($treu1['price']));
               }

            }
     $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND date_today LIKE '".myf1($arra[$nnswuww])."' AND kind='".myf1("2st_mortag3")."' OR user_id='".myf1($userrs2['id'])."' AND date_today LIKE '".myf1($arra[$nnswuww])."' AND kind='".myf1("cash_mortag3")."'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $back = $back + intval(myf2($treu1['price']));

               }

            }


              $nnswuww++;
        }
        }

                  $tos = ($el2st + $cash ) - $back;

                $cashs = $cashs + $cash;
                $el2sts = $el2sts+$el2st;
                $backs = $backs +$back;

                 echo '

          <tr class="table__row">
            <td>'.$nuuum.'</td>
            <td>'.myf2($sec['name']).'</td>
            <td>'.myf2($Arrr2['name']).'</td>
            <td>'.$cash.'</td>
              <td>'.$el2st.'</td>
            <td>'.$back.'</td>
            <td>'.$tos.'</td>
            <td><a class="uk-button uk-button-default" name="button" href="reports.php?i='.myf1($Arrr2['id']).'" uk-toggle=""> تقارير</a></td>
            <td><a class="uk-button uk-button-default" name="button" href="reports_m.php?i='.myf1($Arrr2['id']).'" uk-toggle=""> تقارير مفصلة</a></td>

          </tr>
            ';
            }
      echo '
               </tbody>
      </table>
    </div>
  </div>
    ';






        }
    }else {
       $date_today = date("Y : m : d");


      $nuuum=0;
       $el2sts =0;
                        $backs = 0;
                        $cashs =0;
           $Arrr = mysqli_query($mu2,"SELECT * FROM areas ORDER BY id DESC");
            while($Arrr2 = mysqli_fetch_assoc($Arrr)){
                      $sect = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($Arrr2['section_id'])."'");
           $sec = mysqli_fetch_assoc($sect);
        $nuuum++;

 $userrs = mysqli_query($mu2,"SELECT * FROM users WHERE area='".myf1($Arrr2['id'])."' ORDER BY id DESC");
            while($userrs2 = mysqli_fetch_assoc($userrs)){
    $el2st =0;
                        $back = 0;
                        $cash =0;
        $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_pay")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){
                $el2st += intval(myf2($treu1['price']));
                   echo $el2st."<br>";

    }

            }




                       $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_pay")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $cash = $cash + intval(myf2($treu1['price']));

               }

            }
     $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_mortag3")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
                $back = $back + intval(myf2($treu1['price']));
            }

             $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_mortag3")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
                $back = $back + intval(myf2($treu1['price']));

            }
                $el2sts+=$el2st;
                $cashs+=$cash;
                $backs+=$back;
        }
            }


            $toss = ($el2sts + $cashs ) - $backs;

        echo '
         <div class="uk-margin">
       <b>تم دفع للقسط :</b><span>'.$el2sts.'</span>
 <b>تم دفع للكاش :</b><span>'.$cashs.'</span>
    <b>مرتجعات :</b><span>'.$backs.'</span>

    <b>الباقي :</b><span>'.$toss.'</span>
  </div>
       ';



    $nuuum=0;

                     echo '
          <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>القسم</th>
            <th>المنطقة</th>
            <th>كاش</th>
            <th>قسط</th>
            <th>مرتجع</th>
            <th>الباقي</th>
            <th>تقارير</th>
            <th>تقارير مفصلة</th>

          </tr>
        </thead>

        <tbody>
        ';

           $Arrr = mysqli_query($mu2,"SELECT * FROM areas ORDER BY id DESC");
            while($Arrr2 = mysqli_fetch_assoc($Arrr)){
                      $sect = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($Arrr2['section_id'])."'");
           $sec = mysqli_fetch_assoc($sect);
        $nuuum++;
               $el2st =0;
                        $back = 0;
                        $cash =0;
 $userrs = mysqli_query($mu2,"SELECT * FROM users WHERE area='".myf1($Arrr2['id'])."'");
      while($userrs2 = mysqli_fetch_assoc($userrs)){


             $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_pay")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){
                $el2st = $el2st + intval(myf2($treu1['price']));

               }

            }




                       $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_pay")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
               if(!empty($treu1['id'])){

                $cash = $cash + intval(myf2($treu1['price']));

               }

            }
     $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("2st_mortag3")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
                $back = $back + intval(myf2($treu1['price']));

            }
                $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($userrs2['id'])."' AND kind='".myf1("cash_mortag3")."' AND date_today LIKE '%".myf1($date_today)."%'");
            while($treu1 = mysqli_fetch_assoc($s835wa)){
                $back = $back + intval(myf2($treu1['price']));

            }
         // OR kind='".myf1("cash_mortag3")."'

                $el2sts+=$el2st;
                $cashs+=$cash;
                $backs+=$back;
        }

                  $tos = ($el2st + $cash ) - $back;

                $cashs = $cashs + $cash;
                $el2sts = $el2sts+$el2st;
                $backs = $backs +$back;

                 echo '

          <tr class="table__row">
            <td>'.$nuuum.'</td>
            <td>'.myf2($sec['name']).'</td>
            <td>'.myf2($Arrr2['name']).'</td>
            <td>'.$cash.'</td>
              <td>'.$el2st.'</td>
            <td>'.$back.'</td>
            <td>'.$tos.'</td>
  <td><a class="uk-button uk-button-default" name="button" href="reports.php?i='.myf1($Arrr2['id']).'" uk-toggle=""> تقارير</a></td>
            <td><a class="uk-button uk-button-default" name="button" href="reports_m.php?i='.myf1($Arrr2['id']).'" uk-toggle=""> تقارير مفصلة</a></td>
          </tr>
            ';
            }
      echo '
               </tbody>
      </table>
    </div>
  </div>
    ';
    }
    ?>
</section>
