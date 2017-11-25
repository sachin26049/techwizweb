<?php
 session_start();  
 require 'connection.php';
 
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Menu</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="responsive-full-background-image.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> 
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 99999;
    top: 0;
    left: 0;
    background-color: #222;
    overflow-x: hidden;
    transition: 0.7s;
    padding-top: 60px;
    text-align:center;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.5s;

}

.sidenav a:hover{
    color: black;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s;

}
  
  .contain{
  visibility:hidden;
  
  }
  
  .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  
</style>
  </head>
  <body>
  
    <div class="container-fluid" style="background-color:black;color:#fff;height:100px;">
    
    <?php
      
         echo '<h1 style="margin-left:10%;margin-top:10%;font-size:35px;
         font-style: italic;">Welcome <span> ' .$_SESSION["name"].'</span></h1>';
      
    ?>
    
    </div>
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
    <ul class="nav navbar-nav">
    <li style="float:left;margin-left:5%"><span style="font-size:45px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span></li>
    <li style="float:right;margin-right:5%"><a href="#" onclick="openorder()">View order<span id="noti" class="badge"></span></a></li>
    
  </ul>
</nav>
  
  


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#" onclick="Viewmenu()">View menu</a>
  <a href="#" onclick="openorder()">View order</a>
  <a href="#">Track order</a>
  <a href="#"></a>
</div>

<div class="container">
    <div class="container" id="menu" Style="Background-color:transparent ;margin-bottom:50px;margin-top:5px">        
    <!-- Example row of columns -->
      <div id="accordion" class="panel-group">
      <?php
        $i=$_SESSION["id"];      
        //select all food items form db
      $sql1 = "SELECT * FROM food ";
    $res1 = mysqli_query($conn,$sql1);
    
    while($row=mysqli_fetch_array($res1)){
         $x=$row["type_id"];
         //select the name of type by using type id
         $sql2 = "SELECT type FROM foodtype WHERE tid = $x";
    $res2 = mysqli_query($conn,$sql2);
    $row1=mysqli_fetch_array($res2);
    //display name and price of each item
     echo ' <div  style="Background-color:white" class="panel panel-default">
        <div id="'.$row["food_id"].'h" style="Background-color:white" data-val="'.$row["price"].'" class="panel-heading" style="padding-bottom:10px">
            <h4 style="Background-color:white" class="panel-title">
                <a style="Background-color:white;padding:0;outline:none;" data-toggle="collapse" 
                data-parent="#accordion" href="#'.$row["food_id"].'"><div class="container"><div class="row"><div class="col-xs-6">'.$row["food_name"].'
                </div><div class="col-xs-6"><span style="float:right;">&#x20b9;'.$row["price"].'</span></div></div></div></a>
            </h4>
        </div>
        <div id="'.$row["food_id"].'" class="panel-collapse collapse">
                <div class="panel-body">
                <p>Type:'.$row1["type"].'</p><br>
                <p>DES:'.$row["descrip"].'</p>
                <tr>
                <button id="'.$row["food_id"].'-" onclick="decr(this.id)" class="btn btn-default btn-circle" style="font-size:15px;
                border-color:white;background:#00D800;color:white" >-</button>
                <input type="text" value="0" id="'.$row["food_id"].'t" class="form-group-sm" 
                style="width:30px;border:none;font-size:15px;background:white;margin:0px;" readonly />
                <button id="'.$row["food_id"].'+" onclick="incr(this.id)" class="btn btn-default btn-circle" style="font-size:15px;
                border-color:white;background:#00D800;color:white" >+</button>
                </tr>
            </div>
        </div>
    </div>';
     
    }
      
         
        
    ?>  
    </div>
    </div>
        <div class="container" id="order" Style="Background-color:white;margin-bottom:10px;visibility:hidden;
        position:absolute;
        width:90%;
    
    z-index: 0;
    padding-top: 10px;
    padding-left:10px;
    margin-left:5%;
    margin-right:50px;
    margin-top:200px;
    top: 0;
    left: 0;">        
    <!-- Example row of columns -->
      <div id="accordion1" class="panel-group" data-value="0"><h1 style="color:white">No Orders yet!!</h1>
       
     
  </div> 
  </div>
  </div>
  <script>
  var f=0;
 //to increment count of each item
 var not=0;
 var order_set=new Array(500);
 order_set.fill(0);
 

 function incr(cid)
{
    //alert(cid);
    var s=cid;
    //id for count textbox is (id)t
    s=s.replace("+","t");
    //alert(s);
    document.getElementById(s).value++;
   //id for count textbox in orders is (id)t1
   var s1=s+"1";
   //add item to orders for 1st incr
   if(document.getElementById(s).value==1)
   {
    s=cid;
    s=s.substring(0,s.length-1);
    //alert(s);
    adddiv(s);
   }
   //alert(s1);
   //count for each item
   var p=document.getElementById(s1).value++ +1;
   s=cid;
   //id for price box after X is (id)p
   s=s.replace("+","p");
   //id for result price after multiplication is (id)p1
   s1=s+"1";
   //cal of total price for each item
   document.getElementById(s1).value=document.getElementById(s).value*p;
   //cal of total price for entire order
   document.getElementById("Total").value=parseInt(document.getElementById("Total").value)+parseInt(document.getElementById(s).value);
   
    //alert(s);
    //document.getElementById(s).style.visibility="visible";
    
}

