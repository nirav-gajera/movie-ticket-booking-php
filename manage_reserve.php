<?php

include 'admin/db_connect.php';
$ts = $conn->query("SELECT * FROM theater_settings where theater_id=".$_GET['id']);
$data = array();
while($row=$ts->fetch_assoc()){
	$data[] = $row;
	$seat_group[$row['id']] = $row['seat_group'];
	$seat_count[$row['id']] = $row['seat_count'];
}

 $mov = $conn->query("SELECT * FROM movies where id =".$_GET['mid'])->fetch_array();
 $dur = explode('.', $mov['duration']);
 $dur[1] = isset($dur[1]) ? $dur[1] : 0;
 $hr = sprintf("%'.02d\n",$dur[0]);
 $min = isset($dur[1]) ? (60 * ('.'.$dur[1])) : '0';
 $min = sprintf("%'.02d\n",$min);
 // $min = $min > 0 ? $min : '00';
  $duration = $hr.' : '.$min;

?>
<div class="row">
	<div class="form-group col-md-4">
	<label for="" class="control-label">Choose Seat Group</label>
		<select name="seat_group" id="seat_group" class="custom-select default-browser">
			<option value="">
				
			</option>
			<?php 
				foreach($seat_group as $k => $v):

			?>
			<option value="<?php echo $k ?>" data-count="<?php echo $seat_count[$k] ?>"><?php echo $v ?></option>
		<?php endforeach; ?>
		</select>
	</div>

	<div id="display-count" class="col-md-5 mt-4 pt-2"></div>		

</div>
<div class="row">
	<div class="form-group col-md-2">
		<label for="" class="control-label">Qty</label>
		<input type="number" name="qty" id="qty" class="form-control" min="0" required="">
	</div>
	<div class="form-group col-md-4">
		<label for="" class="control-label">Date </label>
		<select name="date" id="date" class="custom-select browser-default">
			<?php 
				for($i = 0 ; $i <  date("Ymd",strtotime($mov['end_date'])) - date('Ymd');$i++ ){
					if(date('Ymd') >= date("Ymd",strtotime($mov['date_showing']))){
						echo "<option value='".date('Y-m-d',strtotime(date('Y-m-d').' +'.$i.' days'))."'>".date('M d,Y',strtotime(date('Y-m-d').' +'.$i.' days'))."</option>";
					}
				}
			?>
		</select>
	</div>
	<div class="form-group col-md-4">
		<label for="" class="control-label">Time</label>
		<select name="time" id="time" class="custom-select browser-default">
			<?php 
			$i = 1;
			 $start = '2020-01-01 09:00';
			 $time='';
			 $dur[1] = isset($dur[1]) ? $dur[1] : 0;
				while ( $i < 10) {
					if(empty($time)){
						echo '<option value="'.date('h:i A',strtotime($start)).'">'.date('h:i A',strtotime($start)).'</option>';
						$time = date('h:i A',strtotime($start));
					}else{
							$time = empty($time) ? $start : $time;
						if(date('Hi',strtotime($time)) < '2100'){
						echo '<option value="'.date('h:i A',strtotime($time.' +'.$dur[0].' hours +'.$dur[1].' minutes')).'">'.date('h:i A',strtotime('+'.$dur[0].' hours +'.$dur[1].' minutes'.$time)).'</option>';
						$time = date('Y-m-d H:i',strtotime('+'.$dur[0].' hours +'.$dur[1].' minutes'.$time));
						}
					}
					$i++;
				}
			?>
		</select>
	</div>
</div>

<script>
	
	$('#seat_group').change(function(){
		$('#display-count').html($(this).find('option[value="'+$(this).val()+'"]').attr('data-count')+' seats available')
		$('#qty').removeAttr('max').attr('max',$(this).find('option[value="'+$(this).val()+'"]').attr('data-count'))
	})
</script>