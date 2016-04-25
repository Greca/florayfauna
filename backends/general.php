<?php

$root = $_SERVER['DOCUMENT_ROOT'];

/**
 * Includes the file /models/Layout_Model.php 
 * in order to interact with the database
 */
require_once $root.'/models/Layout_Model.php';


/**
 * Contains the classes for access to the basic app info without log-in
 *
 * @package    Reservation System
 * @subpackage Tropical Casa Blanca Hotel
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Raul Castro <rd.castro.silva@gmail.com>
 */
class generalFrontBackend
{
	protected  $model;
	
	/**
	 * Initialize a class, the model one
	 */
	public function __construct()
	{
		$this->model = new Layout_Model();
	}
	
	/**
	 * Based on the section it returns the right info that could be propagated along the application
	 * 
	 * @param string $section
	 * @return array Array with the asked info of the application 
	 */
	public function loadBackend($section = '')
	{
		$data 		= array();
		
// 		Info of the Application
		
		$appInfoRow = $this->model->getGeneralAppInfo();
		
		$appInfo = array( 
				'title' 		=> $appInfoRow['title'],
				'siteName' 		=> $appInfoRow['site_name'],
				'url' 			=> $appInfoRow['url'],
				'content' 		=> $appInfoRow['content'],
				'description'	=> $appInfoRow['description'],
				'keywords' 		=> $appInfoRow['keywords'],
				'location'		=> $appInfoRow['location'],
				'creator' 		=> $appInfoRow['creator'],
				'creatorUrl' 	=> $appInfoRow['creator_url'],
				'twitter' 		=> $appInfoRow['twitter'],
				'facebook' 		=> $appInfoRow['facebook'],
				'googleplus' 	=> $appInfoRow['googleplus'],
				'pinterest' 	=> $appInfoRow['pinterest'],
				'linkedin' 		=> $appInfoRow['linkedin'],
				'youtube' 		=> $appInfoRow['youtube'],
				'instagram'		=> $appInfoRow['instagram'],
				'email'			=> $appInfoRow['email'],
				'lang'			=> $appInfoRow['lang']
		);
		
		$data['appInfo'] = $appInfo;
		
		$espaciosArray 		= $this->model->getEspacios();
		$data['espacios'] 	= $espaciosArray;
		
		$footerArray 		= $this->model->getFooter();
		$data['footer'] 	= $footerArray;

		switch ($section)
		{
			case 'index':
				$bannerArray 		= $this->model->getBanner();
				$data['banner'] 	= $bannerArray;
				
				$aliadosArray 		= $this->model->getAliados();
				$data['aliados'] 	= $aliadosArray;
				
				$topArray			= $this->model->getCausas();
				$data['causas']		= $topArray;
				
				$linksArray			= $this->model->getLinks();
				$data['links']		= $linksArray;
				
				$noticiasArray		= $this->model->getLastTwoNews();
				$data['noticias'] 	= $noticiasArray;
				
			break;
			
			case 'nosotros':
				$linkInfo			= $this->model->getLinkByCode('nosotros');
				$data['linkInfo'] 	= $linkInfo;
				
				$nosotrosItems 		= $this->model->getNosotrosLinks();
				$data['items']		= $nosotrosItems;
			break;
			
			case 'causas':
				$sectionRow = $this->model->getSingleCausas($_GET['sectionId']);
				$data['section'] = $sectionRow;
				
				switch ($_GET['sectionId'])
				{
					case 100:
						$newsArray 		= $this->model->getLastConservacionTwoNews();
						$data['news'] 	= $newsArray;
					break;
					
					case 101:
						$newsArray 		= $this->model->getLastBienestarTwoNews();
						$data['news'] 	= $newsArray;
					break;
					
					case 102:
						$newsArray 		= $this->model->getLastEducacionTwoNews();
						$data['news'] 	= $newsArray;
					break;
				}
				
				$proyectosArray 	= $this->model->getCausasProyectos($_GET['sectionId']);
				$data['proyectos'] 	= $proyectosArray;
			break;
			
			case 'all-causas':
				$topArray			= $this->model->getCausas();
				$data['causas']		= $topArray;
			break;
			
			case 'all-espacios':
				$linkInfo			= $this->model->getLinkByCode('espacios');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'espacios':
				$sectionRow 		= $this->model->getEspaciosByEspacioId($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
				
				$bloquesArray 		= $this->model->getEspaciosBloques($_GET['sectionId']);
				$data['bloques'] 	= $bloquesArray;
				
				$espaciosArray 		= $this->model->getEspaciosContenidos($_GET['sectionId']);
				$data['contenidos']	= $espaciosArray;
				
				$aliadosArray		= $this->model->getEspaciosAliados($_GET['sectionId']);
				$data['aliados']	= $aliadosArray;
			break;
			
			case 'noticia':
				$sectionRow 		= $this->model->getNewsById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
				
				$galleryArray 		= $this->model->getNewsGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
				
				$videosArray 	= $this->model->getNewsVideo($_GET['sectionId']);
				$data['videos'] = $videosArray;
			break;
			
			case 'directorio':
				$directorioArray = $this->model->getDirectorio();
				$data['directorio'] = $directorioArray;
			break;
			
			case 'aliados':
				$slidersArray 		= $this->model->getAliados();
				$data['aliados'] 	= $slidersArray;
				
				$infoArray				= $this->model->getTestimoniosBySection('aliados');
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'que-hacemos':
				$topArray			= $this->model->getCausas();
				$data['causas']		= $topArray;
				$linkInfo			= $this->model->getLinkByCode('que-hacemos');
				$data['linkInfo'] 	= $linkInfo;
				$linksArray			= $this->model->getLinks();
				$data['links']		= $linksArray;
			break;
			
			case 'logros':
				$logrosArray 	= $this->model->getAllLogros();
				$data['logros'] = $logrosArray;
				
				$fechasLogros 				= $this->model->getAllLogrosFechasDestacadas();
				$data['fechasDestacadas'] 	= $fechasLogros;
				
				$otrosLogros 			= $this->model->getAllLogrosOtros();
				$data['otrosLogros'] 	= $otrosLogros;
			break;
			
			case 'noticias':
				$from = $_GET['from'];
				$to = $_GET['to'];
				
				if ($from && $to)
				{
					$noticiasArray 		= $this->model->getAllNewsRange($from, $to);
				}
				else
				{
					$noticiasArray 		= $this->model->getAllNews();
				}
				
				$data['noticias'] 	= $noticiasArray;
			break;
			
			case 'proyectos':
				$proyectosArray 	= $this->model->getProyectos();
				$data['proyectos'] 	= $proyectosArray;
			break;
			
			case 'proyecto':
				$sectionRow 		= $this->model->getSingleProyecto($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
				
				$linksArray 		= $this->model->getProyectosLinksByIdAndType($_GET['sectionId'], 1);
				$data['links-1'] 	= $linksArray;
				
				$linksArray 		= $this->model->getProyectosLinksByIdAndType($_GET['sectionId'], 2);
				$data['links-2'] 	= $linksArray;
				
				$linksArray 		= $this->model->getProyectosLinksByIdAndType($_GET['sectionId'], 3);
				$data['links-3'] 	= $linksArray;
				
				$galleryArray  		= $this->model->getProyectosGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
				
				$videosArray		= $this->model->getProyectosVideo($_GET['sectionId']);
				$data['videos'] 	= $videosArray;
				
				$aliadosArray		= $this->model->getProyectosAliados($_GET['sectionId']);
				$data['aliados']	= $aliadosArray;
			break;
			
			case 'actividades':
				$from = $_GET['from'];
				$to = $_GET['to'];
				$kind = $_GET['kind'];
				
				if ($from && $to)
				{
					if ($kind=="voluntariado")
					{
						$newsArray 		= $this->model->getAllActividadesRangeVoluntariado($from, $to);
					}
					else 
					{
						$newsArray 		= $this->model->getAllActividadesRange($from, $to);
					}
				}
				else
				{
					$newsArray 			= $this->model->getLastTwoActividades();
				}
				
				$linkInfo			= $this->model->getLinkByCode('actividades');
				$data['linkInfo'] 	= $linkInfo;
				
				$data['actividades'] 	= $newsArray;
			break;
			
			case 'actividad':
				$sectionRow 		= $this->model->getActividadesById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
			
				$galleryArray 		= $this->model->getActividadesGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
			
				$videosArray 	= $this->model->getActividadesVideo($_GET['sectionId']);
				$data['videos'] = $videosArray;
			break;
			
			case 'campanas':
				$newsArray 			= $this->model->getCampanasPromoted();
				$data['promoted'] 	= $newsArray;
				
				$newsArray 			= $this->model->getCampanas();
				$data['campanas'] 	= $newsArray;
			break;
			
			case 'campana':
				$sectionRow 		= $this->model->getCampanasById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
			
				$linksArray = $this->model->getCampanasLinksByIdAndType($_GET['sectionId'], 3);
				$data['links-3'] = $linksArray;
				
				$linksArray = $this->model->getCampanasLinksByIdAndType($_GET['sectionId'], 4);
				$data['links-4'] = $linksArray;
				
				$galleryArray  		= $this->model->getCampanasGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
					
				$videosArray	= $this->model->getCampanasVideo($_GET['sectionId']);
				$data['videos'] = $videosArray;
				
				$aliadosArray		= $this->model->getCampanasAliados($_GET['sectionId']);
				$data['aliados']	= $aliadosArray;
			break;
			
			case 'materiales':
				$newsArray 				= $this->model->getMateriales();
				$data['materiales'] 	= $newsArray;
			break;
			
			case 'material':
				$sectionRow 		= $this->model->getMaterialesById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
					
				$galleryArray  		= $this->model->getMaterialesGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
					
				$videosArray		= $this->model->getMaterialesVideo($_GET['sectionId']);
				$data['videos'] 	= $videosArray;
			break;
			
			case 'servicio':
				$newsArray 		= $this->model->getVoluntariado(1);
				$data['items'] 	= $newsArray;
				
				$infoArray				= $this->model->getTestimoniosBySection('servicios');
				$data['testimonios'] 	= $infoArray;
				
				$linkInfo			= $this->model->getLinkByCode('servicio-social');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'practicas':
				$newsArray 		= $this->model->getVoluntariado(2);
				$data['items'] 	= $newsArray;
				
				$infoArray				= $this->model->getTestimoniosBySection('practicas');
				$data['testimonios'] 	= $infoArray;
				
				$linkInfo			= $this->model->getLinkByCode('practicas-profesionales');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'donativos':
				$newsArray 		= $this->model->getVoluntariado(3);
				$data['items'] 	= $newsArray;
				
				$linkInfo			= $this->model->getLinkByCode('donativos');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'aportaciones':
				$newsArray 		= $this->model->getVoluntariado(4);
				$data['items'] 	= $newsArray;
				
				$linkInfo			= $this->model->getLinkByCode('aportar');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'un-dia':
				$infoArray				= $this->model->getTestimoniosBySection('voluntariado');
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'experiencia':
				$infoArray				= $this->model->getTestimoniosBySection('experiencia');
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'embajadores':
				$newsArray 				= $this->model->getEmbajadores();
				$data['items'] 			= $newsArray;
				
				$infoArray				= $this->model->getTestimoniosBySection('embajadores');
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'embajador':
				$sectionRow 		= $this->model->getEmbajadoresById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
	
				$galleryArray  		= $this->model->getEmbajadoresGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
	
				$videosArray		= $this->model->getEmbajadoresVideo($_GET['sectionId']);
				$data['videos'] 	= $videosArray;
				
				$infoArray				= $this->model->getTestimoniosBySection('embajadores');
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'voluntariado':
				$linkInfo			= $this->model->getLinkByCode('voluntariado');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'ayudar':
				$linkInfo			= $this->model->getLinkByCode('quiero-ayudar');
				$data['linkInfo'] 	= $linkInfo;
				
				$nosotrosItems 		= $this->model->getAyudarLinks();
				$data['items']		= $nosotrosItems;
			break;
			
			case 'voluntariado-item': // voluntariado
				$sectionRow 		= $this->model->getVoluntariadoById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
				
				$infoArray				= $this->model->getTestimoniosBySection($_GET['kind']);
				$data['testimonios'] 	= $infoArray;
			break;
			
			case 'contenido':
				$sectionRow 		= $this->model->getContenidosById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
					
				$galleryArray  		= $this->model->getContenidosGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
					
				$videosArray		= $this->model->getContenidosVideo($_GET['sectionId']);
				$data['videos'] 	= $videosArray;
			break;
			
			case 'productos':
				$newsArray 			= $this->model->getProductos();
				$data['items'] 	= $newsArray;
				
				$linkInfo			= $this->model->getLinkByCode('productos');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			case 'producto':
				$sectionRow 		= $this->model->getProductosById($_GET['sectionId']);
				$data['section'] 	= $sectionRow;
					
				$galleryArray  		= $this->model->getProductosGallery($_GET['sectionId']);
				$data['gallery'] 	= $galleryArray;
					
				$videosArray	= $this->model->getProductosVideo($_GET['sectionId']);
				$data['videos'] = $videosArray;
			break;
			
			case 'aviso':
				$linkInfo			= $this->model->getLinkByCode('aviso');
				$data['linkInfo'] 	= $linkInfo;
			break;
			
			default:
			break;
		}
		
		return $data;
	}
}

$backend = new generalFrontBackend();

