<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents()
	{
		
		$sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? ORDER BY events.start ASC";
		return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */

	Public function addEvent()
	{

		// $sql = "INSERT INTO events (jenisevent, title, instansi, lokasi, isp, petugas , petugas2, events.start, events.end, description, color) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		// $this->db->query($sql, array($_POST['jenisevent'], $_POST['title'], $_POST['instansi'], $_POST['lokasi'], $_POST['isp'], $_POST['petugas'], $_POST['petugas2'], $_POST['start'], $_POST['end'], $_POST['description'], $_POST['color']));
		// return ($this->db->affected_rows()!=1)?false:true;
		
		$jenisevent = isset($_POST['jenisevent']) ? $_POST['jenisevent'] : '';
		$title = isset($_POST['title']) ? $_POST['title'] : '';
		$instansi = isset($_POST['instansi']) ? $_POST['instansi'] : '';
		$lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
		$isp = isset($_POST['isp']) ? $_POST['isp'] : '';
		$petugas = isset($_POST['petugas']) ? $_POST['petugas'] : '';
		$petugas2 = isset($_POST['petugas2']) ? $_POST['petugas2'] : '';
		$start = isset($_POST['start']) ? $_POST['start'] : '';
		$end = isset($_POST['end']) ? $_POST['end'] : '';
		$description = isset($_POST['description']) ? $_POST['description'] : '';
		$color = isset($_POST['color']) ? $_POST['color'] : '';
	
		$sql = "INSERT INTO events (jenisevent, title, instansi, lokasi, isp, petugas, petugas2, start, end, description, color) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, array($jenisevent, $title, $instansi, $lokasi, $isp, $petugas, $petugas2, $start, $end, $description, $color));
	
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	/*Update  event */

	Public function updateEvent()
	{

		$sql = "UPDATE events SET jenisevent = ?, title = ?, instansi = ?, lokasi = ?, isp = ?, petugas = ?, petugas2 = ?, description = ?, color = ? WHERE id = ?";
		$this->db->query($sql, array($_POST['jenisevent'], $_POST['title'], $_POST['instansi'], $_POST['lokasi'], $_POST['isp'], $_POST['petugas'],  $_POST['petugas2'], $_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent($id)
	{

		// $sql = "DELETE FROM events WHERE id = ?";
		// $this->db->query($sql, array($_GET['id']));
		// return ($this->db->affected_rows()!=1)?false:true;

		$sql = "DELETE FROM events WHERE id = ?";
		$this->db->query($sql, array($id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

		$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
		$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}

	/*Read the data from DB */
	Public function getInstansi()
	{
		$resultQuery = $this->db->query("SELECT * FROM instansi");
		return $resultQuery->result_array();
	}

	/*Read the data from DB */
	Public function getPetugas()
	{
		$resultQuery = $this->db->query("SELECT * FROM petugas");
		return $resultQuery->result_array();
	}

	/*Read the data from DB */
	Public function getLastInserted()
	{
		$resultQuery = $this->db->query("
		SELECT
		events.id,
		jenisevent,
		title,
		i.nama_instansi,
		isp,
		description,
		start,
		end,
		p.nama_petugas AS 'petugas1',
		p2.nama_petugas AS 'petugas2'
		FROM events
		LEFT JOIN instansi i ON i.id = events.instansi
		LEFT JOIN petugas p ON p.id = events.petugas
		LEFT JOIN petugas p2 ON p2.id = events.petugas2
		ORDER BY events.id DESC 
		LIMIT 1");
		return $resultQuery->result_array();
	}







}