<?php
/**
 * This file has the main view of the project
 *
 * @package    Reservation System
 * @subpackage Tropical Casa Blanca Hotel
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Raul Castro <rd.castro.silva@gmail.com>
 */

$root = $_SERVER['DOCUMENT_ROOT'];
/**
 * Includes the file /Framework/Tools.php which contains a 
 * serie of useful snippets used along the code
 */
require_once $root.'/Framework/Tools.php';

/**
 * 
 * Is the main class, almost everything is printed from here
 * 
 * @package 	Reservation System
 * @subpackage 	Tropical Casa Blanca Hotel
 * @author 		Raul Castro <rd.castro.silva@gmail.com>
 * 
 */
class Layout_View
{
	/**
	 * @property string $data a big array cotaining info for especified sections
	 */
	private $data;
	
	/**
	 * @property string $title title that will be printed in <title></title>
	 */
	private $title;
	
	private $url;
	
	/**
	 * @property string $section the section of the application, 
	 * it can be 'dashboard', 'members, ... 
	 * 
	 */
	private $section;
	
	/**
	 * get's the data *ARRAY* and the title of the document
	 * 
	 * @param array $data Is a big array with the whole info of the document 
	 * @param string $title The title that will be printed in <title></title>
	 */
	public function __construct($data, $title)
	{
		$this->data = $data;
		$this->title = $title;
		$this->url= $data['appInfo']['url'];
	}    
	
	/**
	 * function printHTMLPage
	 * 
	 * Prints the content of the whole website
	 * 
	 * @param int $section the section that define what will be printed
	 * 
	 */
	
	public function printHTMLPage($section)
    {
    	$this->section = $section;
    ?>
	<!DOCTYPE html>
	<html lang='<?php echo $this->data['appInfo']['lang']; ?>'>
		<head>
			<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->
			<meta charset="utf-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<meta name="format-detection" content="telephone=no" />
    		<meta name="google-site-verification" content="" />
			<link rel="shortcut icon" href="favicon.ico" />
			<link rel="icon" type="image/gif" href="favicon.ico" />
			<title><?php echo $this->title; ?> - <?php echo $this->data['appInfo']['title']; ?></title>
			<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
			<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
			<meta property="og:type" content="website" /> 
			<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
			<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
			<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
			<?php echo self::getCommonDocuments(); ?>			
			<?php 
			switch ($section) 
			{
				case 'index':
 					echo self :: getIndexHeader();
				break;
				
				case 'espacios':
					echo self::getSingleEspaciosHeader();
				break;
				
				case 'noticia':
 					echo self::getSingleNoticiaHeader();
 				break;
 				
 				case 'logros':
 					echo self::getLogrosHeader();
 				break;
 				
				case 'contacto':
					echo self::getContactoHeader();
				break;
				
				case 'registro':
					echo self::getRegistroHeader();
				break;
				
				case 'proyectos':
					echo self::getProyectosHeader();
				break;
				
				case 'proyecto':
					echo self::getSingleProyectoHeader();
				break;
				
				case 'actividades':
					echo self::getActividadesHeader();
				break;
				
				case 'actividad':
					echo self::getSingleActividadHeader();
				break;
				
				case 'campanas':
					echo self::getCampanasHeader();
				break;
				
				case 'campana':
					echo self::getSingleCampanaHeader();
				break;
				
				case 'materiales':
					echo self::getMaterialesHeader();
				break;
				
				case 'material':
					echo self::getSingleMaterialHeader();
				break;
				
				case 'embajador':
					echo self::getSingleMaterialHeader();
				break;
				
				case 'contenidos':
					echo self::getSingleNoticiaHeader();
				break;
				
				case 'producto':
					echo self::getSingleNoticiaHeader();
				break;
				
				case 'voluntariado-item':
					echo self::getSingleVoluntariadoHeader();
				break;
				
			}
			?>
		</head>
		<body>
			<div class="page">
			<?php 
 			echo self :: getHeader();
			?>
				<main>
				<?php 
				switch ($section) 
				{
					case 'index':
						echo self :: getIndexContent();
					break;
					
					case 'nosotros':
						echo self::getNosotrosMain();
					break;
					
					case 'que-hacemos':
						echo self::getQueHacemosMain();
					break;
					
					case 'all-espacios':
						echo self::getAllEspacios();
					break;
					
					case 'causas':
						echo self :: getSingleCausasContent();
					break;
					
					case 'espacios':
						echo self :: getSingleEspaciosContent();
					break;
					
					case 'noticia':
						echo self::getSingleNoticiaContent();
					break;
					
					case 'directorio':
						echo self::getDirectorio();
					break;
					
					case 'aliados':
						echo self::getAliados();
					break;
					
					case 'all-causas':
						echo self::getAllCausas();
					break;
					
					case 'logros':
						echo self::getLogros();
					break;
					
					case 'noticias':
						echo self::getNoticias();
					break;
					
					case 'contacto':
						echo self::getContacto();
					break;
					
					case 'registro':
	 					echo self::getRegistro();
	 				break;
	 				
	 				case 'proyectos':
	 					echo self::getProyectos();
 					break;
					
	 				case 'proyecto':
	 					echo self::getSingleProyecto();
	 				break;
	 				
	 				case 'campanas':
	 					echo self::getCampanas();
 					break;
 					
 					case 'campana':
 						echo self::getSingleCampanaContent();
 					break;
 					
	 				case 'actividades':
	 					echo self::getActividades();
 					break;
 					
 					case 'actividad':
 						echo self::getSingleActividadContent();
 					break;
	 				
 					case 'materiales':
 						echo self::getMateriales();
 					break;
 					
 					case 'material':
 						echo self::getSingleMaterialContent();
 					break;
 					
 					case 'voluntariado':
 						echo self::getVoluntariadoMain();
 					break;
 					
 					case 'servicio':
 						echo self::getServicioMain();
 					break;
 					
 					case 'practicas':
 						echo self::getPracticasMain();
 					break;
 					
 					case 'donativos':
 						echo self::getDonativosMain();
 					break;
 					
 					case 'aportaciones':
 						echo self::getAportacionesMain();
 					break;
 						
 					case 'un-dia':
 						echo self::getUnDiaMain();
 					break;
 					
 					case 'experiencia':
 						echo self::getExperienciaMain();
 					break;
 					
 					case 'embajadores':
 						echo self::getEmbajadoresMain();
 					break;
 					
 					case 'embajador':
 						echo self::getSingleMaterialContent();
 					break;
 					
 					case 'voluntariado-item':
 						echo self::getSingleVoluntariadoContent();
 					break;
 					
 					case 'contenido':
 						echo self::getSingleNoticiaContent();
 					break;
 					
 					case 'ayudar':
 						echo self::getAyudarMain();
 					break;
 					
 					case 'productos':
 						echo self::getProductosMain();
 					break;
 					
 					case 'producto':
 						echo self::getSingleNoticiaContent();
 					break;
 					
					default :
						# code...
					break;
				}
				?>
				</main>
				<?php echo self::getFooter(); ?>
			</div>
			<?php
			echo self::getCommonScripts();
			?>
		</body>
	</html>
    <?php
    }
    
    /**
     * returns the common css and js that are in all the web documents
     * 
     * @return string $documents css & js files used in all the files
     */
    public function getCommonDocuments()
    {
    	ob_start();
    	?>
    	<!-- Bootstrap -->
	    <link href="/css/bootstrap.css" rel="stylesheet">
	
	    <!-- Links -->
	    <link rel="stylesheet" href="/css/owl-carousel.css">
	    <link rel="stylesheet" href="/css/google-map.css">
	
	    <!--JS-->
	    <script src="/js/jquery.js"></script>
	    <script src="/js/jquery-migrate-1.2.1.min.js"></script>
	    
	    <script src="/js/wow.js"></script>
    	
	
	    <!--[if lt IE 9]>
	    <div style=' clear: both; text-align:center; position: relative;'>
	        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
	            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
	                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
	        </a>
	    </div>
	    <script src="js/html5shiv.js"></script>
	    <![endif]-->
	    <script src='/js/device.min.js'></script>
       	<?php 
       	$documents = ob_get_contents();
       	ob_end_clean();
       	return $documents; 
    }
    
