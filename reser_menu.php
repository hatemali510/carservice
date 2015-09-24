<?php  require_once 'core/init.php';?>
	<div id='outer_basket'>
	
	<h2>Selected Slots</h2>
		
		<div id='selected_slots'></div>		
	
			<div id='basket_details'>
			
				<form method='post' action='book_slots.php'>
				<label>Car make</label>
					<select name='make'>
					  <option name='Car make' id='Car make' value='Hyundai'>Hyundai</option>
					</select> <br>

					<label>Car model</label>
					<select name='modelSelect'>
						<?php $models=DB::getInstance()->get('car_model',array(0));
							if($models->count()){
						 foreach ($models->results() as $model) {
							?>
						<option name='car' id='car' value='<?php echo $model->model;?>'><?php echo $model->model;?></option>
					   <?php
					    }
					}
					   ?>
					</select> <br>
					<label>Engine</label>
					<select name='engine'>
						<option name='' id='Engine' value=''></option>
						<?php $services=DB::getInstance()->get('service',array('service_category_id', '=', '1'));
							if($services->count()){
						 foreach ($services->results() as $service) {
							?>
						<option name='service' id='service' value='<?php echo $service->name;?>'><?php echo $service->name;?></option>
					   <?php
					    }
					}
					   ?></select><br>


					<label>Brake</label>
					<select name='brake'>
					<option name='' id='Brake' value=''></option>
					<?php $services=DB::getInstance()->get('service',array('service_category_id', '=', '2'));
							if($services->count()){
						 foreach ($services->results() as $service) {
							?>
						<option name='service' id='service' value='<?php echo $service->name;?>'><?php echo $service->name;?></option>
					   <?php
					    }
					}
					   ?>
					</select><br>


				<label>Battery</label>
					<select name="battery">
					<option name='' id='battery' value=''></option>
					<?php $services=DB::getInstance()->get('service',array('service_category_id', '=', '3'));
							if($services->count()){
						 foreach ($services->results() as $service) {
							?>
						<option name='service' id='service' value='<?php echo $service->name;?>'><?php echo $service->name;?></option>
					   <?php
					    }
					}
					   ?></select><br>


				<label>Tires</label>
					<select name="tires">
					<option name='' id='Tires' value=''></option>
					<?php $services=DB::getInstance()->get('service',array('service_category_id', '=', '4'));
							if($services->count()){
						 foreach ($services->results() as $service) {
							?>
						<option name='service' id='service' value='<?php echo $service->name;?>'><?php echo $service->name;?></option>
					   <?php
					    }
					}
					   ?></select><br>