function decr(cid)
{
    //alert(cid);
    var s=cid;
    //id for count textbox is (id)t
    s=s.replace("-","t");
    //alert(s);
    //if count is already 0 no need to decr
    if(document.getElementById(s).value!=0)
   { document.getElementById(s).value--;
    //id for count textbox in orders is (id)t1
    s=s+"1";
    var s5=s;
    
    if(document.getElementById(s).value!=0)
    document.getElementById(s).value--;
    
   var p=parseInt(document.getElementById(s).value);
  
   //similar to incr function just operations are changed
   s=cid;
   s=s.replace("-","p");
   var s1=s+"1";
   
   document.getElementById(s1).value=document.getElementById(s).value*p;
   document.getElementById("Total").value=parseInt(document.getElementById("Total").value)-parseInt(document.getElementById(s).value);
   
   //if value becomes 0 after decr remove item from orders
    if(document.getElementById(s5).value==0)
    {
    s=cid;
    s=s.substring(0,s.length-1);
    removediv(s);
    }
    }
    
}


//for nav bar
function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    /*s=s=window.getComputedStyle(document.getElementById("menu"));
    document.getElementById("menu").style.visibility="hidden";*/
}

function openorder() {
    document.getElementById("menu").style.visibility="hidden";
    document.getElementById("order").style.visibility="visible";
closeNav();
not=0;
    document.getElementById("noti").innerHTML="";
}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    /*if(s.visibility === 'visible')
    document.getElementById("menu").style.visibility="visible";*/
}


function Viewmenu(){
document.getElementById("menu").style.visibility="visible";
document.getElementById("order").style.visibility="hidden";
closeNav();
}

