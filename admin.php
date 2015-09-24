<?php
require_once 'core/init.php';
$a=array(0);
$user=new user();
if(!$user->isLoggedIn() && !$user->hasPermission('admin')){
	Redirect::to('login.php');
}

if($user->hasPermission('admin') || $user->hasPermission('sadmin')){
?>
<?php include 'includes/ad_head.php' ;?> 
<div class="container-fluid">
      <div class="row">
        <div class="jumbotron">
 <center><p>For your Web Privacy You must<a href="logout.php"> Logout</a> Before close the Admin Panel </p></center>
  </div>

        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="pdfcontrol.php">Reports <span class="sr-only">(current)</span></a></li>
           <li> <a href="add.php"><b>Add</b></a></li>
          </ul>
          <ul class="nav nav-sidebar">
           <li> <a href="javascript:showOrHide('list');"><b>List</b></a></li>
            <li><a href="userProfile.php">profile</a></li>
            <li> <a href="search.php">Search user </a>
          </ul>
        </div> 
          
            
<br/>
<br/><br/>


<div id="list" style="display: none">
<?php 
    $us=DB::getInstance()->get('users',array(0));
    if($us->count()){
      ?>
      <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>#id</th>
                <th>username</th>
                <th>name</th>
                <th>Joined</th>
                <th>update</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
      foreach ($us->results() as $u) {
          $a[$i]=$i;
        ?>
               
             <tr>
                <td><?php echo $u->id;?></td>
                <td><?php echo $u->username;?></td>
                <td><?php echo $u->name;?></td>
                <td><?php echo $u->joined;?></td>
                <td><a href='update.php?id=<?php echo $u->id;?>'>update </a></td>
                <?php
                if($user->hasPermission('sadmin')){
                                                  ?>
                <td><a href='delete.php?id=<?php echo $u->id;?>'>Delete</a></td>
                <?php } ?>
               </tr>
      <?php
      $i++; 
    }
      echo "<br>";
      
    }
?>
</tbody>
</table>
<center><a href="admin.php"> Clear</a></center>
</div>
</div>
</div>
        
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
<?php } 
else if($user->isLoggedIn() && !$user->hasPermission('admin')){
  Redirect::to('includes/errors/404.php');
}
?>