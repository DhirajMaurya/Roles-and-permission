<?php
class Test extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}
	function Demo()
	{
		$Data = array(
			'0' => array(
				'id' => '1',
				'name' => 'Dhiraj',
			),
			'1' => array(
				'id' => '2',
				'name' => 'Alexa',
			),
			'2' => array(
				'id' => '3',
				'name' => 'Thilini',
			),
		);

		echo json_encode($Data);
	}
}
?>