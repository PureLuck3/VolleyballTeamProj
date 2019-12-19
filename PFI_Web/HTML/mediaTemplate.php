<div class="Container">
    <?php 
        $ext = pathinfo($url ,PATHINFO_EXTENSION);

        echo "<div class='card' style='width:400px'>
                <div class='card-header'>
                <a href=''>$title </a>" . $description . " " . $date . 
                "</div>
                <div class='card-body'>";
                    if($type == "image"){
                        echo "<img width = '320' height='320' src='$url' alt='$title#$id'>";
                    }
                    else if($type == "video"){
                        echo "<video width='320' height='240' controls>
                        <source src='$url' type='video/$ext'>
                        </video>";
                    }
                echo "</div>";
            echo "</div>";   
    ?>