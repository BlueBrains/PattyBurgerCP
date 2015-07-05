<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class res_client_test extends Ci_Controller
{
	
	/*function __construct(argument)
	{
		# code...
	}*/
	function index()
	{	
		// Set config options (only 'server' is required to work
		$config = array('server'            => 'http://burger.remmaz.com/index.php',
                //'api_key'         => 'Setec_Astronomy'
                //'api_name'        => 'X-API-KEY'
                //'http_user'       => 'username',
                //'http_pass'       => 'password',
                //'http_auth'       => 'basic',
                //'ssl_verify_peer' => TRUE,
                //'ssl_cainfo'      => '/certs/cert.pem'
                );
		// Run some setup
		$this->rest->initialize($config);
		// Pull in an array of tweets
		$tweets = $this->rest->get('restaurants/ress');
		$json = json_encode($tweets);
		print_r($json);
	}
}
?>