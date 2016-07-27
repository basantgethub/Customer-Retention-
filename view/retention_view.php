<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">                               
  <section class="panel panel-default">
    
    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span> Retention Report</strong>
    </div>
    <div class="panel-body">  
        <?php 
    if(!empty($event1) && is_array($event1)){
        
    ?>
        <table class="table table-striped table-bordered" style="width: 100%; word-wrap:break-word; table-layout: fixed;">
	<thead>
            
		<tr>
			<th>Date </th>
                        <th> Count</th>
                        <th> + 1</th>
                        <th> + 2</th>
                        <th> + 3</th>
                        <th> + 4</th>
                        <th> + 5</th>
                        <th> + 6</th>
                        <th> + 7</th>
		</tr>
                
	</thead>
		<?php foreach($event1 as $key => $value){ 
                    $date = $value['date'];
                    $check_date = date("Y-m-d", strtotime($date."+1 days"));
                    
                    $startend = date("Y-m-d", strtotime($date."+7 days"));
                ?>
		<tr>
                    <td><?php print date("M jS, Y", strtotime($date));?></td> 
             
                    <td><?php print $value['count'];?></td>
                    
                    <?php
                        while($check_date <= $startend){
                           $count = 0;
                            if(!empty($event2) && is_array($event2)){ 
                               
                               foreach ($event2 as $key2 => $val) {
                                   $date_val = $val['date'];
                                    if($date_val < $check_date){
                                        continue;
                                    }
                                    if($date_val > $check_date){
                                        break;
                                    }
                                    
                                    $count = $val['count'];
                                } 
                            } 
                            
                            if(!empty($count)){
                                print '<td>'.round(($count/$value['count']*100), 1, PHP_ROUND_HALF_UP).'% ('.$count.')</td>';
                            } else{
                                print '<td>0</td>';
                            }
                            
                            $check_date = date("Y-m-d", strtotime($check_date."+1 days"));
                            
                        }
                       
                    ?>
		</tr>
                
		<?php 
                    }
                ?>
	</table>
        <?php } ?>
    </div>
   
</section>
</div>

</body>
</html>