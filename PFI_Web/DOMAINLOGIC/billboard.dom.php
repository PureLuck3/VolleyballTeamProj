<?php
    include "../CLASSES/THREAD/thread.php";

    function display_thread_info()
    {
        $result = THREAD::create_thread_list();

        foreach($result as $r)
        {
            $r->display_thread();
            echo "<br>";
        }
    }

    function display_post_info($threadId)
    {
        $aPost = new Post();
        $result = $aPost -> fetch_posts_by_threadID($threadId);

        foreach($result as $r)
        {
            $r->display_post();
            echo "<br>";
        }
    }
?>