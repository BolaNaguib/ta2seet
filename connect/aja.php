<?php
session_start();
ob_start();

require_once "confi.php";
require_once "secri.php";

if(!empty($_GET['a']) && !empty($_GET['s'])){
                
             $erty_Area = $_GET['a'];
             $erty_section = $_GET['s'];
             $u_ser = $_GET['u'];
    $erty_Area = str_replace("'","",$erty_Area);
    $erty_section = str_replace("'","",$erty_section);
    $u_ser = str_replace("'","",$u_ser);
    
               
             $mss = mysqli_query($mu2,"SELECT * FROM users WHERE name LIKE '%".myf1($u_ser)."%' AND section='".$erty_section."' AND area='".$erty_Area."' ORDER BY id DESC");
               $nuu=1;
                while($mmu = mysqli_fetch_assoc($mss)){
      if(!empty($mmu['id'])){
                        
                     $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($mmu['area'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);
       
            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($mmu['section'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);
                    
                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
                         $nnus=0;
                   $nummber =0;
          $nummber2 =0;
            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber += intval(myf2($uuis['total']));
                
            }
             $misi = mysqli_query($mu2,"SELECT * FROM pays WHERE client_id='".myf1($mmu['id'])."' AND el2st_or_cash='".myf1("2st")."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber2 += intval(myf2($uuis['price']));
                
            }
          
          $ttoal = $nummber - $nummber2;
         
                    
                    echo '
            
          <tr class="table__row">
            <td>'.$nuu.'</td>
            <td><a href="clientpage.php?i='.myf1($mmu['id']).'"> '.myf2($mmu['name']).' </a></td>
            <td> '.myf2($m122mu['name']).'</td>
            <td>'.$ttoal.'</td>

            ';
                    
            
                  if($ttoal>0){
                      echo '<td><a class="uk-button uk-button-default" name="button" href="pay.php?i='.myf1($mmu['id']).'" uk-toggle=""> دفع القسط</a></td>
                      <td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'" uk-toggle=""> حذف</a></td>
          </tr>
            ';
                  }else {
                      
                       echo '
                       <td></td>
                       <td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'" uk-toggle=""> حذف</a></td></tr>';
                  }
               
                 
            
                  
                 }
                      $nuu++;
                }
     
         }else {
        $nuu=0;
     
             $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($_GET['i'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);
       
            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($m122mu['section_id'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);
               
             $mss = mysqli_query($mu2,"SELECT * FROM users WHERE area='".$_GET['i']."' AND section='".$m122mu['section_id']."' ORDER BY id DESC");
               $nuu=1;
                while($mmu = mysqli_fetch_assoc($mss)){
                    
                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
                    $nnus=0;
                     
          $nummber =0;
          $nummber2 =0;
            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber += intval(myf2($uuis['total']));
                
            }
             $misi = mysqli_query($mu2,"SELECT * FROM pays WHERE client_id='".myf1($mmu['id'])."' AND el2st_or_cash='".myf1("2st")."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber2 += intval(myf2($uuis['price']));
                
            }
          
          $ttoal = $nummber - $nummber2;
         
                       echo '
            
          <tr class="table__row">
            <td>'.$nuu.'</td>
            <td><a href="clientpage.php?i='.myf1($mmu['id']).'"> '.myf2($mmu['name']).' </a></td>
            <td> '.myf2($m122mu['name']).' </td>
            <td>'.$ttoal.'</td>

            ';
                    
            
                  if($ttoal>0){
                    echo '<td><a class="uk-button uk-button-default" name="button" href="pay.php?i='.myf1($mmu['id']).'" uk-toggle=""> دفع القسط</a></td>
                     <td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'" uk-toggle=""> حذف</a></td>
          </tr>
            ';
                  }else {
                       echo ' <td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'" uk-toggle=""> حذف</a></td></tr>';
                  }
               
           
                    
                    $nuu++;
                }
            
}

?>