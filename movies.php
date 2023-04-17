<?php 
  include 'admin/db_connect.php';
  $movies = $conn->query("SELECT * FROM movies where '".date('Y-m-d')."' BETWEEN date(date_showing) and date(end_date) order by rand()");
?>

<header class="masthead">
	<div class="container-fluid">	

			<div id="movies">	

	<?php while($row=$movies->fetch_assoc()): ?>
        <div class="movie-item">
          <img class="" src="assets/img/<?php echo $row['cover_img']  ?>" alt="<?php echo $row['title'] ?>" >
          <div class="mov-det">
            <button type="button" class="btn btn-primary" data-id="<?php echo $row['id'] ?>">Reserve Seat</button>
          </div>
        </div>
    <?php endwhile; ?>

	</div>

	</div>	
</header>
<script>
	$('.mov-det button').click(function(){
    location.replace('index.php?page=reserve&id='+$(this).attr('data-id'))
  })
</script>