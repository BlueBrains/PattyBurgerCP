<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic res interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Restaurants extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->model('res_model');
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['res_get']['limit'] = 500; //500 requests per hour per res/key
        $this->methods['res_post']['limit'] = 100; //100 requests per hour per res/key
        $this->methods['res_delete']['limit'] = 50; //50 requests per hour per res/key
    }

    function ress_get()
    {
        $ress = $this->res_model->ress();
        
        if($ress)
        {
            $this->response($ress, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any ress!'), 404);
        }
    }
    
    function res_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        else if(!$this->get('tab'))
        {
            $res = $this->res_model->res($this->get('id'));

            if($res)
            {
                $this->response($res, 200); // 200 being the HTTP response code
            }

            else
            {
                $this->response(array('error' => 'res could not be found'), 404);
            }
        }
        else
        {
            $res = $this->res_model->res_tab_meal($this->get('id'),$this->get('tab'));
            if($res)
            {
                $this->response($res, 200); // 200 being the HTTP response code
            }

            else
            {
                $this->response(array('error' => 'res could not be found'), 404);
            }
        }
    }

    function test_post()
    {  
        $order = $this->post('order'); 
        $result = $this->res_model->test($order);
        $message = array('order' => $this->post('order'), 'message' => 'ADDED!');
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function order_post()
    {  
        $input_data = json_decode(trim(file_get_contents('php://input')));
        $user_id = $input_data->user_id; 
        $res_id = $input_data->res_id; 
        $order = $input_data->order;
        $result = $this->res_model->insert_order($user_id,$res_id,$order);
        $message = array('id' => $this->post('user_id'), 'name' => $this->post('res_id'), 'order' => $this->post('order'), 'message' => 'Order ADDED!');
        $this->response($message, 200); // 200 being the HTTP response code
    }

    /*function order_post()
    {  
        $input_data = json_decode(trim(file_get_contents('php://input')));
        $user_id = $input_data->user_id; 
        $res_id = $input_data->res_id; 
        //$order = $input_data->order[0]->item_id;         
        $result = $this->res_model->order($res_id,$user_id,$order);
        if ($result == )
            $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'message' => 'ADDED!');
        else if () $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'message' => 'ADDED!');
        else $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'message' => 'ADDED!');
        $this->response($message, 201); // 200 being the HTTP response code
    }*/

   
}
