<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/14/13
 * Time: 4:20 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('model.php');

if(isset($_POST['username']) && $_POST['username'] != NULL)
{
    $api = new login();

    if($api->checkUsername($_POST['username']))
    {
        $api->sendInfo($_POST['username']);
    }
}

?>