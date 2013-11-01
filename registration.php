<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 7/6/13
 * Time: 8:03 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('model.php');



if(isset($_POST['username']) && isset($_POST['password']))
{
    $db = new database();
    if($db->insertNewUser($_POST['username'],$_POST['password']))
    {
        // success

        $response = array(
            'response' => '200'
        );
        sendResponse(200, json_encode($response));
    }
    else
    {
        // error
        $response = array(
            'response' => 'Registration error!'
        );
        sendResponse(200, json_encode($response));
    }
}
else
{
    $response = array(
        'response' => 'Invalid request'
    );
    sendResponse(400, json_encode($response));
}


?>