<h1>Anime</h1>
 
<div class="carrusel-img">
    <?php 
        $query = "SELECT * FROM imagen WHERE id_album = 50"; 
        $resultado = mysqli_query($db, $query);
        
        while($img = mysqli_fetch_assoc($resultado)): 
    ?>
        <img src="imagenes/<?php echo $img["src"] . ".jpg"; ?>">
    <?php endwhile; ?>
</div>


<h1>Popular</h1>

<div class="carrusel-img">
    <?php 
        $query2 = "SELECT * FROM imagen WHERE id_album = 45"; 
        $resultado2 = mysqli_query($db, $query2);
        
        while($img2 = mysqli_fetch_assoc($resultado2)): 
    ?>
        <img src="imagenes/<?php echo $img2["src"] . ".jpg"; ?>">
    <?php endwhile; ?>
</div>