<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$mov = $conn->query("SELECT * FROM theater_settings where id =".$_GET['id']);
	foreach($mov->fetch_array() as $k => $v){
		$meta[$k] = $v;
	}
}

?>

<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-seat">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
				<label for="" class="control-label">Theater Name</label>
				<select name="theater_id" required="" class="custom-select browser-default" >
					<option value=""></option>
					<?php 
					$theater = $conn->query("SELECT * FROM theater order by name asc");
					while($row = $theater->fetch_assoc()):
					?>
					<option value="<?php echo $row['id'] ?>" <?php echo isset($meta['theater_id']) && $meta['theater_id'] == $row['id'] ? 'selected' :'' ?>><?php echo $row['name'] ?></option>
				<?php endwhile; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Group Name</label>
				<input type="text" name="seat_group" class="form-control" value="<?php echo isset($meta['seat_group']) ? $meta['seat_group'] : '' ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Seat Count</label>
				<input type="number" name="seat_count" min="0" class="form-control text-right" value="<?php echo isset($meta['seat_count']) ? $meta['seat_count'] : '' ?>">
			</div>
			
		</form>
	</div>
</div>

<script>
	$('#manage-seat').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_seat',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1500)
					// end_load()
				}
			}
		})

	})
			function displayImg(input,_this) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();
			        reader.onload = function (e) {
			        	$('#cover_img').attr('src', e.target.result);
            			_this.siblings('label').html(input.files[0]['name'])
            			_this.siblings('input[name="fname"]').val('<?php echo strtotime(date('y-m-d H:i:s')) ?>_'+input.files[0]['name'])
            			var p = $('<p></p>')
			            
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}
</script>