<style>
	td img{
		width: 50px;
		height: 75px;
		margin:auto;
	}
</style>
<?php include ('db_connect.php') ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-block btn-sm btn-primary col-sm-2" type="button" id="new_theater"><i class="fa fa-plus"></i> New Theater</button>
			<button class="btn btn-block btn-sm btn-primary col-sm-2" type="button" id="new_group"><i class="fa fa-plus"></i> Seat Groups</button>
		</div>
	</div>
	<div class="row">
		<div class="card col-md-4 mt-3">
			<div class="card-header">
				<large>Theaters</large>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">Id</th>
							<th class="text-center">Name</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$theater = $conn->query("SELECT * FROM theater order by name asc ");
						while($row=$theater->fetch_assoc()){
						 ?>
						 <tr>
						 	<td><?php echo $i++ ?></td>
						 	<td><?php echo $row['name'] ?></td>
						 	<td>
						 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary btn-sm">Action</button>
								  <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_theater" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_theater" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
						 	</td>
						 </tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	<div class="card col-md-7 mt-3 ml-3">
			<div class="card-header">
				<large>Seat Groups</large>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">Id</th>
							<th class="text-center">Theater</th>
							<th class="text-center">Group</th>
							<th class="text-center">Seats</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$theater = $conn->query("SELECT ts.*,t.name FROM theater_settings ts inner join theater t on ts.theater_id = t.id  order by t.name asc,ts.seat_group asc ");
						while($row=$theater->fetch_assoc()){
						 ?>
						 <tr>
						 	<td><?php echo $i++ ?></td>
						 	<td><?php echo $row['name'] ?></td>
						 	<td><?php echo $row['seat_group'] ?></td>
						 	<td><?php echo $row['seat_count'] ?></td>
						 	<td>
						 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary btn-sm">Action</button>
								  <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_seat" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_seat" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
						 	</td>
						 </tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

</div>


<script>
	$('#new_theater').click(function(){
		uni_modal('New Movie','manage_theater.php');
	})
	$('#new_group').click(function(){
		uni_modal('New Movie','manage_seat.php');
	})
	$('.edit_theater').click(function(){
		uni_modal('Edit Movie','manage_theater.php?id='+$(this).attr('data-id'));
	})
	$('.delete_theater').click(function(){
		_conf('Are you sure to delete this data?','delete_theater' , [$(this).attr('data-id')])
	})
	$('.edit_seat').click(function(){
		uni_modal('Edit Movie','manage_seat.php?id='+$(this).attr('data-id'));
	})
	$('.delete_seat').click(function(){
		_conf('Are you sure to delete this data?','delete_seat' , [$(this).attr('data-id')])
	})
	

	function delete_theater($id=''){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_theater',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully deleted",'success');
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
	function delete_seat($id=''){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_seat',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully deleted",'success');
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
</script>