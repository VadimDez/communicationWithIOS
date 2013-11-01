<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadimdez
 * Date: 7/6/13
 * Time: 7:42 PM
 * To change this template use File | Settings | File Templates.
 */

// Helper method to get a string description for an HTTP status code
// From http://www.gen-x-design.com/archives/create-a-rest-api-with-php/
function getStatusCodeMessage($status)
{
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );

    return (isset($codes[$status])) ? $codes[$status] : '';
}

// Helper method to send a HTTP response code/message
function sendResponse($status = 200, $body = '', $content_type = 'text/json')
{
    $status_header = 'HTTP/1.1 ' . $status . ' ' . getStatusCodeMessage($status);
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}

class database
{
    public $db;

    function  __construct()
    {
        $this->db = mysql_connect('localhost', 'root', '');
        mysql_select_db('testApp', $this->db);

    }

    function __destruct() {
        mysql_close($this->db);
    }

    function insertNewUser($username, $password)
    {
        if(mysql_query("INSERT INTO user(username, password) VALUES('$username','$password')"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

class RedeemAPI {
    private $db;

    // Constructor - open DB connection
    function __construct() {
        // $this->db = new mysqli('localhost', 'username', 'password', 'promos');
        // $this->db->autocommit(FALSE);
    }

    // Destructor - close DB connection
    function __destruct() {
        // $this->db->close();
    }

    // Main method to redeem a code
    function redeem() {
        /*
                // Check for required parameters
                if (isset($_POST["rw_app_id"]) && isset($_POST["code"]) && isset($_POST["device_id"])) {

                    // Put parameters into local variables
                    $rw_app_id = $_POST["rw_app_id"];
                    $code = $_POST["code"];
                    $device_id = $_POST["device_id"];

                    // Look up code in database
                    $user_id = 0;
                    $stmt = $this->db->prepare('SELECT id, unlock_code, uses_remaining FROM rw_promo_code WHERE rw_app_id=? AND code=?');
                    $stmt->bind_param("is", $rw_app_id, $code);
                    $stmt->execute();
                    $stmt->bind_result($id, $unlock_code, $uses_remaining);
                    while ($stmt->fetch()) {
                        break;
                    }
                    $stmt->close();

                    // Bail if code doesn't exist
                    if ($id <= 0) {
                        sendResponse(400, 'Invalid code');
                        return false;
                    }

                    // Bail if code already used
                    if ($uses_remaining <= 0) {
                        sendResponse(403, 'Code already used');
                        return false;
                    }

                    // Check to see if this device already redeemed
                    $stmt = $this->db->prepare('SELECT id FROM rw_promo_code_redeemed WHERE device_id=? AND rw_promo_code_id=?');
                    $stmt->bind_param("si", $device_id, $id);
                    $stmt->execute();
                    $stmt->bind_result($redeemed_id);
                    while ($stmt->fetch()) {
                        break;
                    }
                    $stmt->close();

                    // Bail if code already redeemed
                    if ($redeemed_id > 0) {
                        sendResponse(403, 'Code already used');
                        return false;
                    }

                    // Add tracking of redemption
                    $stmt = $this->db->prepare("INSERT INTO rw_promo_code_redeemed (rw_promo_code_id, device_id) VALUES (?, ?)");
                    $stmt->bind_param("is", $id, $device_id);
                    $stmt->execute();
                    $stmt->close();

                    // Decrement use of code
                    $this->db->query("UPDATE rw_promo_code SET uses_remaining=uses_remaining-1 WHERE id=$id");
                    $this->db->commit();

                    // Return unlock code, encoded with JSON
                    $result = array(
                        "unlock_code" => $unlock_code,
                    );
                    sendResponse(200, json_encode($result));
                    return true;
                }
                sendResponse(400, 'Invalid request');
                return false;
        */

        $response = array(
            'response' => 'Sorry, wrong password.'
        );

        if(isset($_POST['username']) && isset($_POST['password']))
        {
            if($_POST['username'] != NULL && $_POST['password'] != NULL)
            {
                if($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
                {
                    $response = array(
                        'response' => '200'
                    );
                }
            }

            sendResponse(200,json_encode($response));
        }
        else
        {
            sendResponse(400, 'Invalid request');
        }
    }
}

class login
{

    // Main method to redeem a code
    function loginning($username, $password) {

        $response = array(
            'response' => 'Sorry, wrong password.'
        );

        if(isset($username) && isset($password))
        {
            if($username != NULL && $password != NULL)
            {
                if($this->check($username,$password))
                {
                    $response = array(
                        'response' => '200',
                        'id' => $this->getID($username,$password)
                    );
                }
            }

            sendResponse(200,json_encode($response));
        }
        else
        {
            $response = array(
                'response' => 'Invalid request'
            );
            sendResponse(400, json_encode($response));
        }
    }

    function check($username, $password)
    {
        $db = new database();
        if(mysql_num_rows(mysql_query("SELECT idUser FROM user WHERE username='$username' AND password='$password'")) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function checkID($id)
    {
        $db = new database();
        if(mysql_num_rows(mysql_query("SELECT idUser FROM user WHERE idUser IN('$id')")) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function checkUsername($username)
    {
        $db = new database();
        if(mysql_num_rows(mysql_query("SELECT username FROM user WHERE username IN('$username')")) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function getID($username, $password)
    {
        $db = new database();
        $query = mysql_query("SELECT idUser FROM user WHERE username='$username' AND password='$password'");
        $query = mysql_fetch_assoc($query);
        return $query['idUser'];
    }

    function sendInfo($username)
    {
        $db = new database();
        $query = mysql_fetch_assoc(mysql_query("SELECT skill, info FROM user WHERE username='$username'"));
        if($query)
        {
            $response = array(
                'skill' => $query['skill'],
                'info'  => $query['info']
            );

            sendResponse(200, json_encode($response));
        }
    }
}


class registration {

    // Main method to redeem a code
    function register() {

        $response = array(
            'response' => 'Sorry, wrong password.'
        );

        if(isset($_POST['username']) && isset($_POST['password']))
        {
            if($_POST['username'] != NULL && $_POST['password'] != NULL)
            {
                if($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
                {
                    $response = array(
                        'response' => '200'
                    );
                }
            }

            sendResponse(200,json_encode($response));
        }
        else
        {
            sendResponse(400, 'Invalid request');
        }
    }
}

class updateData
{
    function updateData($username, $skill, $info)
    {
        $checkID = new login();
        if($checkID->checkID($username))
        {
            $db = new database();
            $query = mysql_query("UPDATE user SET skill='$skill',info='$info' WHERE username='$username'");
            sendResponse(200);
        }

    }
}

class getUsersList
{
    function getUsersList()
    {
        $db = new database();
        $query = mysql_query("SELECT idUser, username FROM user");

        $quantity = mysql_num_rows($query);

        $counter = array();
        $c = 0;

        while($row = mysql_fetch_assoc($query))
        {
            $counter[$c] = array(

                //'idUser'    => $row['idUser'],
                'username'  => $row['username']

            );
            $c++;
        }



        $response = array(
            'quantity' => $quantity,
            'users' => $counter

        );


        sendResponse(200,json_encode($response));

    }
}

class Messages
{
    function saveMessageToServer($sender, $receiver, $message)
    {
        $db = new database();
        if(mysql_query("INSERT INTO messages(`usernameSender`,`usernameReceiver`,`msg`, `time`) VALUES('$sender','$receiver','$message',now())"))
        {
            sendResponse(200);
        }
        else
        {
            sendResponse(400);
        }
    }

    function sendMessagesToClient($username)
    {
        $db = new database();
        $query = mysql_query("SELECT * FROM messages WHERE usernameReceiver='$username' ORDER BY idMessage DESC");

        if($query)
        {
            $msg[] = array();
            $i = 0;
            while($row = mysql_fetch_assoc($query))
            {
                $time = strtotime( $row['time'] );
                $time = date( 'H:i d/m/Y', $time );

                $msg[$i] = array(
                    'sender'    => $row['usernameSender'],
                    //'receiver'  => $row['usernameReceiver'],
                    'msg'       => $row['msg'],
                    'time'      => $time
                );
                $i++;
            }

            if(mysql_num_rows($query) > 0)
            {
                $response = array(
                    'messages' => $msg
                );
            }
            else
            {
                $response = array(
                    'messages' => NULL
                );
            }


            sendResponse(200, json_encode($response));
        }
        else
        {
            sendResponse(400);
        }

    }
}

class UpdateUsersPhoto
{
    public function UpdateUsersPhoto($dirAndNameOfPhoto, $username)
    {
        $db = new database();

        $query = mysql_query("UPDATE user SET photo='$dirAndNameOfPhoto' WHERE username='$username'") or die();
    }
}


?>