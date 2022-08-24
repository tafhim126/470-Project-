<?php

session_start();

//include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>
  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">shop</span> 

      </div>
      <style>
        form{
          color: blue;
        }
      </style> 
      <form action="" method="post" >
          <input type="text" name="search_name" placeholder="product-name" >

          <input type="submit" name="search" value="search" class="btn btn-info">

      </form>

      

      <p class="nero__text">
      </p>
    </div>
  </main> 

<!-- 
<?php


     $con =mysqli_connect("localhost","root","","ecom_store");
     //error_reporting(0);
  if(!$con){
          die("No connection. ". mysqli_error($con));
  }

     if(isset($_REQUEST['search'])){
       $recv_name = $_REQUEST['search_name'];
    //echo $_REQUEST['search_name'];
  }
//     // }
 $query = " SELECT * FROM products WHERE product_title Like '%N%'";
 $a = mysqli_query($con,$query);
 $count= mysqli_num_rows($a);


//if(isset($_POST['search'])){

  //$value_filter = $_POST['product_name'];

  //$query = " SELECT * FROM products WHERE product_title Like '%Napa%'";
  //$a = mysqli_query($con,$query);

  //while($row = mysqli_fetch_array($a)){
      //echo $row= ['product_title'];
  //}
//}


//$con = mysqli_connect('localhost','root','','ecom_store');
	
	//if(isset($_GET['search_text'])){
		// $search_text = $_GET['search_text'];
    // $sql = "SELECT * FROM product WHERE product_title LIKE '$search_text' ";
    // $query = mysqli_query($con, $sql);

    //if(mysqli_num_rows($query) > 0){

      // $data = mysqli_fetch_assoc($query);
      // $product_title = $data['product_title'];

    // }
  // }
 ?> 



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->



</div><!--- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include("includes/sidebar.php"); ?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9" ><!-- col-md-9 Starts --->


<?php getProducts(); ?>

</div><!-- row Ends -->

<center><!-- center Starts -->

<ul class="pagination" ><!-- pagination Starts -->

<?php getPaginator(); ?>

</ul><!-- pagination Ends -->

</center><!-- center Ends -->



</div><!-- col-md-9 Ends --->



</div><!--- wait Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(){

/// Hide And Show Code Starts ///

$('.nav-toggle').click(function(){

$(".panel-collapse,.collapse-data").slideToggle(700,function(){

if($(this).css('display')=='none'){

$(".hide-show").html('Show');

}
else{

$(".hide-show").html('Hide');

}

});

});

/// Hide And Show Code Ends ///

/// Search Filters code Starts ///

$(function(){

$.fn.extend({

filterTable: function(){

return this.each(function(){

$(this).on('keyup', function(){

var $this = $(this),

search = $this.val().toLowerCase(),

target = $this.attr('data-filters'),

handle = $(target),

rows = handle.find('li a');

if(search == '') {

rows.show();

} else {

rows.each(function(){

var $this = $(this);

$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

});

}

});

});

}

});

$('[data-action="filter"][id="dev-table-filter"]').filterTable();

});

/// Search Filters code Ends ///

});



</script>


<script>


$(document).ready(function(){

  // getProducts Function Code Starts

  function getProducts(){

  // Manufacturers Code Starts

    var sPath = '';

var aInputs = $('li').find('.get_manufacturer');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

var sPath = '';

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'man[]=' + aKeys[i]+'&';

}

}

// Manufacturers Code ENDS

// Products Categories Code Starts

var aInputs = Array();

var aInputs = $('li').find('.get_p_cat');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

}

}

// Products Categories Code ENDS

   // Categories Code Starts

var aInputs = Array();

var aInputs = $('li').find('.get_cat');

var aKeys  = Array();

var aValues = Array();

iKey = 0;

    $.each(aInputs,function(key,oInput){

    if(oInput.checked){

    aKeys[iKey] =  oInput.value

};

    iKey++;

});

if(aKeys.length>0){

    for(var i = 0; i < aKeys.length; i++){

    sPath = sPath + 'cat[]=' + aKeys[i]+'&';

}

}

   // Categories Code ENDS

   // Loader Code Starts

$('#wait').html('<img src="images/load.gif">');

// Loader Code ENDS

// ajax Code Starts

$.ajax({

url:"load.php",

method:"POST",

data: sPath+'sAction=getProducts',

success:function(data){

 $('#Products').html('');

 $('#Products').html(data);

 $("#wait").empty();

}

});

    $.ajax({
url:"load.php",
method:"POST",
data: sPath+'sAction=getPaginator',
success:function(data){
$('.pagination').html('');
$('.pagination').html(data);
}

    });

// ajax Code Ends

   }

   // getProducts Function Code Ends

$('.get_manufacturer').click(function(){

getProducts();

});


  $('.get_p_cat').click(function(){

getProducts();

});

$('.get_cat').click(function(){

getProducts();

});


 });

</script>

</body>

</html>
