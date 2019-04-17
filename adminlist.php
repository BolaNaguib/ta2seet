<?php
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_SESSION['didi']) || empty($_SESSION['ta2_admin'])){
    header("Location: index.php");
}

 ?>
<section>



<a href="adduser.php"> add</a>
  <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>الإسم</th>
<th>المناطق</th>
<th>تعديل / حذف </th>
          </tr>
        </thead>
        <tbody>
         <?php
            $utn = 0;
                 $s2rw = mysqli_query($mu2,"SELECT * FROM worker WHERE ta2_admin='' ORDER BY id DESC");
            while($s2tw = mysqli_fetch_assoc($s2rw)){
                
//                echo "<hr>".myf1($s2tw['id'])."<br>";
                $text="";
                $s2we = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".myf1($s2tw['id'])."'");
                
            while($sectw = mysqli_fetch_assoc($s2we)){
                   
                 $s2wwe = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($sectw['section_id'])."'");
               
            $sect = mysqli_fetch_assoc($s2wwe);
                
                   if(strlen($text)>0){
                    $text.=",".myf2($sect['name']);
               }else if(strlen($text)==0){
                    $text.=myf2($sect['name']);
               }
            }
            $utn++;
            echo '
             <tr class="table__row">
            <td>'.$utn.'</td>
            <td> '.myf2($s2tw['name']).'</td>
            <td>'.$text.'</td>
<td><a href="adduser.php?up='.myf1($s2tw['id']).'"> edit</a></td>
          </tr>
            
            ';
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include'footer.php'; 

?>
