<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 9/24/13
 * Time: 8:34 PM
 * To change this template use File | Settings | File Templates.
 */

if($_POST['test'])
{
    include_once('model.php');

    $response = array(
        'test' => 'Works!'
    );

    sendResponse(200,json_encode($response));
}

?>