<?php
    include "../CLASSES/THREAD/thread.php";
    $thread_list = Thread::create_thread_list();
?>

<h3 class="my-4">Threads</h3>
<?php
  foreach($thread_list as $thread){
    $thread->display_thread();
  }
?>
