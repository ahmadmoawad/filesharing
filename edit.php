
<?php

require_once './User.php';

?>
<?php

echo "<a href='manager.php'>manager</a><br/>";
echo "<a href='upload.php'>upload</a>";
if (isset($_GET['submit'])) {
    $user = unserialize($_SESSION['user']);
    $user->set_content($_GET['area']);
    $user->set_show($_GET['show']);
    User::set_update($user);
    header("Location: edit.php");
}

if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    if (isset($_GET['f'])) {
        $user->set_file($_GET['f']);
    }


    $content = User::set_edit($user);
    echo "<form action='#' method='get'><textarea name='area' cols='100' rows='20'>" . $content . "</textarea><br/><input type='submit' name='submit' value='update'/>";

    $state = User::get_state_file($user);

    if ($state == "private") {
        echo "<input type='checkbox' name='show' value='public'>public</input>";
    } else {
        echo "<input type='checkbox' name='show' value='private'>private</input>";
    }



    echo "</form>";
}

?>



































































































































































































































































































































































