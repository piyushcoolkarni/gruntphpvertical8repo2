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
<?php include "Header.php";?>


	<?php	include "Navigation.php";?>
<h2>
<form style="text-align:center" action="Product.php" enctype="multipart/form-data" method="post">
<div id="add_product">
<pre>
<b>Product Name: </b><input type="text" name="product_name" id="pn" /></br>
<b>Price       : </b><input type="text" name="price" id="price" /></br>
<b>Image Name  : </b><input type="text" name="image_name" id="in" /></br>
<b>Image Path  : </b><input type="file" name="image_path"></br>
<b>Description : </b><textarea name="description" rows="10" cols="25"></textarea></br>
<input type="submit" value="Add/Update" />
<input type="hidden" name="operation" value="add"/>
  <button type="button" onclick="newDoc()">Cancel</button>
<pre>
</div>

</form>
</h2>
<?php include "footer.php";?>
</body>
</html>

