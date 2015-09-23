
 <pre>
 <link rel="stylesheet" type="text/css" href="css/bodyCss.css">
 <div id="body">
 
 
 <h1 style="color:red;text-align:center">Your Cart</h1>
 
 <table class="table table-striped table-bordered" border="2">
  <thead>
    <tr>
      <th>Product_Id</th>
      <th>Product_Name</th>
      <th>Price</th>
	   <th>Image name</th>
	   <th>Image_path</th>
      <th>Description </th>
 
	  
    </tr>
  </thead>

  
	<?php
		#session_start();
		$var=$_REQUEST["key"];
		
		$_SESSION['key']=$var;
		$price=0;

	#print_r($_POST);

	
	#print_r ($var);
	
	
	$arra=[];
	
	$arra=array(explode(";",$_SESSION['key']));
	
	
	
	
	
	


  
 echo '<tr>';
 foreach ($arra as $booking) 
 {
  #print_r($booking);
  $temp=$booking;
  
  
  $a=implode(",",$temp);
  $temp=explode(",",$a);
  
 # print_r($temp);
  
	$cnt=0;
     foreach ($temp as $booking2) 
	 {
	 
	 $cnt++;
	 #print_r($booking2);
        
		
		#echo $cnt;
	
		if($cnt==3)
		{
			$price+=$booking2;
		}
		
		
		
		if($cnt==5)
		{
		echo "<td>";
		echo '<img src="'.$booking2.'" alt="images" >';
		echo "</td>";
		
		}
		else
		{		
		echo "<td>".$booking2."</td>";
		}	
			
		if($cnt==6)
		{
		echo "</tr>";
		echo "<tr>";
		$cnt=0;
		}
		
		
	}
	
}
	
	echo "</tr>";
  
	
		//session_destroy();
	
	
?>
<tr>

<td colspan="5"><h4 style="color:blue;text-align:center">Total Price</h4></td>
<td><h4 style="color:blue;text-align:center"><?php  echo $price;?></h4></td>
</tr>
</table>

<!-- <form action="OrderSummeryPageIncluded.php" method="POST"> -->
<form action="Summary.php" method="POST">
  <input type="submit" value="Submit"/>
  <input type="button" value="Cancel"/>
 
</form>


</div>
 </pre>


