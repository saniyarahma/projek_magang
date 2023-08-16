<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	Public function countAllEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'all' from events");
		return $resultQuery->row()->all;
	}

	Public function countTelkomEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'telkom' from events WHERE isp = 'TELKOM'");
		return $resultQuery->row()->telkom;
	}

    Public function countLAEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'la' from events WHERE isp = 'LINTAS ARTA'");
		return $resultQuery->row()->la;
	}

    Public function countNexaEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'nexa' from events WHERE isp = 'NEXA'");
		return $resultQuery->row()->nexa;
	}

    Public function countJolEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'jol' from events WHERE isp = 'JOL'");
		return $resultQuery->row()->jol;
	}

	Public function countMetroEvents()
	{
		$resultQuery = $this->db->query("select count(id) as 'metro' from events WHERE isp = 'METRO'");
		return $resultQuery->row()->metro;
	}

	Public function getAllDetailedEvents()
	{
		$resultQuery = $this->db->query("
		SELECT
		events.id,
		jenisevent,
		title,
		i.nama_instansi,
		isp,
		lokasi,
		description,
		CAST(start AS DATE) start,
		end,
		p.nama_petugas AS 'petugas1',
		p2.nama_petugas AS 'petugas2'
		FROM events
		LEFT JOIN instansi i ON i.id = events.instansi
		LEFT JOIN petugas p ON p.id = events.petugas
		LEFT JOIN petugas p2 ON p2.id = events.petugas2");
		return $resultQuery->result_array();
	}











}