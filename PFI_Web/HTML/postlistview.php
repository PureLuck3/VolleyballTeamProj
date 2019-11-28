<?php
    include "CLASSES/THREAD/thread.php";
    $thread = new Thread();
    $thread->load_thread_by_id($_GET["threadID"]);
    $thread->load_posts();
?>

<h3 class="mb-4"><?php echo $_GET["threadTitle"]; ?></h3>

<?php $thread->display_posts(); ?>
