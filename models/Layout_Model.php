<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Front_Default_Header.php';

/**
 * Get the general info of the application
 *
 * @package    Reservation System
 * @subpackage Tropical Casa Blanca Hotel
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Raul Castro <rd.castro.silva@gmail.com>
 */
class Layout_Model
{
    private $db; 
	
	public function __construct()
	{
		$this->db = new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
	
	/**
	 * getGeneralAppInfo
	 *
	 * get all the info that from the table app_info, this is about the application
	 * the name, url, creator and so
	 *
	 * @return array row containing the info
	 */
	
	public function getGeneralAppInfo()
	{
		try {
			$query = 'SELECT * FROM app_info';
	
			return $this->db->getRow($query);
	
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getSliders()
	{
		try {
			$query = 'SELECT * FROM sliders ORDER BY slider_id DESC';
				
			return $this->db->getArray($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getBanner()
	{
		try {
			$query = 'SELECT * FROM banner';
	
			return $this->db->getRow($query);
	
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAliados()
	{
		try {
			$query = 'SELECT * FROM aliados ORDER BY aliado_id DESC';
	
			return $this->db->getArray($query);
	
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCausas()
	{
		try {
			$query = 'SELECT * FROM causas';
				
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getSingleCausas($section_id)
	{
		try {
			$section_id = (int) $section_id;
				
			$query = 'SELECT * FROM causas WHERE causas_id = '.$section_id;
	
			return $this->db->getRow($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLinks()
	{
		try {
			$query = 'SELECT * FROM links';
				
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEspacios()
	{
		try {
			$query = 'SELECT * FROM espacios';
				
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEspaciosByEspacioId($espacio_id)
	{
		try {
			$espacio_id = (int) $espacio_id;
			$query = 'SELECT * FROM espacios WHERE espacios_id = '.$espacio_id;
	
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEspaciosBloques($espacioId)
	{
		try {
			$espacioId = (int) $espacioId;
				
			$query = 'SELECT * FROM espacios_bloques WHERE espacios_id = '.$espacioId.' ORDER BY espacios_bloques_id DESC';
				
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getNewsById($noticiasId)
	{
		try {
			$noticiasId = (int) $noticiasId;
			$query = 'SELECT * FROM noticias WHERE noticias_id = '.$noticiasId;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLastTwoNews()
	{
		try {
			$query = 'SELECT * FROM noticias ORDER BY date DESC LIMIT 2';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLastConservacionTwoNews()
	{
		try {
			$query = 'SELECT * FROM noticias WHERE conservacion = 1 ORDER BY date DESC';
			
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLastBienestarTwoNews()
	{
		try {
			$query = 'SELECT * FROM noticias WHERE bienestar = 1 ORDER BY date DESC';
				
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
// 	public static function ()
// 	{
// 		try {
			
// 		} catch (Exception $e) {
// 			return false; 
// 		}
// 	}

	public function getLastEducacionTwoNews()
	{
		try {
			$query = 'SELECT * FROM noticias WHERE educacion = 1 ORDER BY date DESC';
	
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getNewsGallery($noticias_id)
	{
		try {
			$query = 'SELECT * FROM noticias_gallery WHERE noticias_id = '.$noticias_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getNewsVideo($noticias_id)
	{
		try {
			$query = 'SELECT * FROM noticias_videos WHERE noticias_id = '.$noticias_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getDirectorio()
	{
		try {
			$query = 'SELECT * FROM directorio ORDER BY directorio_id ASC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
}
