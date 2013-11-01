<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/16/13
 * Time: 12:42 AM
 * To change this template use File | Settings | File Templates.
 */

include_once('model.php');

if(isset($_POST['username']) && $_POST['username'] != NULL && isset($_POST['skill']) && isset($_POST['info']) )
{
    $api = new updateData($_POST['username'], $_POST['skill'], $_POST['info']);
}

?>