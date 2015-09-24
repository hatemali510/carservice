<?php
require_once 'core/init.php';

$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
}

	$res=DB::getInstance()->get('reservation',array('user_id','=', $user2->data()->id));
	
	if($res->count()){
	foreach($res->results() as $row){
	$re_id=$row->id;
	}
  //  echo $row->id; reservTION id

}

?>
<html>
 
    <head>
    <title>Simple invoice in PHP</title>
        <style type="text/css">
        body {      
            font-family: Verdana;;
        }
         
        div.invoice {
        border:1px solid #ccc;
        padding:10px;
        height:740pt;
        width:	570pt;
        }
 
        div.company-address {
            border:1px solid #ccc;
            float:left;
            width:200pt;
        }
         
        div.invoice-details {
            border:1px solid #ccc;
            float:right;
            width:200pt;
        }
         
        div.customer-address {
            border:1px solid #ccc;
            float:right;
            margin-bottom:50px;
            margin-top:100px;
            width:200pt;
        }
         
        div.clear-fix {
            clear:both;
            float:none;
        }
         
        table {
            width:100%;
        }
         
        th {
            text-align: left;
        }
         
        .text-left {
            text-align:left;
        }
         
        .text-center {
            text-align:center;
        }
         
        .text-right {
            text-align:right;
        }
         
        </style>
    </head>
 
    <body>
    <div class="invoice">
        <div class="company-address">
            Sayians CO.
            <br />  
            12 park Street
            <br />
            Ain Shams, Cairo, Egypt
            <br />
        </div>
     
        <div class="invoice-details">
            Invoice : <?php 
                $num ='select id from invoice where cus_id ="' .$user2->data()->id. '" ';
                $execute1=$link->query($num);

                while($row=mysqli_fetch_assoc($execute1)){
                echo $row["id"];
            }

            ?>
            <br />
            Date :<?php echo date("Y-m-d")?>
        </div>
         
        <div class="customer-address">
            To: <?php echo $user2->data()->name; ?>
            <br />
            Address: <?php echo $user2->data()->Address; ?>
            <br />
            Cairo Egypt 
            <br />
        </div>
         
        <div class="clear-fix"></div>
            <table border='1'>
                <tr>
                    <th width=400>Description</th>
                    <th width=300>Price</th>
                 </tr>
 
    <?php
        
        $sub_total = 0;
        $reserv_price = 50;
        $dat='';
        $tim='';
        $row='';
        $ser='';
        $link = mysqli_connect("localhost", "root", "toor", "new");

    $sql = '
        	select s.name,s.price,res.user_id,res.start,res.date,resd.service_id from reservation_details as resd
        		inner join reservation as res 
        		on resd.reservation_id = res.id
        		inner join service as s
        		on s.id = service_id
        		where res.id = "'.$re_id.'"
    	';


    $result = $link->query($sql);


    while($row=mysqli_fetch_assoc($result)){
	
        $description = $row['name'];
        $price = $row['price'];
        $sub_total += $price;
        $tim= $row['start'];
        $dat= $row['date'];
        $ser= $row['service_id'];
        echo("<tr>");
        echo("<td>$description</td>");
        echo("<td class='text-right'>$price</td>");
        echo("</tr>");
    }
    echo("<tr>");
    echo("<td colspan='2' class='text-right'>Sub total</td>");
    echo("<td class='text-right'>" . number_format($sub_total,2) . "</td>");
    echo("</tr>");
    echo("<tr>");
    echo("<td colspan='2' class='text-right'>Reservation Price</td>");
    echo("<td class='text-right'>" . number_format($reserv_price,2) . "</td>");
    echo("</tr>");
    echo("<tr>");
    echo("<td colspan='2' class='text-right'><b>TOTAL</b></td>");
    $total=(($sub_total+$reserv_price));
    echo("<td class='text-right'><b>" . number_format($total,2) . "</b></td>");
    echo("</tr>");

    $user_id='select cus_id from invoice where cus_id ="' .$user2->data()->id. '" ';

    $con = false;
    $execu = $link->query($user_id);
    while ($row = $execu->fetch_assoc())
         {
            if($row['cus_id'] == $user2->data()->id)
             {$con= true;}
         }

    if(!$con){

    $x="insert into invoice (cus_id,time,date,total_price) VALUES 
    ('". $user2->data()->id ."', '". $tim ."', '". $dat ."','". $total ."')";

    $exec = $link->query($x);

    $inv_id='select id from invoice where cus_id ="' .$user2->data()->id. '" ';

    $exe = $link->query($inv_id);
   
    while ($row = $exe->fetch_assoc())
         {
            $result = $link->query($sql);

            while($eee = $result->fetch_array())

            {
                $inv_det="insert into invoice_details (invoice_id, service_id) VALUES ('". $row['id'] ."','". $eee['service_id'] ."')";
                $ex= $link->query($inv_det);
                echo"test";
            }

            echo 'done';
        }


}
    ?>
            </table>
        </div>  
    </body>
</html>