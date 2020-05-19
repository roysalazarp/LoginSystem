<?php
require_once 'core/init.php';
require_once 'navbar.php';

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';


if (!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);
    if (!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
    ?>

    <h3><?php echo escape($data->username); ?></h3>
    <p>Full name: <?php echo escape($data->name); ?></p>
    <?php
}

echo '<br>';
echo '<br>';

?>

<li><a href="profileupdate.php">Update details</a></li>
<li><a href="changepassword.php">Change password</a></li>
