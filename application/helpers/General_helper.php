<?php

function debux($str,$status=FALSE)
{
	echo "<pre>";
	print_r($str);
	echo "</pre>";
	($status==TRUE) ? die() : '' ;
}

function format_date_hi($time)
{
	return DateTime::createFromFormat('d/m/Y H.i',$time)->format('Y-m-d H:i');
}

function formatDateIns($time)
{
	$dateDE = $time;
	$dateObj = \DateTime::createFromFormat("m/d/Y", $dateDE);
	if (!$dateObj)
	{
	    throw new \UnexpectedValueException("Could not parse the date: $date");
	}
	$dateUS = $dateObj->format("Y-m-d");
	return $dateUS;
}

function view_date_hi($time)
{
	if(!empty($time)){
		return date("d/m/Y H.i",strtotime($time));
	}else{
		return null;
	}
}

function viewDateOnly($time)
{
	if(!empty($time)){
		return date("d/m/Y",strtotime($time));
	}else{
		return null;
	}
}

function view_date_dfy($time)
{
	return date("d-F-Y H.i",strtotime($time));
}

function get_img($path)
{
	return base_url()."assets/images/".$path;
}

function getMasterData($field,$table,$key,$id) 
{
	$CI = &get_instance();
	$CI->db->select($field);
	$CI->db->from($table);
	$CI->db->where($key,$id);
	$data =  $CI->db->get()->row();
	return isset($data->$field) ? $data->$field : null;
}

function getStatusUser($id) 
{
	return $id == 1 ? 'Aktif' : 'Non Aktif';
}

function getStatusKendaraan($id) 
{
	return $id == 1 ? 'Tersedia' : 'Tidak Tersedia';
}

function konvert($data)
{

	foreach ($data as $key => $value) {
		$result[$key+1] = round($value->bobot,3);
	}

	return $result;
}

function getDistanceBetween($latitude1, $longitude1, $latitude2, $longitude2, $unit) 
{ 
	$theta = $longitude1 - $longitude2; 
	$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
	$distance = acos($distance); 
	$distance = rad2deg($distance); 
	$distance = $distance * 60 * 1.1515; 
	switch($unit) 
	{ 
		case 'Mi': break; 
		case 'Km' : $distance = $distance * 1.609344; 
	} 
	return (round($distance,2)); 
}

function formatDate($date)
{		
	if(empty($date)){
		return null;
	}else{
		$create=date_create($date);
		return date_format($create,"Y/m/d H:i");
	}
}

function getTopBrands()
{
	$CI = &get_instance();
	$CI->db->select("*");
	$CI->db->from("mst_merk");
	$data =  $CI->db->get()->result();
	return $data;
}

function getTopTipe()
{
	$CI = &get_instance();
	$CI->db->select("*");
	$CI->db->from("mst_tipe");
	$data =  $CI->db->get()->result();
	return $data;
}
