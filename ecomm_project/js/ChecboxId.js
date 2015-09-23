$( document ).ready(function() {
var Carts=[];
var selectedCart;

    console.log("Javascript Ready");
    $('#submitCart').click(function(){
		alert('submit clicked');
		console.log("click");
		
        $(".items:checked").each(function() {
         
		    var  sThisVal = (this.checked ? $(this).val() : "");
		   Carts.push(sThisVal);
		   //selectedCart=Carts.join(';');
		   //alert(sThisVal);
		   //alert(selectedCart);
		  
			alert(Carts);
		   
        });
			window.location="AddToCartPageIncluded.php?key="+Carts;
    });
	 
});
