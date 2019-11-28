<div class="Container">
    <h4><?php echo $title?></h4>
    <?php 
        $ext = pathinfo($url ,PATHINFO_EXTENSION);

        if($type == "image"){
            echo "<img src='$url' alt='$title#$id'>";
        }
        else if($type == "video"){
            echo "<video width='320' height='240' controls>
            <source src='$url' type='video/$ext'>
            </video>";
        }
    ?>
</div>