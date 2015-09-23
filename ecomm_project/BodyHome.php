<?php
#session_start();
include "html/BodyHomeHtml.html";
include "Helper.php";

echo ' <div id="body"> ' ;






$helperObj=new Helper("ecomm");
$fields="'product_id','product_name','price','image_name','image_path','description'";

$resultSet=$helperObj->read_all("*","product_details");

if(is_array($resultSet))
{

   echo '<form method="POST">';
   
   
echo '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"> ';

?>

    <thead>
            <tr>
                <th>product_id</th>
                <th>image</th> 
                <th>price</th>
                <th>productname</th>
                <th> descreption</th>
                <th>Checkbox</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>product_id</th>
              <th>image</th> 
                <th>price</th>
                <th>productname</th>
                <th>descreption</th>
                <th>Checkbox</th>
            </tr>
        </tfoot>









<?php



	foreach($resultSet as $row)
	{
		
		
		?>

    
        <tbody>
		
		
		
		
		<tr>
				<td width="60"><b><?=$row['product_id'] ?></b></td>
                <td width="30" ><img src='<?=$row["image_path"]?>' width=150px height=150px></td> <!-- columns can have both text and images -->
								<td width="30" ><?=$row['price'] ?>              </td>
								<td width="60" ><b><?=$row['product_name'] ?></b></td>
						    	<td width="120" ><?=$row['description'] ?>        </td>
              
<?php			  echo ' <td width="10"><input type="checkbox" class="items" name="cartarr[]" value="'.implode(",",$row).'"></td> ';
           echo ' </tr> ';
           
       echo ' </tbody> ';
 
		
		?>
		
		
		
		
		
		
	<?php	

	
	}
	  echo ' </table> ';
	
	echo '<input type="button" name="cartarr" id="submitCart" value="Add To Cart">';
	
	echo '</form>';
	
	
}

?>




