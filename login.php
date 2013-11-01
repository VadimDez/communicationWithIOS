<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 7/5/13
 * Time: 2:12 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('model.php');

$api = new login();
$api->loginning($_POST['username'], $_POST['password']);
?>