<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/21/13
 * Time: 6:32 PM
 * To change this template use File | Settings | File Templates.
 */

if(isset($_POST['sender']) && isset($_POST['msg']) && isset($_POST['receiver']) && $_POST['sender'] != NULL && $_POST['msg'] != NULL && $_POST['receiver'] != NULL)
{

    include_once('model.php');
    $api = new Messages();
    $api->saveMessageToServer($_POST['sender'],$_POST['receiver'], $_POST['msg']);

}

?>
