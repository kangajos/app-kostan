<?php

class Mhaversine extends CI_Model
{
	private $table = "kostan";

	public function getKostan($where = array())
	{
		$tipe_kost = !empty($where['tipe_kost']) ? $where['tipe_kost'] : "";
		$tipe_bayar = !empty($where['tipe_bayar_kost']) ? $where['tipe_bayar_kost'] : "";
		$harga_kost = !empty($where['harga_kost']) ? $where['harga_kost'] : "";
		$fasilitas_kost = !empty($where['fasilitas_kost']) ? $where['fasilitas_kost'] : "";

		if ($tipe_kost) {
			$this->db->or_where("type_kost", $tipe_kost);
		}

		if ($tipe_bayar) {
			$this->db->or_where("type_bayar_kost", $tipe_bayar);
		}

		if ($harga_kost) {
			if ($harga_kost == "murah") {
				$this->db->or_where("harga_kost", "<=", 300000);
			} elseif ($harga_kost == "sedang") {
				$this->db->or_where("harga_kost BETWEEN 310000 AND 800000");
			} else {
				$this->db->or_where("harga_kost", ">=", 810000);
			}
		}
		if ($fasilitas_kost) {
			foreach ($fasilitas_kost as $item) {
				$this->db->or_like("fasilitas_kost", $item);
			}
		}
		return $this->db->get("kostan",5)->result();
	}

//	public function getDistanceBetween(float $latitude1, float $longitude1, float $latitude2, float $longitude2, $unit = 'Mi', $id)
//	{
//		$theta = $longitude1 - $longitude2;
//		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
//		$distance = acos($distance);
//		$distance = rad2deg($distance);
//		$distance = $distance * 60 * 1.1515;
//		$distance = $distance * 6.371;
//		switch ($unit) {
//			case 'Mi':
//				break;
//			case 'Km' :
//				$distance = $distance * 1.609344;
//		}
//		$distance = round($distance, 2);
//		if ($distance <= 5) {
//			$this->db->insert("score", array("kostan_id" => $id, "distance" => $distance));
//		}
//	}

	function getDistanceBetween($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $id, $decimals = 2)
	{
		// Calculate the distance in degrees
		$degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));

		// Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
		switch ($unit) {
			case   'km' :
//				$distance = $degrees * 111.13384;   // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
				$distance = $degrees * 6.371;   // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
				break;
			case   'mi' :
				$distance = $degrees * 69.05482;   // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
				break;
			case   'nmi' :
				$distance = $degrees * 59.97662;   // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
		}
		$jarak = round($distance, $decimals);
		$this->db->insert("score", array("kostan_id" => $id, "distance" => $jarak));
	}
}
