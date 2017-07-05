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
	
	public function getFooter()
	{
		try {
			$query = 'SELECT * FROM footer';
	
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
			$query = 'SELECT * FROM links WHERE indexSection = 1';
				
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
	
	public function getAllNews()
	{
		try {
			$query = 'SELECT * FROM noticias ORDER BY date DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAllNewsRange($from, $to)
	{
		try {
			$query = 'SELECT * FROM noticias WHERE date BETWEEN "'.$from.'" AND "'.$to.'" ORDER BY date DESC';
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
	
	public function getAllLogros()
	{
		try {
			$query = 'SELECT * FROM logros';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAllLogrosFechasDestacadas()
	{
		try {
			$query = 'SELECT * FROM logros_fechas ORDER BY logros_fechas_id DESC';
	
			return $this->db->getArray($query);
	
			return $prep->execute();
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAllLogrosOtros()
	{
		try {
			$query = 'SELECT * FROM logros_otros ORDER BY logros_otros_id DESC';
	
			return $this->db->getArray($query);
	
			return $prep->execute();
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProyectos()
	{
		try {
			$query = 'SELECT * FROM proyectos ORDER BY proyectos_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getSingleProyecto($proyectoId)
	{
		try {
			$proyectoId = (int) $proyectoId;
			$query = 'SELECT * FROM proyectos WHERE proyectos_id = '.$proyectoId;
				
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProyectosLinksByIdAndType($sectionId, $type)
	{
		try {
			$query = 'SELECT * FROM proyectos_links WHERE proyectos_id = '.$sectionId.' AND kind = '.$type.' ORDER BY proyectos_links_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProyectosGallery($proyectos_id)
	{
		try {
			$query = 'SELECT * FROM proyectos_gallery WHERE proyectos_id = '.$proyectos_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProyectosVideo($noticias_id)
	{
		try {
			$query = 'SELECT * FROM proyectos_videos WHERE proyectos_id= '.$noticias_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLastTwoActividades()
	{
		try {
			$query = 'SELECT * FROM actividades WHERE date > CURDATE() ORDER BY date ASC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAllActividadesRange($from, $to)
	{
		try {
			$query = 'SELECT * FROM actividades WHERE date BETWEEN "'.$from.'" AND "'.$to.'" ORDER BY date DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAllActividadesRangeVoluntariado($from, $to)
	{
		try {
			$query = 'SELECT * FROM actividades WHERE date BETWEEN "'.$from.'" AND "'.$to.'" AND voluntariado = 1 ORDER BY date DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getActividadesById($actividades_id)
	{
		try {
			$actividades_id = (int) $actividades_id;
			$query = 'SELECT * FROM actividades WHERE actividades_id = '.$actividades_id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getActividadesGallery($actividades_id)
	{
		try {
			$query = 'SELECT * FROM actividades_gallery WHERE actividades_id = '.$actividades_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getActividadesVideo($actividades_id)
	{
		try {
			$query = 'SELECT * FROM actividades_videos WHERE actividades_id = '.$actividades_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasPromoted()
	{
		try {
			$query = 'SELECT * FROM campanas WHERE promoted = 1 ORDER BY campanas_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanas()
	{
		try {
			$query = 'SELECT * FROM campanas WHERE promoted = 0 ORDER BY campanas_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasById($campanas_id)
	{
		try {
			$campanas_id = (int) $campanas_id;
			$query = 'SELECT * FROM campanas WHERE campanas_id = '.$campanas_id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasLinksByIdAndType($sectionId, $type)
	{
		try {
			$query = 'SELECT * FROM campanas_links WHERE campanas_id = '.$sectionId.' AND kind = '.$type.' ORDER BY proyectos_links_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasGallery($campanas_id)
	{
		try {
			$query = 'SELECT * FROM campanas_gallery WHERE campanas_id = '.$campanas_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasVideo($campanas_id)
	{
		try {
			$query = 'SELECT * FROM campanas_videos WHERE campanas_id = '.$campanas_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getMateriales()
	{
		try {
			$query = 'SELECT * FROM materiales ORDER BY materiales_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getMaterialesById($id)
	{
		try {
			$id = (int) $id;
			$query = 'SELECT * FROM materiales WHERE materiales_id = '.$id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getMaterialesGallery($materiales_id)
	{
		try {
			$query = 'SELECT * FROM materiales_gallery WHERE materiales_id = '.$materiales_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getMaterialesVideo($materiales_id)
	{
		try {
			$query = 'SELECT * FROM materiales_videos WHERE materiales_id = '.$materiales_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getVoluntariado($type)
	{
		try {
			$query = 'SELECT * FROM voluntariado WHERE type = '.$type.' ORDER BY voluntariado_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getVoluntariadoById($id)
	{
		try {
			$id = (int) $id;
			$query = 'SELECT * FROM voluntariado WHERE voluntariado_id = '.$id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEmbajadores()
	{
		try {
			$query = 'SELECT * FROM embajadores ORDER BY materiales_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEmbajadoresById($id)
	{
		try {
			$id = (int) $id;
			$query = 'SELECT * FROM embajadores WHERE materiales_id = '.$id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEmbajadoresGallery($materiales_id)
	{
		try {
			$query = 'SELECT * FROM embajadores_gallery WHERE materiales_id = '.$materiales_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEmbajadoresVideo($materiales_id)
	{
		try {
			$query = 'SELECT * FROM embajadores_videos WHERE materiales_id = '.$materiales_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getTestimoniosBySection($section)
	{
		try {
			$query = 'SELECT * FROM testimonios WHERE '.$section.' = 1 ORDER BY testimonios_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProyectosAliados($section)
	{
		try {
			$query = 'SELECT * FROM proyectos_aliados pa 
					LEFT JOIN aliados a ON a.aliado_id = pa.aliado_id
					WHERE proyectos_id = '.$section;
			
			return $this->db->getArray($query);
			
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEspaciosContenidos($section)
	{
		try {
			$query = 'SELECT * FROM espacios_contenidos ec 
					LEFT JOIN contenidos c ON c.materiales_id = ec.materiales_id
					WHERE ec.espacios_id ='.$section;
			
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getContenidosById($id)
	{
		try {
			$id = (int) $id;
			$query = 'SELECT * FROM contenidos WHERE materiales_id = '.$id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getContenidosGallery($materiales_id)
	{
		try {
			$query = 'SELECT * FROM contenidos_gallery WHERE materiales_id = '.$materiales_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getContenidosVideo($materiales_id)
	{
		try {
			$query = 'SELECT * FROM contenidos_videos WHERE materiales_id = '.$materiales_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProductos()
	{
		try {
			$query = 'SELECT * FROM productos ORDER BY materiales_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProductosById($id)
	{
		try {
			$id = (int) $id;
			$query = 'SELECT * FROM productos WHERE materiales_id = '.$id;
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProductosGallery($materiales_id)
	{
		try {
			$query = 'SELECT * FROM productos_gallery WHERE materiales_id = '.$materiales_id.' ORDER BY picture_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProductosVideo($materiales_id)
	{
		try {
			$query = 'SELECT * FROM productos_videos WHERE materiales_id = '.$materiales_id.' ORDER BY video_id DESC';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCausasProyectos($section)
	{
		try {
			$query = 'SELECT * FROM causas_proyectos cp
					LEFT JOIN proyectos p ON p.proyectos_id = cp.proyectos_id
					WHERE cp.causa_id = '.$section;
	
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getCampanasAliados($section)
	{
		try {
			$query = 'SELECT * FROM campanas_aliados pa
					LEFT JOIN aliados a ON a.aliado_id = pa.aliado_id
					WHERE proyectos_id = '.$section;
				
			return $this->db->getArray($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getLinkByCode($code)
	{
		try {
			$query = 'SELECT * FROM links WHERE code = "'.$code.'"';
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getNosotrosLinks()
	{
		try {
			$query = 'SELECT * FROM links WHERE nosotros = 1';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getAyudarLinks()
	{
		try {
			$query = 'SELECT * FROM links WHERE ayudar = 1';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getEspaciosAliados($section)
	{
		try {
			$query = 'SELECT * FROM espacios_aliados pa
					LEFT JOIN aliados a ON a.aliado_id = pa.aliado_id
					WHERE espacio_id = '.$section;
				
			return $this->db->getArray($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
}
