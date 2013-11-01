<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/29/13
 * Time: 9:24 PM
 * To change this template use File | Settings | File Templates.
 */

if(isset($_FILES['userfile']['name']) && isset($_POST['username']))
{
    include_once('model.php');

    $target_path = "profilePhotos/" . $_POST['username'] . ".jpg";
    $filename = $_FILES['userfile']['name'];
    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path))
    {
        echo "1";
        $api = new UpdateUsersPhoto($target_path, $_POST['username']);
    }
    else
    {
        echo "0";
    }
}
?>