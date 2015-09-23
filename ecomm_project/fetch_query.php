<?php include "Helper.php"; 
$product_id=$_REQUEST['update'];
//echo $product_id;
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/scriptFunction.js">
</script>
<script>
function newDoc() {
    window.location.assign("ProductViewPage.php")
}
</script>
	<link type="text/css" rel="stylesheet" href="css/header.css"/>	
	<link type="text/css" rel="stylesheet" href="css/styleView.css"/>	
	<link type="text/css" rel="stylesheet" href=".css/styleViewTable.css"/>


</head>


<body>
<!--<div id="header">
<table style="width:100%">
  <tr>
	<td><h2 style="color:white"><A href="url">HOME</A></h2></td>
    <td><h2><a href="url1"> View Product </a></h2></td>
	
   	<td><h2><a href="url2"> Add/Update Product</a></h2></td>
	
	<td><h2><a href="url3"> Logout</a></h2></td>
	-->
	<?php include "Header.php";?>


	<?php	include "Navigation.php";?>
  
    		

  </tr>
</table>
</div>
<h2>
<form style="text-align:center" action="Product.php" enctype="multipart/form-data" method="post">
<div id="add_product">
<pre>
 <?php
 $product_id=$_REQUEST['update'];
 $result=$helper->read_record("*","product_details","product_id='$product_id'"); // For all records
				if(is_array($result))
				{
					foreach($result as $row)
					{
						
?>
					<input type="hidden" name="product_id" id="pn"  value="<?php echo $row['product_id'];?>" /></br>
<b>Product Name: </b><input type="text" name="product_name" id="pn"  value="<?php echo $row['product_name'];?>" /></br>
<b>Price:  </b>      <input type="text" name="price" id="price"  value="<?php  echo $row['price']; ?>" /></br>
<b>Image Name: </b>  <input type="text" name="image_name" id="in"  value="<?php echo  $row['image_name']; ?>" /></br>
<b>Image Path: </b>  <input type="file" name="image_path"  value="<?php echo $row['image_path']; ?>"></br>
<!--<b>Description : </b><textarea name="description" rows="10" cols="25" value="<?php echo $row['description']; ?>"></textarea></br>-->
<b>Description: </b> <textarea rows="10" cols="25"name="description" value="<?php echo $row['description']; ?>"></textarea></br>
	<?php
		}
	}
	?>
<input type="submit" value="UPDATE" /> <input type="hidden" name="operation" value="update"/> <button type="button" onclick="newDoc()">Cancel</button> <input type="reset" value="Reset">
<pre>
</div>

</form>
</h2>

</body>
</html>

