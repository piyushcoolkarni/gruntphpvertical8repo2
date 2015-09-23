<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/scriptFunction.js">
		
		</script>
	<link type="text/css" rel="stylesheet" href="css/header.css"/>	
	<link type="text/css" rel="stylesheet" href="css/styleView.css"/>	
	<link type="text/css" rel="stylesheet" href=".css/styleViewTable.css"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src="../js/adminLoginValidate.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../css/Signin.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//include('Helper.php');
//working priya...wahh this is it!!!!!
include('Helper_page.php');

include "Header.php";


include "Navigation.php";

$tbl_name="product_details";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query =$helper->read_all("COUNT(*)","product_details");
	if(is_array($query))
	{
		foreach($query as $row)
		{
	       $total_pages = $row['COUNT(*)'];
		    
		   
		}
	}
	/* Setup vars for query. */
	$targetpage = "ProductViewPage.php"; 	//your file name  (the name of this file)
	$limit = 3; 								//how many items to show per page
	$page = $_REQUEST['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	?>
	
		
						<div class="container">
						<?php 
						echo "<table align='left' width=90%>";
						
						?>
	<tr>
   						    <th width="80" class="ab">Image</th>
    						<th width="60" class="ab">Product Name</th>
    						<th width="30" class="ab">Price</th>
   						    <th width="80" class="ab">Description</th>
    						<th width="30" class="ab">Product ID</th>
    						<th width="10" class="ab">Select</th>
    						<br/>
 					    </tr>
						<?php
	/* Get data. */
	$sql =$helper_page->read_page("*","product_details","LIMIT $start,$limit");
	
	if(is_array($sql))
	{
		foreach($sql as $row)
		{
	      $product_id=$row['product_id'];
							
							
							
							?>
						
								<td width="" class="ab"><img src='<?=$row["image_path"]?>' width=150px height=150px></td> <!-- columns can have both text and images -->
								<td width="60" class="ab"><b><?=$row['product_name'] ?></b></td>
						    	<td width="30" class="ab"><?=$row['price'] ?>              </td>
								<td width="80" class="ab"><?=$row['description'] ?>        </td>
								<td width="30" class="ab"><?=$row['product_id'] ?>         </td>
								<td width="80" class="ab">
                           
						   
						   <input type="button" value="DELETE" onClick='delete_product("<?=$row['product_id'] ?>")'/>
						   <input type="button" value="UPDATE" onClick='update_product("<?=$row['product_id'] ?>")'/>
						       </td>
							<input type="hidden" name="page" value="2" />	<br/>	
				            </tr>
					   
					    <?php     
						}
						echo "</table>";
						
					}	?>

<?php					
		    		   
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
?>
</div>
<?=$pagination?>
<?php include "footer.php";?>

</body>
</html>
