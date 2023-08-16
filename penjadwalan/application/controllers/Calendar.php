<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Calendar_model');
    }


	/*Home page Calendar view  */
	Public function index()
	{
		$data = [
			'instansi' => $this->Calendar_model->getInstansi(),
			'petugas' => $this->Calendar_model->getPetugas(),
		];
		
		$this->load->view('home', $data);
	}

	/*Get all Events */

	Public function getEvents()
	{
		$result=$this->Calendar_model->getEvents();
		// $this->sendTele($result);
		echo json_encode($result);
		
	}
	/*Add new event */
	Public function addEvent()
	{
		
		$result=$this->Calendar_model->addEvent();
		$notif=$this->Calendar_model->getLastInserted();
		// $this->sendTele($notif);
		echo $result;
		
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		// $result=$this->Calendar_model->deleteEvent();
		// echo $result;

		$id= $this->input->get('id'); // Mengambil ID acara dari query string (URL parameter)
    
		if (!empty($id)) {
			$result = $this->Calendar_model->deleteEvent($id);
			if ($result) {
				echo "Event successfully deleted.";
			} else {
				echo "Failed to delete event.";
			}
		} else {
			echo "Event ID not provided.";
		}
	}

	Public function dragUpdateEvent()
	{	

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}

	Public function tes()
	{	
		$result=$this->Calendar_model->getlastInserted();
		foreach ($result as $value) {
    		print json_encode($value);
		}
	}

	Public function sendTele($text)
	{
    	$apiToken = "1868693625:AAE3FhfB8nadrSL-BHxswvLkSuUnrfuTSM4";

		$string = $text;
		$data = [
			'chat_id' => '1354976671',
			'text' => $string,
			'parse_mode' => "html"
		];
		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

		echo '<pre>';
		print_r(json_decode($response));
		die();
	}



}