    public function getIndexHeader()
    {
    	ob_start();
    	?>
    	<style type="text/css">
    		<?php 
    		if ($this->data['section']['has_bg'] == 1 || $_GET['section'] == 1)
    		{
    			$banner = '';
    			if ($this->data['section']['background'])
    				$banner = $this->data['section']['background'];
    			else 
    				$banner = $this->data['banner']['banner'];
    			?>
    		header 
    		{
		    	background: #000000 url(<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $banner; ?>) no-repeat;
			}
    			<?php
    		}
    		?>
	        
	    </style>
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/mx_MX/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		  $('.messageBody').attr('color', '#fff');
		}(document, 'script', 'facebook-jssdk'));</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getHeader()
    {
    	ob_start();

    	if ($this->data['section']['has_bg'] == 1 || $_GET['section'] == 1)
    	{
    		$headerClass = 'head1';
    		$stuckClass = 'stuck_container';
    		$stuckStyle = '';
    	}
    	else
    	{
    		$headerClass = 'head-stuck custom-head';
    		$stuckClass = 'stuck_container navbar-static-top isStuck';
    		$stuckStyle = 'style="top: 0px; visibility: visible; position: fixed; width: 100%; margin-top: 0px;"';
    	}
    		
    	?>
	   	<!--========================================================
                            HEADER
  		=========================================================-->
        <header class="<? echo $headerClass; ?>">

            <div id="stuck_container" class="<?php echo $stuckClass; ?>" <?php echo $stuckStyle; ?>>
                <nav class="navbar navbar-default navbar-static-top ">
                    <div class="container">

                        <div class="">
                            <ul class="navbar-nav sf-menu" data-type="navbar">
                                <li class="active">
                                    <a href="/">Inicio</a>
                                </li>
                                <li class="dropdown">
                                    <a href="/nosotros/">Nosotros</a>
                                    <ul class="dropdown-menu">

                                        <li><a href="/logros/">Logros </a></li>
                                        <li><a href="/directorio/">Directorio</a></li>
                                        <li><a href="/aliados-y-donantes/">Aliados y Donantes</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="/que-hacemos/">Qué Hacemos</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/causas/">Causas</a></li>
                                        <li><a href="/proyectos/">Proyectos </a></li>
                                        <li><a href="/actividades/">Actividades </a></li>
                                        <li><a href="/campanas/">Campa&ntilde;as </a></li>
                                        <li><a href="/materiales/">Materiales Educativos </a></li>
                                        <li><a href="/noticias/">Noticias</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="/todos-los-espacios/">Espacios</a>
                                    <ul class="dropdown-menu">
                                    	<?php 
                                    	foreach ($this->data['espacios'] as $espacio)
                                    	{
                                    		?>
                                    	<li><a href="<?php echo "/espacios/".$espacio['espacios_id']."/".Tools::slugify($espacio['title']."/")."/"; ?>"><?php echo $espacio['title']; ?></a></li>
                                    		<?php
                                    	}
                                    	?>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="/voluntariado/">Voluntariado</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/servicio-social/">Servicio Social </a></li>
                                        <li><a href="/practicas/">Prácticas Profesionales </a></li>
                                        <li><a href="/voluntariado-por-un-dia/">Voluntario por un día </a></li>
                                        <li><a href="/experiencia-360/">Experiencia 360 </a></li>
                                        <li><a href="/embajadores/">Embajadores por el mundo </a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="/quiero-ayudar/">Quiero Ayudar</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/donativos/">Donativos </a></li>
                                        <li><a href="/que-puedes-aportar/">Qué puedes aportar </a></li>
                                        <li><a href="/productos/">Productos con causa </a></li>
                                    </ul>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="/contacto/">Contacto</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/registrarte/">Registrarte </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <?php 
    		if ($this->data['section']['has_bg'] == 1)
    		{
    			?>
    		<section class="well well1">
                <div class="container">
                </div>
            </section>
    		<?php 
    		}
    		?>
    		
    		<?php 
    		if ($_GET['section'] == 1)
    		{
    			?>
    		<section class="well well1">
                <div class="container">
                    <div class="navbar-header">
                        <h1 class="">
                            <a  href="/"><br /><small class=""> </small></a>
                        </h1>
                    </div>
                    <h3 class="text-center  fw-n"></h3>
                </div>
            </section>
    		<?php 
    		}
    		?>
        </header>
    	<?php
    	$header = ob_get_contents();
    	ob_end_clean();
    	return $header;
    }
    
    public function getTopItems()
    {
    	ob_start();
    	?>
		<section class="well well2">
        	<div class="container">
				<div class="row">
				<?php 
				foreach ($this->data['causas'] as $section)
				{
					?>
					<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="text-center ins1">
								<img alt="<?php echo $section['title']; ?>" src="<?php echo $this->data['appInfo']['url']?>images-system/medium/<?php echo $section['icon'];?>">
							</div>
                            <h4 class="wow fadeInLeft text-center ins1 " data-wow-duration='1s'><?php echo $section['title']; ?></h4>
                            <p class="text-info ins1 wow fadeInLeft text-justify" data-wow-duration='2s'>
                                <?php echo $section['description']; ?>
                            </p>
                            <ul>
                                <li>
                                    <a href="/causas/<?php echo $section['causas_id']; ?>/<?php echo Tools::slugify($section['title']); ?>/"> Ver m&aacute;s </a>
                                </li>
                            </ul>
                        </div>
					<?php
				}
				?>
				</div>
			</div>
		</section>
    	<?php
    	$topItems = ob_get_contents();
    	ob_end_clean();
    	return $topItems;
    }
    
    public function getIndexCall()
    {
    	ob_start();
    	?>
		<section class="well well3 text-center wow fadeIn" data-wow-duration='3s'>
			<div class="container">
				<h2 class="h2_bord">S&Uacute;MATE <br /><small class="small-lines small-lines1"></small></h2>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-3">
						<a href="/quiero-ayudar/" class="index-icons">
							<i class="fa fa-credit-card"></i>
						</a>
						<p>Ayudar</p>
					</div>
					<div class="col-sm-3">
						<a href="/voluntariado/" class="index-icons">
							<i class="fa fa-user-plus"></i>
						</a>
						<p>Voluntariado</p>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		</section>
    	<?php
    	$indexCall = ob_get_contents();
    	ob_end_clean();
    	return $indexCall;
    }
    
    public function getWhatToDo()
    {
    	ob_start();
    	?>
    	<section class="well well3 well3_ins1 text-center">
			<h3 class="text-center">QU&Eacute; HACEMOS</h3>
				
			<div class="img_block">
            <?php 
			foreach ($this->data['links'] as $section)
			{
				?>
				<div class="img_cnt wow fadeInLeft" data-wow-duration='1s'>
					<img alt="<?php echo $section['title']; ?>" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $section['icon'];?>">
					<div class="overlay">
						<time datetime="2015"><span><?php echo $section['title']; ?></span></time>
						<p class="ins3"></p>
						<a href="/proyectos/" class="btn btn-default">Ver m&aacute;s</a>
					</div>
				</div>
				<?php
			}
			?>
			</div>
		</section>
    	<?php
    	$whatToDo = ob_get_contents();
    	ob_end_clean();
    	return $whatToDo;
    }
    
    public function getSpaces()
    {
    	ob_start();
    	?>
    	<section class="well well4">
			<div class="container">
				<h3 class="text-center white">Espacios</h3>
				<div>
					<div class="item">
						<div class="row">
							<?php 
							$i = 1;
							foreach ($this->data['espacios'] as $section)
                            {
                            	$offset = '';
                            	if ($i == 1)
                            		$offset = 'col-md-offset-1';
                            ?>
                            <div class="<?php echo $offset; ?> col-md-2 col-sm-6 col-xs-12">
                              	<div class="thumbnail">
									<a href="/espacios/<?php echo $section['espacios_id']; ?>/<?php echo Tools::slugify($section['title']); ?>/">
										<div class="img-thumbnail">
											<img alt="<?php echo $section['title']; ?>" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $section['icon'];?>">
										</div>
										<h5 class="text-center"><?php echo $section['title']; ?></h5>
										<p class="text-justify elements"><?php echo $section['description']; ?></p>
									</a>
								</div>
							</div>
							<?php
							$i++;
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>
		</section>
    	<?php
    	$spaces = ob_get_contents();
    	ob_end_clean();
    	return $spaces;
    }
    
    public function getNews()
    {
    	ob_start();
    	?>
    	<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="/images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Noticias</h3>
                    <div class="row offs1 center767">
						<?php 
						if ($this->data['noticias'])
						{
							foreach ($this->data['noticias'] as $noticia)
							{
								echo self::getNewsIdenxItems($noticia);
							}
						}
						?>
					</div>
				</div>
		</section>
    	<?php
    	$news = ob_get_contents();
    	ob_end_clean();
    	return $news;
    }
    
    public function getNewsIdenxItems($noticia)
    {
    	ob_start();
    	?>
    	<div class="col-md-3 col-sm-6 col-xs-12">
			<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $noticia['icon'];?>" alt="">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<p class="mwidth text-justify"><?php echo $noticia['description']; ?></p>
			<br>
			<a href="/noticia/<?php echo $noticia['noticias_id']; ?>/<?php echo Tools::slugify($noticia['title']); ?>/">Leer m&aacute;s</a>
		</div>
    	<?php
    	$itemVideo = ob_get_contents();
    	ob_end_clean();
    	return $itemVideo;
    }
    
    public function getSponsorItem($aliado)
    {
    	ob_start();
    	?>
    	<div class="col-md-2 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
			<div class="box2 ta__c">
				<div class="member">
					<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $aliado['aliado'];?>" alt="Flora, Fauna y Cultura de México">
					<div class="member_info">
						<div class="box1">
							<div class="box1_wr">
								<div class="box1_cnt ta__c">
									<ul class="socials-mini">
										<?php 
										if ($aliado['facebook']){ ?><li><a class="fa fa-facebook" href="<?php echo $aliado['facebook']; ?>"></a></li><?php }
										if ($aliado['twitter']){ ?><li><a class="fa fa-twitter" href="<?php echo $aliado['twitter']; ?>"></a></li><?php }
										if ($aliado['gplus']){ ?><li><a class="fa fa-google-plus" href="<?php echo $aliado['gplus']; ?>"></a></li><?php } 
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<?php
    	$item = ob_get_contents();
    	ob_end_clean();
    	return $item;
    }
    
    public function getSponsors()
    {
    	ob_start();
    	?>
    	<!-- ALIADOS Y DONANTES -->
        <section class="well well4">
            <div class="container">
                <h3 class="text-center white">
                    Aliados y donantes
                </h3>

                <div class="owl-carousel">
				<?php 
				if ($this->data['aliados'])
				{
					?>
					<div class="item">
                        <div class="row">
                        <?php
                        $i = 0; 
                        foreach ($this->data['aliados'] as $aliado)
                        {
                        	$i++;
                        	
                        	echo self::getSponsorItem($aliado);
                        	
                        	if ($i >= 6)
                        	{
                        		?>
                        </div>
					</div>	
					<div class="item">
						<div class="row">
                        	<?php
                        	$i = 0;
                        	}
                    	}
                    	?>
                        </div>
                    </div>
					<?php
				}
				?>
                </div>
            </div>
        </section>
    	<?php
    	$sponsors = ob_get_contents();
    	ob_end_clean();
    	return $sponsors;
    }
    
    public function getIndexContent()
    {
    	ob_start();
    	echo self::getTopItems();
    	echo self::getIndexCall();
    	echo self::getWhatToDo();
    	echo self::getSpaces();
    	echo self::getNews();
    	echo self::getSponsors();
    	?>
    	
    	<?php
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleCausasContent()
    {
    	ob_start();
    	?>
    	<section class="well well10 parallax" data-url="/images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3><?php echo $this->data['section']['title']; ?></h3>
                    <div><?php echo $this->data['section']['content']; ?></div>
				</div>
            </div>
        </section>
        
        <section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<h3 class="h3 text-center">Proyectos - <?php echo $this->data['section']['title']; ?></h3>
	        	<div class="row">
	        	<?php 
	        	foreach ($this->data['proyectos'] as $proyecto)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img class="" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $proyecto['icon']; ?>"" alt="">
							<div class="caption">
								<h5><a href="/proyecto/<?php echo $proyecto['proyectos_id']; ?>/<?php echo Tools::slugify($proyecto['title']); ?>/"><?php echo $proyecto['title']; ?></a></h5>
								<p><?php echo $proyecto['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
	            </div>
	        </div>
        </section>
        
        <?php 
        if ($this->data['news'])
        {
        ?>
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="/images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center"><?php echo $this->data['section']['title']; ?> - Noticias</h3>
				<div class="row offs1 center767">
				<?php 
				foreach ($this->data['news'] as $new)
				{
					echo self::getNewsIdenxItems($new);
				}
				?>
				</div>
			</div>
		</section>
    	<?php
        }
        ?>
        
        
        
        <?php
        echo self::getSobreNosotros();
        
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleEspaciosHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<style type="text/css">
    		<?php 
    		if ($this->data['section']['has_bg'] == 1)
    		{
    			$banner = '';
    			if ($this->data['section']['background'])
    				$banner = $this->data['section']['background'];
    			else 
    				$banner = $this->data['banner']['banner'];
    			?>
    		header 
    		{
		    	background: #000000 url(<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $banner; ?>) no-repeat;
		    	padding-top: 64px;
    			padding-bottom: 40px;
			}
    			<?php
    		}
    		?>
	    </style>
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleEspaciosContent()
    {
    	ob_start();
    	?>
        <section class="well well6">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['title']; ?></h3>
						<a rel="vimeo" href="https://youtu.be/<?php echo $this->data['section']['video']; ?>" class="swipebox-video">
							<img class="wow fadeInLeft" data-wow-duration='1s' src="http://img.youtube.com/vi/<?php echo $this->data['section']['video']; ?>/0.jpg" alt="<?php echo $this->data['section']['title']; ?>">
						</a>
						<br />
						<div class="text-justify">
							<?php echo $this->data['section']['content']; ?>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['second_column_title']; ?></h3>
						<?php 
						if ($this->data['bloques'])
						{
							foreach ($this->data['bloques'] as $bloque)
							{
								?>
						<article>
							<time datetime='2015'><span><?php echo $bloque['title']; ?></span></time>
							<p class="text-justify"><?php echo $bloque['description']; ?></p>
						</article>
								<?php
							}
						}
						?>
                    </div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['third_column_title']; ?></h3>
						<div class="text-justify"><?php echo $this->data['section']['third_column_content']; ?></div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Contenidos destacados</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['contenidos'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/contenidos/<?php echo $item['materiales_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		
		<section class="well well3 well3_ins1 text-center">

                <h3 class="text-center">
                  Calendario de Actividades
                </h3>

                <div class="img_block_calendar">
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='.5s'>
                        <img src="/images/calendario/enero.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Enero</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-01-01/2016-02-01/" class="btn btn-default">enero</a>
                        </div>
                    </div>

                    <div class="img_cnt wow fadeInLeft" data-wow-duration='1s'>
                        <img src="/images/calendario/febrero.jpg" alt="calendario-febrero">
                        <div class="overlay">
                            <time datetime="2015"> <span>Febrero </span></time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-02-01/2016-03-01/" class="btn btn-default"> Febrero</a>
                        </div>
                    </div>
                    
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='1s'>
                        <img src="/images/calendario/marzo.jpg" alt="calendario-febrero">
                        <div class="overlay">
                            <time datetime="2015"> <span>Marzo </span></time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-03-01/2016-04-01/" class="btn btn-default"> Marzo</a>
                        </div>
                    </div>
                    
                   
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='2s'>
                        <img src="/images/calendario/abril.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Abril</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-04-01/2016-05-01/" class="btn btn-default">Abril</a>
                        </div>
                    </div>
                    
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='2.5s'>
                        <img src="/images/calendario/mayo.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Mayo</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-05-01/2016-06-01/" class="btn btn-default">Mayo</a>
                        </div>
                    </div>
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='3s'>
                        <img src="/images/calendario/junio.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Junio</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-06-01/2016-07-01/" class="btn btn-default">Junio</a>
                        </div>
                    </div>
                    

                </div>

            </section>
        
        <section class="well well3 well3_ins1 text-center">

                <div class="img_block_calendar">
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='.5s'>
                        <img src="/images/calendario/julio.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Julio</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-07-01/2016-08-01/" class="btn btn-default">Julio</a>
                        </div>
                    </div>

                    <div class="img_cnt wow fadeInLeft" data-wow-duration='1s'>
                        <img src="/images/calendario/agosto.jpg" alt="calendario-febrero">
                        <div class="overlay">
                            <time datetime="2015"> <span>Agosto </span></time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-08-01/2016-09-01/" class="btn btn-default"> Agosto</a>
                        </div>
                    </div>
                    
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='1.5s'>
                        <img src="/images/calendario/septiembre.jpg" alt="calendario-marzo">
                        <div class="overlay">
                            <time datetime="2015"><span> Septiembre</span></time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-09-01/2016-10-01/" class="btn btn-default">Setiembre</a>
                        </div>
                    </div>
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='2s'>
                        <img src="/images/calendario/octubre.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Octubre</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-10-01/2016-11-01/" class="btn btn-default">Octubre</a>
                        </div>
                    </div>
                    
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='2.5s'>
                        <img src="/images/calendario/noviembre.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Noviembre</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-11-01/2016-12-01/" class="btn btn-default">Noviembre</a>
                        </div>
                    </div>
                    <div class="img_cnt wow fadeInLeft" data-wow-duration='3s'>
                        <img src="/images/calendario/diciembre.jpg" alt="calendario-enero">
                        <div class="overlay">
                            <time datetime="2015"><span> Diciembre</span>
                            </time>
                            <p class="ins3">
                                
                            </p>
                            <a href="/actividades/todas/2016-12-01/2017-01-01/" class="btn btn-default">Diciembre</a>
                        </div>
                    </div>
                    

                </div>

            </section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleNoticiaHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<style type="text/css">
    		<?php 
    		if ($this->data['section']['has_bg'] == 1)
    		{
    			$banner = '';
    			if ($this->data['section']['background'])
    				$banner = $this->data['section']['background'];
    			else 
    				$banner = $this->data['banner']['banner'];
    			?>
    		header 
    		{
		    	background: #000000 url(<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $banner; ?>) no-repeat;
			}
    			<?php
    		}
    		?>
	    </style>
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleNoticiaContent()
    {
    	ob_start();
    	?>
		<section class="well well10 parallax" data-url="/images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>
						<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $this->data['section']['portrait']; ?>" alt="<?php echo $this->data['section']['title']; ?>">
					</h3>
					<h5><?php echo $this->data['section']['title']; ?></h5>
					<div class="text-justify"><?php echo $this->data['section']['content']; ?></div>
				</div>
			</div>
		</section>
    	
    	<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		<?php 
      	}
		?>
    	<?php
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getNewsGalleryItem($picture)
    {
    	ob_start();
    	?>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail thumbnail-news">
				<a class="thumb" data-fancybox-group="1" href="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $picture['picture']; ?>">
					<img class="" src="<?php echo $this->data['appInfo']['url']?>images-system/medium/<?php echo $picture['picture']; ?>" alt="">
					<span class="thumb_overlay"></span>
				</a> 
			</div>
		</div>
    	<?php
    	$item = ob_get_contents();
    	ob_end_clean();
    	return $item;
    }
    
    public function getNewsVideoItem($video)
    {
    	ob_start();
    	?>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail thumbnail-1">
				
				<div class="caption">
					<a rel="vimeo" href="https://www.youtube.com/watch?v=<?php echo $video['video']; ?>" class="swipebox-video">
						<img class="" src="http://img.youtube.com/vi/<?php echo $video['video']; ?>/0.jpg" alt="">
					</a>
				</div>  
			</div>
		</div>
    	<?php
    	$item = ob_get_contents();
    	ob_end_clean();
    	return $item;
    }
    
	public function getNosotrosMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>Flora, Fauna y Cultura de México AC.</h3>
					<h5>Sembrando futuro...</h5>
					<p class="text-justify">
					Somos Flora Fauna y Cultura de México A.C., organización de la sociedad civil sin fines de 
					lucro y trabajamos por la conservación de nuestro patrimonio natural y cultural.
					                
					Surgimos como respuesta a las problemáticas ambientales y culturales generadas por el 
					acelerado desarrollo urbano y turístico registrado en el estado de Quintana Roo en las 
					últimas décadas. Fungimos como un vínculo entre los diferentes actores sociales con el 
					fin es sumar esfuerzos para conseguir beneficios colectivos. 
					</p>
				</div>
			</div>
		</section>
		
		<section class="well well6">
			<div class="container">
				<div class="row col-4_mod">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<img src="/images/mision.png" alt="Mision - Flora, Fauna y Cultura de México AC.">
							<div class="caption">
								<p class="text-info">
									<span>Contribuir a mejorar la calidad de vida de nuestra sociedad 
									a través de fomentar la revalorización, el respeto y la conservación 
									del patrimonio natural y cultural de México. 
									</span>
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<img src="/images/vision.png" alt="Vision - Flora, Fauna y Cultura de México AC.">
							<div class="caption">
								<p class="text-info">
									<span>Un mundo en el que nuestro patrimonio natural y cultural sea 
									valorado, cuidado, respetado y compartido por toda la sociedad 
									como algo propio y para beneficio de todos.
									</span>
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<img src="/images/valores.png" alt="Valores - Flora, Fauna y Cultura de México AC.">
							<div class="caption">
								<p class="text-info">
									<span>Amor por la cultura mexicana, amor a la naturaleza, amor a las 
									personas, transparencia, compromiso, alegría, congruencia y 
									honestidad.<br>
									</span>
								</p>
							</div>
						</div>
					</div>
				
				</div>
			</div>        
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
    
	public function getQueHacemosMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>Conoce nuestro trabajo</h3>
					<p class="text-justify">Flora, Fauna y Cultura de México A.C, trabaja día a día para generar estrategias 
					para el cuidado del medio ambiente así como para la promoción de espacios culturales 
					que generen actividades de bienestar comunitario.</p>
					<br>
				</div>
			</div>
		</section>
		
		<section class="well well4">
			<div class="container">
				<h3 class="text-center">Causas</h3>
				<div class="row col-4_mod">
				<?php 
				foreach ($this->data['causas'] as $causa)
				{
					?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<a class="thumb" data-fancybox-group="1" href="<?php echo "/causas/".$causa['causas_id']."/".Tools::slugify($causa['title']).'/'; ?>">
								<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $causa['icon']; ?>" alt="<?php echo $causa['title']; ?>">
								<span class="thumb_overlay"></span>
							</a>  
							<div class="caption">
								<p class="text-info">
									<?php echo $causa['title']; ?><br />
									<span><?php echo $causa['description']; ?></span>
								</p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				</div>
			</div>
		</section>
		
		<section class="well well3 well3_ins1 text-center">
			<h3 class="text-center">QU&Eacute; HACEMOS</h3>
			<div class="img_block">
				<div class="img_cnt wow fadeInLeft" data-wow-duration='1s'>
					<img src="/images/proyectos.jpg" alt="Proyectos Flora, Fauna y Cultura">
					<div class="overlay">
						<time datetime="2015"><span> Proyectos FFCM </span></time>
						<p class="ins3"></p>
						<a href="/proyectos/" class="btn btn-default">Ver proyectos</a>
					</div>
				</div>
				
				<div class="img_cnt wow fadeInLeft" data-wow-duration='2.5s'>
					<img src="/images/actividades.jpg" alt="Actividades Flora, Fauna y Cultura">
					<div class="overlay">
						<time datetime="2015"> <span>Actividades </span></time>
						<p class="ins3"></p>
						<a href="/actividades/" class="btn btn-default"> ver actividades</a>
					</div>
				</div>
				
				<div class="img_cnt wow fadeInLeft" data-wow-duration='2s'>
					<img src="/images/campanas.jpg" alt="Campanas Flora, Fauna y Cultura">
					<div class="overlay">
						<time datetime="2015"><span> Campañas</span></time>
						<p class="ins3"></p>
						<a href="/campanas/" class="btn btn-default">ver campañas</a>
					</div>
				</div>
				
				<div class="img_cnt wow fadeInLeft" data-wow-duration='1.5s'>
					<img src="/images/materiales-educativos.jpg" alt="Mateiales Educativos Flora, Fauna y Cultura">
					<div class="overlay">
						<time datetime="2015"><span> Materiales Educativos</span></time>
						<p class="ins3"></p>
						<a href="/materiales/" class="btn btn-default">ver más</a>
					</div>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getAllEspacios()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>ESPACIOS</h3>
					<p class="text-justify">Flora, Fauna y Cultura de México A.C. opera cinco espacios, ubicados desde el 
					municipio de Tulum hasta el municipio de Solidaridad. Estos espacios son base para el desarrollo 
					de diversos proyectos de Conservación tanto de especies como de ecosistemas claves para la salud 
					ambiental; de Bienestar Comunitario, donde la vinculación con la comunidad y la búsqueda de su bienestar 
					es otro de los ejes principales de trabajo; y de Educación Ambiental que consideramos imprescindibles para 
					un adecuado equilibrio entre ser humano y la naturaleza.</p>
					<br>
				</div>
			</div>
		</section>
		<?php
		echo self::getSpaces();
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
    public function getDirectorio()
    {
    	ob_start();
    	?>
    	<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="/images/parallax3.jpg" data-mobile="true">
    		<div class="container">
    			<h3 class="text-center">Directorio</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['directorio'])
				{
					$i = 0;
					foreach ($this->data['directorio'] as $directorio)
					{
						?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="col-md-6 col-sm-6 col-xs-12 clear-flt">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $directorio['icon']; ?>" alt="">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<p class="mwidth">
								<strong><?php echo $directorio['name']; ?></strong>
								<br> <?php echo $directorio['charge']; ?>
							</p>
							<?php 
							if ($directorio['e_mail'])
							{
								?>
							<a class="font-directory" href="#"><?php echo $directorio['e_mail']; ?></a>
								<?php
							}
							?>
						</div>
					</div>
						<?php
						$i++;
						if ($i == 3)
						{
							$i = 0;
							?>
					</div>
					<div class="row offs1 center767">
							<?php
						}
					}
				}
				?>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getAliados()
    {
    	ob_start();
    	?>
		<section class="well well4">
			<div class="container">
				<h3 class="text-center">Aliados y Donantes</h3>
				<div class="donantes_grid">
					<div class="item">
						<div class="row">
						<?php 
						if ($this->data['aliados'])
						{
							$i = 0;
							foreach ($this->data['aliados'] as $aliado)
							{
								echo self::getSponsorItem($aliado);
								$i++;
								if ($i == 6)
								{
									$i = 0;
									?>
							</div>
							<div class="row">
									<?php
								}
							}
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getAllCausas()
    {
    	ob_start();
    	?>
		<section class="well well4">
			<div class="container">
				<h3 class="text-center">Causas</h3>
				<div class="row col-4_mod">
				<?php 
				foreach ($this->data['causas'] as $causa)
				{
					?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<a class="thumb" data-fancybox-group="1" href="<?php echo "/causas/".$causa['causas_id']."/".Tools::slugify($causa['title']).'/'; ?>">
								<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $causa['icon']; ?>" alt="<?php echo $causa['title']; ?>">
								<span class="thumb_overlay"></span>
							</a>  
							<div class="caption">
								<p class="text-info">
									<?php echo $causa['title']; ?><br />
									<span><?php echo $causa['description']; ?></span>
								</p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getLogrosHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getLogros()
    {
    	ob_start();
    	?>
		<section class="well well7 parallax" data-url="/images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Logros</h3>
				<div class="row">
				<?php 
				if ($this->data['logros'])
				{
					foreach ($this->data['logros'] as $logro)
					{
						?>
						
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<a class="thumb" data-fancybox-group="1" href="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $logro['portrait']; ?>">
								<img class="" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $logro['icon']; ?>" alt="<?php echo $logro['title']; ?>">
								<span class="thumb_overlay"></span>
							</a>
							<div class="caption">
								<h5><a href="#"><?php echo $logro['title']; ?></a></h5>
								<p><?php echo $logro['description']; ?></p>
							</div>
						</div>
					</div>
					<?php
					}
				}
				?>
				</div>
			</div>
		</section>
		<section class="well well8 wow fadeIn" data-wow-duration='3s'>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="text-center">Fechas Destacadas</h3>
						<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 0;">
							<ul class="index-list fa-ul">
							<?php 
							if ($this->data['fechasDestacadas'])
							{
								foreach ($this->data['fechasDestacadas'] as $fecha)
								{
								?>
								<li class="fa fa-calendar-check-o"><a href="<?php echo $fecha['url']; ?>"><?php echo $fecha['title']; ?></a></li><br>
								<?php
								}
							}
							?>
							</ul>
						</div>
					</div>
		
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center">Otros logros</h3>
						<ul class="marked-list">
						<?php 
						if ($this->data['otrosLogros'])
						{
							foreach ($this->data['fechasDestacadas'] as $fecha)
							{
							?>
							<li>- <?php echo $fecha['title']; ?></li>
							<?php
							}
						}
						?>
						</ul>
					</div>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getNoticias()
    {
    	ob_start();
    	?>
		<section class="well well4">
			<div class="container">
				<h3 class="text-center">Noticias</h3>
				<div class="row offs1">
				<?php 
				foreach ($this->data['noticias'] as $noticia)
				{
					?>
					<div class="col-md-3 col-sm-6 col-xs-12">
		              <img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $noticia['icon']; ?>" alt="<?php echo $noticia['title']; ?>" alt="">
		            </div>
		            <div class="col-md-3 col-sm-6 col-xs-12">
						<div class=" mwidth">
							<time datetime='2015'><?php echo Tools::formatMYSQLToFront($noticia['date']); ?></time>
							<p class="text-info"><?php echo $noticia['title']; ?></p>
							<p class=""><?php echo $noticia['description']; ?> </p>
							<p class="text-info"> <a href="/noticia/<?php echo $noticia['noticias_id'].'/'.Tools::slugify($noticia['title']).'/';  ?>">Leer más</a></p>
						</div>  
					</div>
				<?php
				}
				?>
				</div>
			</div>
		</section>
		<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Calendario Noticias</h3>
				<div class="row offs1">
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/noticias/todas/2016-01-01/2016-02-01/">Enero 2016</a></li>
							<li><a href="/noticias/todas/2016-02-01/2016-03-01/">Febrero 2016</a></li>
							<li><a href="/noticias/todas/2016-03-01/2016-04-01/">Marzo 2016</a></li>
							<li><a href="/noticias/todas/2016-04-01/2016-05-01/">Abril 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/noticias/todas/2016-05-01/2016-06-01/">Mayo 2016</a></li>
							<li><a href="/noticias/todas/2016-06-01/2016-07-01/">Junio 2016</a></li>  
							<li><a href="/noticias/todas/2016-07-01/2016-08-01/">Julio 2016</a></li>
							<li><a href="/noticias/todas/2016-08-01/2016-09-01/">Agosto 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/noticias/todas/2016-09-01/2016-10-01/">Septiembre 2016</a></li>
							<li><a href="/noticias/todas/2016-10-01/2016-11-01/">Octubre 2016</a></li>
							<li><a href="/noticias/todas/2016-11-01/2016-12-01/">Noviembre 2016</a></li>
							<li><a href="/noticias/todas/2016-12-01/2017-01-01/">Diciembre 2016</a></li>               
						</ul>
					</div>
				</div>    
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getContactoHeader()
    {
    	ob_start();
    	?>
    	<link rel="stylesheet" href="/css/contact-form.css">
    	<link rel="stylesheet" href="/css/google-map.css">
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    
    
    public function getContacto()
    {
    	ob_start();
    	?>
		<section class="well well7 well7_ins1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-12">
						<h3 class="text-center">Direccion</h3>
						<h5 class=" offs1">Playa Del Carmen</h5>
						<address>Calle</address>
						<address class="addr1">                                           
							<p class="text-primary">Tel:</p>    
							<p>Office<a href='callto:#'> +52 1 984 000 000</a></p>
							<p>cell<a href='callto:#'> +52 1 984 000 000</a></p>
							<p>cell<a href='callto:#'> +52 1 984 000 000</a></p>
						</address>
					</div>
					
					<div class="col-md-9 col-xs-12">
						<h3 class="text-center">Contacto</h3>
						<form id="contact-form" class='contact-form'>
							<div class="contact-form-loader"></div>
							<fieldset>
								<label class="name">
									<input type="text" name="name" placeholder="Name" value="" data-constraints="@Required @JustLetters" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid name.</span>
								</label>
								
								<label class="email">
									<input type="text" name="email" placeholder="E-mail" value="" data-constraints="@Required @Email" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid email.</span>
								</label>
								
								<label class="phone">
									<input type="text" name="phone" placeholder="Phone" value="" data-constraints="@JustNumbers" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid phone.</span>
								</label>
								
								<label class="message">
									<textarea name="message" placeholder="Message" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*The message is too short.</span>
								</label>
								
								<!--  <label class="recaptcha"> <span class="empty-message">*This field is required.</span> </label> -->
								
								<div class="btn-wr text-primary">
								<a class="btn btn-primary btn-left" href="index-4.html#" data-type="submit">Send</a>
								</div>
							</fieldset>
							<div class="modal fade response-message">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
											</button>
											<h4 class="modal-title">Modal title</h4>
										</div>
										<div class="modal-body">You message has been sent! We will be in touch soon.</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$section = ob_get_contents();
    	ob_end_clean();
    	return $section;
    }
    
    public function getRegistroHeader()
    {
    	ob_start();
    	?>
    	<link rel="stylesheet" href="/css/contact-form.css">
    	<link rel="stylesheet" href="/css/google-map.css">
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getRegistro()
    {
    	ob_start();
    	?>
		<section class="well well7 well7_ins1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-12">
						<h3 class="text-center">Direccion</h3>
						<h5 class=" offs1">Playa Del Carmen</h5>
						<address>Calle</address>
						<address class="addr1">                                           
							<p class="text-primary">Tel:</p>    
							<p>Office<a href='callto:#'> +52 1 984 000 000</a></p>
							<p>cell<a href='callto:#'> +52 1 984 000 000</a></p>
							<p>cell<a href='callto:#'> +52 1 984 000 000</a></p>
						</address>
					</div>
					
					<div class="col-md-9 col-xs-12">
						<h3 class="text-center">NEWSLETTER</h3>
						<form id="contact-form" class='contact-form'>
							<div class="contact-form-loader"></div>
							<fieldset>
								<label class="name">
									<input type="text" name="name" placeholder="Name" value="" data-constraints="@Required @JustLetters" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid name.</span>
								</label>
								
								<label class="email">
									<input type="text" name="email" placeholder="E-mail" value="" data-constraints="@Required @Email" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid email.</span>
								</label>
								
								<label class="phone">
									<input type="text" name="phone" placeholder="Phone" value="" data-constraints="@JustNumbers" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid phone.</span>
								</label>
								
								<label class="message">
									<textarea name="message" placeholder="Message" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*The message is too short.</span>
								</label>
								
								<!--  <label class="recaptcha"> <span class="empty-message">*This field is required.</span> </label> -->
								
								<div class="btn-wr text-primary">
								<a class="btn btn-primary btn-left" href="index-4.html#" data-type="submit">Send</a>
								</div>
							</fieldset>
							<div class="modal fade response-message">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
											</button>
											<h4 class="modal-title">Modal title</h4>
										</div>
										<div class="modal-body">You message has been sent! We will be in touch soon.</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$section = ob_get_contents();
    	ob_end_clean();
    	return $section;
    }
    
    public function getProyectosHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getProyectos()
    {
    	ob_start();
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<h3 class="h3 text-center">Proyectos</h3>
	        	<div class="row">
	        	<?php 
	        	foreach ($this->data['proyectos'] as $proyecto)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img class="" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $proyecto['icon']; ?>"" alt="">
							<div class="caption">
								<h5><a href="/proyecto/<?php echo $proyecto['proyectos_id']; ?>/<?php echo Tools::slugify($proyecto['title']); ?>/"><?php echo $proyecto['title']; ?></a></h5>
								<p><?php echo $proyecto['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
	            </div>
	        </div>
        </section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleProyectoHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleProyecto()
    {
    	ob_start();
    	?>
		<section class="well well10 parallax" data-url="/images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3><?php echo $this->data['section']['title']; ?></h3>
					<div class="text-justify"><?php echo $this->data['section']['content']; ?></div>
				</div>
			</div>
		</section>
		
		<section class="well well8 wow fadeIn" data-wow-duration='3s'>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['first_column_title']; ?></h3>
              			<ul class="index-list fa-ul">
              			<?php 
              			foreach ($this->data['links-1'] as $link)
              			{
              				if ($link['url'])
              				{
              					?>
              					<li><i class="fa-li fa fa-asterisk"></i><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
              					<?php
              				}
              				else
              				{
              					?>
              					<li><i class="fa-li fa fa-asterisk"></i><?php echo $link['title']; ?></li>
              					<?php
              				}
              			}
              			?>
              			</ul>  
            		</div>

            		<div class="col-md-4 col-sm-6 col-xs-12">
	              		<h3 class="text-center"><?php echo $this->data['section']['second_column_title']; ?></h3>
	                	<ul class="marked-list">
	                	<?php 
	              		foreach ($this->data['links-2'] as $link)
	              		{
    						if ($link['url'])
              				{
              					?>
              					<li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
              					<?php
              				}
              				else
              				{
              					?>
              					<li><?php echo $link['title']; ?></li>
              					<?php
              				}
	              		}
	              		?>            
	              		</ul>
	            	</div>
	            	
            		<div class="col-md-4 col-sm-12 col-xs-12">
	                	<h3 class="text-center"><?php echo $this->data['section']['third_column_title']; ?></h3>
	                	
	                	<ul class="marked-list">
		                	<?php 
		              		foreach ($this->data['links-3'] as $link)
		              		{
	    						if ($link['url'])
	              				{
	              					?>
	              					<li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
	              					<?php
	              				}
	              				else
	              				{
	              					?>
	              					<li><?php echo $link['title']; ?></li>
	              					<?php
	              				}
		              		}
		              		?>            
	              		</ul>
              		</div>
				</div>
			</div>
		</section>

		<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		<?php 
      	}
		
      	echo self::getSponsors();
      	
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getActividadesHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getActividades()
    {
    	ob_start();
    	?>
		<section class="well well7">
	        <div class="container">
	        	<h3 class="h3 text-center">Actividades</h3>
	        	<div class="row offs1">
	        	<?php 
	        	foreach ($this->data['actividades'] as $actividad)
	        	{
	        		?>
					<div class="col-sm-6 col-xs-12">
						<div class="thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $actividad['portrait']; ?>" alt="">
							<div class="caption">
								<time datetime='2016'><?php echo Tools::formatMYSQLToFront($actividad['date']); ?></time>
								<p>
								<?php echo $actividad['description']; ?> 
								</p>
								<br>
								<a href="/actividad/<?php echo $actividad['actividades_id']; ?>/<?php echo Tools::slugify($actividad['title']); ?>/">Leer más</a>
							</div>
						</div>
					</div>
	        		<?php
	        	}
	        	?>
	            </div>
	        </div>
        </section>
        <section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>Participa</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getActividadesCalendar();
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getActividadesCalendar()
    {
    	ob_start();
    	?>
    	<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Calendario Actividades</h3>
				<div class="row offs1">
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/todas/2016-01-01/2016-02-01/">Enero 2016</a></li>
							<li><a href="/actividades/todas/2016-02-01/2016-03-01/">Febrero 2016</a></li>
							<li><a href="/actividades/todas/2016-03-01/2016-04-01/">Marzo 2016</a></li>
							<li><a href="/actividades/todas/2016-04-01/2016-05-01/">Abril 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/todas/2016-05-01/2016-06-01/">Mayo 2016</a></li>
							<li><a href="/actividades/todas/2016-06-01/2016-07-01/">Junio 2016</a></li>  
							<li><a href="/actividades/todas/2016-07-01/2016-08-01/">Julio 2016</a></li>
							<li><a href="/actividades/todas/2016-08-01/2016-09-01/">Agosto 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/todas/2016-09-01/2016-10-01/">Septiembre 2016</a></li>
							<li><a href="/actividades/todas/2016-10-01/2016-11-01/">Octubre 2016</a></li>
							<li><a href="/actividades/todas/2016-11-01/2016-12-01/">Noviembre 2016</a></li>
							<li><a href="/actividades/todas/2016-12-01/2017-01-01/">Diciembre 2016</a></li>               
						</ul>
					</div>
				</div>    
			</div>
		</section>
    	<?php
    	$calendar = ob_get_contents();
    	ob_end_clean();
    	return $calendar;
    }
    
    public function getActividadesCalendarVoluntariado()
    {
    	ob_start();
    	?>
    	<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Calendario Actividades</h3>
				<div class="row offs1">
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/voluntariado/2016-01-01/2016-02-01/">Enero 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-02-01/2016-03-01/">Febrero 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-03-01/2016-04-01/">Marzo 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-04-01/2016-05-01/">Abril 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/voluntariado/2016-05-01/2016-06-01/">Mayo 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-06-01/2016-07-01/">Junio 2016</a></li>  
							<li><a href="/actividades/voluntariado/2016-07-01/2016-08-01/">Julio 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-08-01/2016-09-01/">Agosto 2016</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="/actividades/voluntariado/2016-09-01/2016-10-01/">Septiembre 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-10-01/2016-11-01/">Octubre 2016</a></li>
							<li><a href="/actividades/voluntariados/2016-11-01/2016-12-01/">Noviembre 2016</a></li>
							<li><a href="/actividades/voluntariado/2016-12-01/2017-01-01/">Diciembre 2016</a></li>               
						</ul>
					</div>
				</div>    
			</div>
		</section>
    	<?php
    	$calendar = ob_get_contents();
    	ob_end_clean();
    	return $calendar;
    }
    
    
    
    public function getSingleActividadHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleActividadContent()
    {
    	ob_start();
    	?>
		<section class="well well10 parallax" data-url="/images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>
						<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $this->data['section']['portrait']; ?>" alt="<?php echo $this->data['section']['title']; ?>">
					</h3>
					<h5><?php echo $this->data['section']['title']; ?></h5>
					<div class="text-justify"><?php echo $this->data['section']['content']; ?></div>
				</div>
			</div>
		</section>
    	
    	<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		<?php 
      	}
		?>
		
		<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
        <div class="container">
          
            <h3 class="text-center">
              Calendario de Actividades
            </h3>
          <div class="row offs1">
            <div class="col-xs-4">
              <ul class="marked-list offs2">
                <li><a href="actividades-enero.html">Enero </a></li>
                <li><a href="actividades-febrero.html">Febrero</a></li>
                <li><a href="actividades-marzo.html">Marzo</a></li>
                <li><a href="actividades-abril.html">Abril</a></li>
                               
              </ul>
            </div>
            <div class="col-xs-4">
              <ul class="marked-list offs2">
                <li><a href="actividades-mayo.html">Mayo</a></li>
                <li><a href="actividades-junio.html">Junio</a></li>
                <li><a href="actividades-julio.html">Julio</a></li>
                <li><a href="actividades-agosto.html">Agosto</a></li>
                
                               
              </ul>
            </div>
            <div class="col-xs-4">
              <ul class="marked-list offs2">
                <li><a href="actividades-septiembre.html">Septiembre</a></li>
                <li><a href="actividades-octubre.html">Octubre</a></li>
                <li><a href="actividades-noviembre.html">Noviembre</a></li>
                <li><a href="actividades-diciembre.html">Diciembre</a></li>
                               
              </ul>
            </div>
          </div>    
          
        </div>
      </section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getCampanasHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getCampanas()
    {
    	ob_start();
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<h3 class="h3 text-center">Campa&ntilde;as</h3>
	        	<div class="row offs1">
	        	<?php 
	        	foreach ($this->data['promoted'] as $campana)
	        	{
	        		?>
					<div class="col-sm-6 col-xs-12">
						<div class="thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $campana['portrait']; ?>" alt="">
							<div class="caption">
								<p><strong><?php echo $campana['title']; ?></strong></p><br>
								<p><?php echo $campana['description']; ?></p>
								<br>
								<a href="/campana/<?php echo $campana['campanas_id']; ?>/<?php echo Tools::slugify($campana['title']); ?>/">Leer m&aacute;s</a>
							</div>
						</div>
					</div>
	        		<?php
	        	}
	        	?>
	            </div>
	        </div>
        </section>
        
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Otras Campa&ntilde;as</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['campanas'] as $campana)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img class="" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $campana['icon']; ?>" alt="">
							<div class="caption">
								<h5><a href="/campana/<?php echo $campana['campanas_id']; ?>/<?php echo Tools::slugify($campana['title']); ?>/"><?php echo $campana['title']; ?></a></h5>
								<p><?php echo $campana['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleCampanaHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleCampanaContent()
    {
    	ob_start();
    	?>
        <section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<div class="row offs1">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['title']; ?></h3>
						<a rel="vimeo" href="https://youtu.be/<?php echo $this->data['section']['video']; ?>" class="swipebox-video">
							<img class="wow fadeInLeft" data-wow-duration='1s' src="http://img.youtube.com/vi/<?php echo $this->data['section']['video']; ?>/0.jpg" alt="<?php echo $this->data['section']['title']; ?>">
						</a>
						<br />
						<div class="text-justify">
							<?php echo $this->data['section']['content']; ?>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['second_column_title']; ?></h3>
						
						<article>
                  			<?php echo $this->data['section']['second_column_content']; ?>
              			</article>
              			
                    </div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['third_column_title']; ?></h3>
						<div class="text-justify"><?php echo $this->data['section']['third_column_content']; ?></div>
						
						<ul class="marked-list"> 
	                  		<?php 
							if ($this->data['links-3'])
							{
								foreach ($this->data['links-3'] as $link)
								{
									if ($link['url'])
									{
										?>
							<li>
			                  <a href="<?php echo $link['url']; ?>" target="_blank">
			                    <?php echo $link['title']; ?>
			                  </a>
			                </li>
										<?php
									}
									else 
									{
										?>
							<li><?php echo $link['title']; ?></li>
										<?php
									}
								}
							}
							?>    
              			</ul>
					</div>
				</div>
			</div>
		</section>
		
		<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		<?php 
      	}
		?>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getMaterialesHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getMateriales()
    {
    	ob_start();
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<h3 class="h3 text-center">Materiales Educativos</h3>
	        	<div class="row offs1">
	        	<?php 
	        	foreach ($this->data['materiales'] as $item)
	        	{
	        		?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail-2">
							<a class="thumb" data-fancybox-group="1" href="/material/<?php echo $item['materiales_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<span class="thumb_overlay"></span>
							</a>  
							<div class="caption">
								<p class="text-info">
								<?php echo $item['title']; ?><br />
								<span><?php echo $item['description']; ?></span>
								</p>
							</div>
						</div>
					</div>
	        		<?php
	        	}
	        	?>
	            </div>
	        </div>
        </section>
    	<?php
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getSingleMaterialHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleMaterialContent()
    {
    	ob_start();
    	?>
		<section class="well well10 parallax" data-url="/images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>
						<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $this->data['section']['icon']; ?>" alt="<?php echo $this->data['section']['title']; ?>">
					</h3>
					<h5><?php echo $this->data['section']['title']; ?></h5>
					<div class="text-justify"><?php echo $this->data['section']['content']; ?></div>
				</div>
			</div>
		</section>
    	
    	<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		
		<?php
      	}
      	
      	?>
      	
      	<?php 
		if ($this->data['testimonios'])
		{
		?>
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		
		<?php
		} 
		echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getVoluntariadoMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3>Voluntariado</h3>
		            <h5>¿Qué es ser un voluntario para Flora Fauna y Cultura de México A.C.?</h5>
		            <p>
		              	Es donar tu tiempo a cambio de experiencias extraordinarias; 
		                experiencias que cambian tu perspectivas personales y te 
		                hacen más consciente de tu responsabilidad con el medio 
		                ambiente y tu  comunidad.
		            </p>
		            <h5>¿Quieres ser parte del cambio?</h5>
		              
					<p>Aporta tu tiempo a cualquiera de nuestros proyectos<br> <br> <br>
		             <strong>“La mejor forma de encontrarse con uno mismo. 
		                 Es perderse en el servicio hacia otros”</strong><br> Gandhi.
		            </p>
				</div>
			</div>
		</section>
		
		
		<!-- ALIADOS Y DONANTES -->
		<section class="well well4">
			<div class="container">
				<h3 class="text-center">Voluntariado</h3>
				<div class="donantes_grid">
					<div class="item">
						<div class="row text-center">
							<div class="col-md-2 col-md-offset-1 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
								<div class="box2 ta__c">
									<div class="member">
										<a href="/servicio-social/"> <img src="/images/servicio-social.jpg" alt="Flora y Fauna"></a>
									</div>
								</div>
							</div>
							
							<div class="col-md-2 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
								<div class="box2 ta__c">
									<div class="member">
										<a href="/practicas/"> <img src="/images/practicas.jpg" alt="Flora y Fauna"></a>
									</div>
								</div>
							</div>
							
							<div class="col-md-2 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
								<div class="box2 ta__c">
									<div class="member">
										<a href="/voluntariado-por-un-dia/"> <img src="/images/por-un-dia.jpg" alt="Flora y Fauna"></a>
									</div>
								</div>
							</div>
							
							<div class="col-md-2 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
								<div class="box2 ta__c">
									<div class="member">
										<a href="/experiencia-360/"> <img src="/images/experiencia.jpg" alt="Flora y Fauna"></a>
									</div>
								</div>
							</div>
							
							<div class="col-md-2 col-sm-3 col-xs-12 wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
								<div class="box2 ta__c">
									<div class="member">
										<a href="/embajadores/"> <img src="/images/embajadores.jpg" alt="Flora y Fauna"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
				
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getTestimoniosItem($testimonio)
	{
		ob_start();
		?>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $testimonio['icon']; ?>" alt="">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<p class="mwidth"><span class="span_blc"><?php echo $testimonio['description']; ?></span></p>
		</div>
		<br>
		<br>
		<?php
		$testimonio = ob_get_contents();
		ob_end_clean();
		return $testimonio;
	}
	
	public function getServicioMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Servicio Social</h5>
		            
		            <p class="text-justify">
		              El servicio social es una actividad en la cual contribuyes a mejorar 
		              el medio ambiente y tu comunidad.También es la oportunidad perfecta 
		              para que desarrolles nuevas actitudes y habilidades además que puede 
		              poner en práctica los conocimientos obtenidos a lo largo de tus estudios 
		              universitarios.
		            </p>
		            <p class="text-justify">¡Puede ser que desarrolles pasiones que nunca creíste tener!</p>
		              
		            <p class="text-justify">La duración del servicio social depende de la institución a la 
		                  que perteneces.Te invitamos a hacer tu servicio social en el 
		                  programa que más se ajuste a la experiencia que estás buscando.
		            </p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">OPCIONES PARA TU SERVICIO SOCIAL</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/voluntariado-item/<?php echo $item['voluntariado_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/servicios/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getPracticasMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Pr&aacute;cticas profesionales</h5>
		            
		            <p class="text-justify">
		              Es un estancia temporal en la cual puedes adentrarte al mundo laboral y desarrollar 
		              experiencia en causas como conservación protección, rescate e investigación de 
		              nuestros ecosistemas, especies amenazadas y en peligro de extinción así como en el 
		              impulso de educación ambiental y bienestar comunitario.
		            </p>
		            <br><br>
		            <p class="text-justify">La duración depende de la institución a la que perteneces. 
		            Debido a que somos una organización sin ánimo de lucro no podemos ofrecerte una beca 
		            pero en todos nuestros programas ofrecemos una comida diaria, uniforme, si tu estancia 
		            es igual o mayor de un mes eres acreedor a un pase sencillo para los parques Xcaret o 
		            Xel-Há y en algunos espacios puedes recibir alojamiento.</p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">OPCIONES PARA TUS PRÁCTICAS PROFESIONALES</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/voluntariado-item/<?php echo $item['voluntariado_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/practicas/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getUnDiaMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Voluntariado por un d&iacute;a</h5>
		            
		            <p class="text-justify">
		              ¿Quieres ayudar a tu comunidad pero trabajas o tienes tu tiempo reducido? Ser 
		              voluntario es aportar lo más preciado que tienes (tiempo) para mejorar tu entorno 
		              y llevarte una experiencia única. Tenemos muchos espacios donde podrás ser voluntario 
		              por un día. Descubre cuál se ajusta a la experiencia que estás buscando
		            </p>
				</div>
			</div>
		</section>
		<?php echo self::getActividadesCalendarVoluntariado(); ?>
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getExperienciaMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Experiencia 360</h5>
		            
		            <p class="text-justify">
		              FFCM es una organización con muchos espacios y actividades donde generamos 
		              comunidad. Experiencia 360 te ayuda a conocer a nuestra organización siendo 
		              voluntario por un día en cada uno de nuestros espacios y programas.
		            </p>
				</div>
			</div>
		</section>
		<?php echo self::getActividadesCalendar(); ?>
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getEmbajadoresMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Embajadores por el mundo</h5>
		            
		            <p class="text-justify">
		              Nos gusta compartir nuestros conocimientos y tener personas que puedan replicar
		               lo que hacemos en nuestra organización. Un embajador podrá adaptar y utilizar 
		               esta información para dar soluciones a una problemática local. Siendo embajador 
		               de FFCM estarás formando parte clave de nuestra organización, a través de la difusión 
		               de actividades locales, el fomento a la revalorización del patrimonio natural y cultural 
		               de tu región y sobre todo realizando acciones que enriquezcan a la comunidad. Acércate a 
		               nosotros para que en juntos demos soluciones locales para una acción global.
		            </p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">INFORMACIÓN BÁSICA</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/embajador/<?php echo $item['materiales_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getSingleVoluntariadoHeader()
    {
    	ob_start();
    	?>
    	<link href="/css/swipebox.css" media="screen" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="/js/jquery.swipebox.js"></script>
    	<link rel="stylesheet" href="/css/jquery.fancybox.css">
    	<script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    	</script>
    	<script>
        $(function () {
        	$(window).ready(function() {
        		
        		$( '.swipebox-video' ).swipebox();
        	});
        });
    	</script>
    	<?php
    	$indexHeader = ob_get_contents();
    	ob_end_clean();
    	return $indexHeader;
    }
    
    public function getSingleVoluntariadoContent()
    {
    	ob_start();
    	?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
					<h3><?php echo $this->data['section']['title']; ?></h3>
					<div class="text-justify"><?php echo $this->data['section']['content']; ?></div>
				</div>
			</div>
		</section>
      
        <section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
	        <div class="container">
	        	<div class="row offs1">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['first_column_title']; ?></h3>
						<br />
						<div class="text-justify first-column">
							<?php echo $this->data['section']['first_column_content']; ?>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['second_column_title']; ?></h3>
						<br />
						<div class="text-justify">
							<?php echo $this->data['section']['second_column_content']; ?>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="text-center"><?php echo $this->data['section']['third_column_title']; ?></h3>
						<br />
						<div class="text-justify">
							<?php echo $this->data['section']['third_column_content']; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php 
    	if ($this->data['gallery'])
    	{
    	?>
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Galeria de fotos</h3>
				<div class="row">
		            <?php 
	            	foreach ($this->data['gallery'] as $gallery)
	            	{
	            		echo self::getNewsGalleryItem($gallery);
	            	}
		            ?>
		        </div>
	        </div>
      	</section>
      	<?php 
    	}
      	?>
      	
      	<?php
      	if ($this->data['videos'])
      	{ 
      	?>
      	<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
        	<div class="container">
        		<h3 class="h3 text-center">Galeria de Videos</h3>
          		<div class="row">
          		<?php 
          		foreach ($this->data['videos'] as $video)
          		{
          			echo self::getNewsVideoItem($video);
          		}
          		?>
          		</div>
          	</div>
		</section>
		<?php 
      	}
		?>
		
		<?php 
		if ($this->data['testimonios'])
		{
		?>
		<section class="well well8 parallax wow fadeIn" data-wow-duration='3s' data-url="images/parallax3.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Testimonios</h3>
				<div class="row offs1 center767">
				<?php 
				if ($this->data['testimonios'])
				{
					foreach ($this->data['testimonios'] as $testimonio)
					{
						echo self::getTestimoniosItem($testimonio);
					}
				}
				?>
				</div>
			</div>
		</section>
    	<?php
		}
    	echo self::getSobreNosotros();
    	$index = ob_get_contents();
    	ob_end_clean();
    	return $index;	
    }
    
    public function getAyudarMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Quiero Ayudar</h5>
		            
		            <p class="text-justify">
		              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend sed nisl ut dapibus. Curabitur quis accumsan dolor. Nullam dui nulla, placerat vel diam quis, facilisis consequat metus. Curabitur sed arcu eu sem varius congue non at ligula. Nam sollicitudin eros sit amet ultricies tempus. Vivamus faucibus sollicitudin quam sit amet efficitur. Integer luctus aliquam dui sit amet hendrerit. Curabitur laoreet velit est, quis tempus tortor pellentesque vitae. Mauris tempus rutrum tempus. Proin sit amet neque efficitur.
		            </p>
		              
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Cómo puedes ayudar</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/voluntariado-item/<?php echo $item['voluntariado_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/servicios/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getDonativosMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Donativos</h5>
		            
		            <p class="text-justify">
		              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend 
		              sed nisl ut dapibus. Curabitur quis accumsan dolor. Nullam dui nulla, placerat vel 
		              diam quis, facilisis consequat metus. Curabitur sed arcu eu sem varius congue non at 
		              ligula. Nam sollicitudin eros sit amet ultricies tempus. Vivamus faucibus sollicitudin 
		              quam sit amet efficitur. Integer luctus aliquam dui sit amet hendrerit. Curabitur laoreet 
		              velit est, quis tempus tortor pellentesque vitae. Mauris tempus rutrum tempus. Proin sit 
		              amet neque efficitur.
		            </p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Opciones para donar</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/voluntariado-item/<?php echo $item['voluntariado_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/donativos/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getAportacionesMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Que puedes aportar</h5>
		            
		            <p class="text-justify">
		              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend 
		              sed nisl ut dapibus. Curabitur quis accumsan dolor. Nullam dui nulla, placerat vel 
		              diam quis, facilisis consequat metus. Curabitur sed arcu eu sem varius congue non at 
		              ligula. Nam sollicitudin eros sit amet ultricies tempus. Vivamus faucibus sollicitudin 
		              quam sit amet efficitur. Integer luctus aliquam dui sit amet hendrerit. Curabitur laoreet 
		              velit est, quis tempus tortor pellentesque vitae. Mauris tempus rutrum tempus. Proin sit 
		              amet neque efficitur.
		            </p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Opciones para donar</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/voluntariado-item/<?php echo $item['voluntariado_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/que-puedes-aportar/"><?php echo $item['title']; ?></a></h5>
								<p><?php echo $item['description']; ?></p>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
	public function getProductosMain()
	{
		ob_start();
		?>
		<section class="well well10 parallax" data-url="images/parallax4.jpg" data-mobile="true">
			<div class="container text-center">
				<div class="jumbotron">
		              
					<h5>Productos</h5>
		            
		            <p class="text-justify">
		              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend 
		              sed nisl ut dapibus. Curabitur quis accumsan dolor. Nullam dui nulla, placerat vel 
		              diam quis, facilisis consequat metus. Curabitur sed arcu eu sem varius congue non at 
		              ligula. Nam sollicitudin eros sit amet ultricies tempus. Vivamus faucibus sollicitudin 
		              quam sit amet efficitur. Integer luctus aliquam dui sit amet hendrerit. Curabitur laoreet 
		              velit est, quis tempus tortor pellentesque vitae. Mauris tempus rutrum tempus. Proin sit 
		              amet neque efficitur.
		            </p>
				</div>
			</div>
		</section>
		
		<section class="well well7 parallax" data-url="images/parallax2.jpg" data-mobile="true" data-direction="inverse">
			<div class="container">
				<h3 class="h3 text-center">Productos con causa</h3>
				<div class="row">
				<?php 
	        	foreach ($this->data['items'] as $item)
	        	{
	        		?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="thumbnail thumbnail-1">
							<img src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
							<div class="caption">
								<h5><a href="/producto/<?php echo $item['materiales_id']; ?>/<?php echo Tools::slugify($item['title']); ?>/"><?php echo $item['title']; ?></a></h5>
							</div>  
						</div>
					</div>
	        		<?php
	        	}
	        	?>
				</div>
			</div>
		</section>
		<?php
		echo self::getSobreNosotros();
		$section = ob_get_contents();
		ob_end_clean();
		return $section;
	}
	
    public function getSobreNosotros()
    {
    	ob_start();
    	?>
		<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Más Sobre Nosotros</h3>
				<div class="row offs1">
					<div class="col-sm-3">
						<ul class="marked-list offs2">
							<li><a href="/logros/">Logros</a></li>
							<li><a href="/directorio/">Directorio</a></li>
							<li><a href="/aliados-y-donantes/">Aliados</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="marked-list offs2">
							<li><a href="/causas/">Causas</a></li>
							<li><a href="/proyectos/">Proyectos</a></li>
							<li><a href="/actividades/">Actividades</a></li>
							<li><a href="/campanas/">Campa&ntilde;as</a></li>
							<li><a href="/materiales/">Materiales Educativos</a></li>
							<li><a href="/noticias/">Noticias</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="marked-list offs2">
							<li><a href="/servicio-social/">Servicio Social</a></li>
							<li><a href="/practicas/">Prácticas Profesionales</a></li>
							<li><a href="/voluntariado-por-un-dia/">Voluntariado por un día</a></li>
							<li><a href="/experiencia-360/">Experiencia 360</a></li>
							<li><a href="/embajadores/">Embajadores por el mundo</a></li>
						</ul>
					</div>
					
					<div class="col-sm-3">
						<ul class="marked-list offs2">
							<li><a href="/servicio-social/">Donativos</a></li>
							<li><a href="/practicas/">Que puedes aportar</a></li>
							<li><a href="/voluntariado-por-un-dia/">Productos con causa</a></li>
						</ul>
					</div>
				</div>    
			</div>
		</section>
    	<?php
    	$nosotros = ob_get_contents();
    	ob_end_clean();
    	return $nosotros;
    }
    
    public function getFooter()
    {
    	ob_start();
    	?>
    	<!--========================================================
                            FOOTER
		  =========================================================-->
		<footer class="foot1 parallax" data-url="/images/parallax1.jpg" data-mobile="true" data-direction="inverse">
			<section class="well5">      
				<div class="container text-center"> 
					<div class="navbar-header">
						<h1 class="navbar-brand">
							<img src="/images/logo-png.png" alt="<?php echo $this->data['appInfo']['title']; ?>" />
							<small class="small-lines">
								&#169; <span id="copyright-year"></span>   
								<a class="policy" href="#"></a>
								<!-- {%FOOTER_LINK} -->
							</small>             
						</h1>
					</div>
					
					<ul class="inline-list">
						<li><a href="<?php echo $this->data['appInfo']['facebook']; ?>" target="_blank" class="fa fa-facebook">facebook</a></li>
						<li><a href="<?php echo $this->data['appInfo']['twitter']; ?>" target="_blank" class="fa fa-twitter">twitter</a></li>
						<li><a href="<?php echo $this->data['appInfo']['instagram']; ?>" target="_blank" class="fa  fa-instagram"> Instagram</a></li>
						<li><a href="<?php echo $this->data['appInfo']['googleplus']; ?>" target="_blank" class="fa fa-google-plus">google-plus</a></li>
						<li><a href="<?php echo $this->data['appInfo']['youtube']; ?>" target="_blank" class="fa fa-youtube">google-plus</a></li>
					</ul>               
				</div> 
			</section>  
		</footer>
    	<?php
    	$footer = ob_get_contents();
    	ob_end_clean();
    	return $footer;
    }
    
    public function getCommonScripts()
    {
    	ob_start();
    	?>
    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="/js/bootstrap.min.js"></script>
	    <script src="/js/tm-scripts.js"></script>
	    <!-- </script> -->
    	<?php
    	$scripts = ob_get_contents();
    	ob_end_clean();
    	return $scripts;
    }
}