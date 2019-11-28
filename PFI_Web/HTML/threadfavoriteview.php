<div class="container border">
    <h3 class="my-4">Favorite Threads</h3>
    <?php
    $arrayCookies = $_COOKIE;
    unset($arrayCookies['PHPSESSID']);
    arsort($arrayCookies);
    var_dump($arrayCookies);

    $thread_list = array();
    $counter = 0;
    foreach($arrayCookies as $threadID => $count){
        array_push($thread_list,Thread::search_one_thread($threadID));
        $counter++;
        if($counter == 5){
        break;
        }
    }
    foreach($thread_list as $thread){
        $thread->display_thread();
    }
    ?>
</div>
