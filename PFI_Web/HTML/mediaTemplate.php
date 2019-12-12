<div class="Container">
    <h2><?php echo $title?></h2>
    <?php 
        $ext = pathinfo($url ,PATHINFO_EXTENSION);

        if($type == "image"){
            echo "<img width = '320' height='320' src='$url' alt='$title#$id'>";
        }
        else if($type == "video"){
            echo "<video width='320' height='240' controls>
            <source src='$url' type='video/$ext'>
            </video>";
        }
    ?>
</div>