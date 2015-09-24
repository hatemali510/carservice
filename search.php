<?php
	require_once 'core/init.php';
	$user=new user();
	$mess='';
	if(input::get('search'))
	{
		$searchq=input::get('search');
		if($user->find($searchq)){
			$mess="found";
			
		}
		else{
			$mess="not found";
		}
	}
?>
<?php include 'includes/ad_head.php';?> 
<div class="container">
   <div class="jumbotron">
      
  
<form action="search.php" method="post"> 
<label for="exampleInputName2">Name or Id </label>
    <input type="text" class="form-control" name="search" id="search" placeholder="search">
      <button type="submit" class="btn btn-default">search</button><br>

  
<?php echo $mess;
	
 ?> 
</form> 
 </div>
</div>
</body>
</html>