//id everywhere is food id
//to add items to orders
function adddiv(id)
{
order_set[id]=1;
//id for div with name and price of each item is (id)h
var MyDiv = document.getElementById(id+"h");

var p=MyDiv.getAttribute("data-val");

var div2=document.createElement('div');
//setting  id of new div
div2.id=id+"o";

div2.innerHTML=MyDiv.innerHTML;

var div=document.getElementById("accordion1");

var f1=0;
//for item in cart we will remove "no orders yet"
if(f==0)
{
//alert("y");
div.innerHTML="";
f=1;
//flag will be used in other operations below
f1=1;
}
//alert("n");

var div1=document.createElement('div');
//div that contains +,- buttons and count box in orders
div1.innerHTML= '<div class="container"><div class="row"><div class="col-xs-8"><div class="form-group">'+
'<button id="'+id+'-" onclick="decr(this.id)" class="btn btn-default btn-circle" style="font-size:15px;'
 +'border-color:white;background:#00D800;color:white" >-</button>'+
 '<input type="text" value="0" id="'+id+'t1"'+
'class="form-group-sm" style="width:30px;border:none;font-size:15px;background:white;margin:0px;"'+
'style="font-size:15px" readonly />'+
'<button id="'+id+'+" onclick="incr(this.id)"  class="btn btn-default btn-circle" style="font-size:15px;'
 +'border-color:white;background:#00D800;color:white">'
+'+</button></div>&nbsp<span style="font-size:20px;color:black">&nbsp X &nbsp</span>'
+'<input type="text" value="'+p+'" id="'+id+'p" class="form-group-sm" style="width:30px;border:none;font-size:20px;color:#00D800;background:white'+
';margin:0px;'+
'" readonly /></div>&nbsp<div class="row"><div class="col-xs-4">'+
'<span style="font-size:25px;color:#00D800">&nbsp = &nbsp'+
'&#x20b9;<input type="text" value="0" id="'+id+'p1" style="text-align:right;font-size:20px;color:#00D800;width:60px;background:white;margin:0px;'+
'border:none;" readonly /></div></div></div>';
div1.style.marginBottom="5%";
div1.style.marginTop="5%";
//id for this div
div1.id=id+"o1";
//for items other than 1st item in cart we will add div before total "f1==0" means not 1st item
if(f1==0)
{

child=document.getElementById("tota");
child.parentNode.insertBefore(div2,child);
child.parentNode.insertBefore(div1,child);
}
else
{
//in case of 1st item
div.appendChild(div2);
div.appendChild(div1);
}
//in case of 1st item we will add total at the bottom
if(f1==1)
{
var div2=document.createElement('div');

div2.innerHTML='<span id="tota" style="font-size:40px;color:#00D800">&nbsp Total: &nbsp&#x20b9</span>'
+'<input type="text" value="0" id="Total" style="font-size:20px;color:#00D800;width:60px;background:transparent;margin:0px;'+
'border:none" readonly/>';

var div5=document.createElement('div');

div5.innerHTML='<button id="placeorder" onclick="placeOrder()"  class="btn btn-default btn-circle" style="font-size:15px;'
 +'border-color:white;background:#00D800;color:white">Place Order</button>';

div.appendChild(div2);
div.appendChild(div5);
}
not++;
    document.getElementById("noti").innerHTML=not;
}
//to remove items from orders

function placeOrder()
{
var i=0;
var table = prompt("Please enter your table number");
for(i=0;i<order_set.length;i++)
{
if(order_set[i]==1)
{
var c=document.getElementById(i+"t").value;
//alert(i+"  "+c);
var flag=0;
$.post("order.php",{ id:i ,count:c,table:table },function(){
   //alert('order placed');
   flag=1;
  } );
  }
  }
  //setTimeout(placeOrder, 3000);
  alert('order placed');
  for(i=0;i<order_set.length;i++)
  {
  if(i==1)
  {
  //alert(i+"t");
   document.getElementById(i+"t").value=0;
   document.getElementById(i+"t1").value=0;
   }
   /*var div = document.getElementById('accordion1');

div.innerHTML('<h1 style="color:white">No  yet!!</h1>');
order_set.fill(0);*/
  }
  var div = document.getElementById('accordion1');

div.innerHTML='<h1 style="color:#00D800">No items yet!!</h1>';
order_set.fill(0);
  
}

function removediv(id)
{
order_set[id]=0;
//remove div with name and price of item
var MyDiv= document.getElementById(id+"o");

MyDiv.outerHTML="";

delete MyDiv;
//remove +,- buttons
var div1= document.getElementById(id+"o1");
div1.outerHTML="";

delete div1;
//if all items are removed then remove Total and add "no orders yet"
if(document.getElementById("Total").value=="0")
{
var div2=document.createElement('div');
div2.innerHTML= '<h1 style="color:white">No Orders yet!!</h1>';
document.getElementById("accordion1").innerHTML="";
document.getElementById("accordion1").appendChild(div2);
f=0;

}
not--;
    document.getElementById("noti").innerHTML=not;
    if(not<=0)
    document.getElementById("noti").innerHTML="";
}

  </script>
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  
  </body>
</html>