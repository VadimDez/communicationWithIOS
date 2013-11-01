<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/21/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

if(isset($_POST['username']) && $_POST['username'] != NULL)
{
    include_once('model.php');
    $api = new Messages();

    $api->sendMessagesToClient($_POST['username']);
}

?>