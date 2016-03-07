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
    		$headerClass = '';
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
                                        <li>
                                            <a href="proyectos.html">Proyectos </a>
                                        </li>

                                        <li>
                                            <a href="actividades.html">Actividades </a>
                                        </li>

                                        <li>
                                            <a href="campanas.html">Campañas </a>
                                        </li>

                                        <li>
                                            <a href="materiales-educativos.html">Materiales Educativos </a>
                                        </li>
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
                                    <a href="voluntariado.html">Voluntariado</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="servicio-social.html">Servicio Social </a>
                                        </li>

                                        <li>
                                            <a href="practicas-profesionales.html">Prácticas Profesionales </a>
                                        </li>
                                        <li>
                                            <a href="voluntariado-dia.html">Voluntario por un día </a>
                                        </li>

                                        <li>
                                            <a href="experiencia-360.html">Experiencia 360 </a>
                                        </li>

                                        <li>
                                            <a href="embajador.html">Embajadores por el mundo </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="quiero-ayudar.html">Quiero Ayudar</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="dotativos.html">Donativos </a>
                                        </li>
                                        <li>
                                            <a href="aportaciones.html">Qué puedes aportar </a>
                                        </li>

                                        <li>
                                            <a href="productos-con-causa.html">Productos con causa </a>
                                        </li>
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
    		if ($this->data['section']['has_bg'] == 1 || $_GET['section'] == 1)
    		{
    			?>
    		<section class="well well1">
                <div class="container">
                    <div class="navbar-header">
                        <h1 class="">
                            <a  href="index.html"><br /><small class=""> </small></a>
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
						<a href="quiero-ayudar.html" class="index-icons">
							<i class="fa fa-credit-card"></i>
						</a>
						<p>Ayudar</p>
					</div>
					<div class="col-sm-3">
						<a href="voluntariado.html" class="index-icons">
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
						<a href="proyectos.html" class="btn btn-default">Ver m&aacute;s</a>
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
							foreach ($this->data['espacios'] as $section)
                            {
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              	<div class="thumbnail">
									<a href="/espacios/<?php echo $section['espacios_id']; ?>/<?php echo Tools::slugify($section['title']); ?>/">
										<div class="img-thumbnail">
											<img alt="<?php echo $section['title']; ?>" src="<?php echo $this->data['appInfo']['url']?>images-system/original/<?php echo $section['icon'];?>">
										</div>
										<h5 class="text-center"><?php echo $section['title']; ?></h5>
										<p class="text-justify"><?php echo $section['description']; ?></p>
									</a>
								</div>
							</div>
							<?php
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
		<?php
		echo self::getAllCausas();
		?>
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
						<a href="/materiales-educativos/" class="btn btn-default">ver más</a>
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
				<h3 class="text-center">Noticias Pasadas</h3>
				<div class="row offs1">
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="noticia.html">January 2014</a></li>
							<li><a href="#">February 2014</a></li>
							<li><a href="#">March 2014</a></li>
							<li><a href="#">April 2014</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="#">May 2014</a></li>
							<li><a href="#">June 2014</a></li>  
							<li><a href="#">July 2014</a></li>
							<li><a href="#">August 2014</a></li>
						</ul>
					</div>
					
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="#">September 2014</a></li>
							<li><a href="#">October 2014</a></li>
							<li><a href="#">November 2014</a></li>
							<li><a href="#">December 2014</a></li>               
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
    
    public function getSobreNosotros()
    {
    	ob_start();
    	?>
		<section class="well well7 well7_ins1 parallax" data-url="images/parallax5.jpg" data-mobile="true">
			<div class="container">
				<h3 class="text-center">Más Sobre Nosotros</h3>
				<div class="row offs1">
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="logros.html">Logros</a></li>
							<li><a href="directorio.html">Directorio</a></li>
							<li><a href="aliados.html">Aliados</a></li>
							<li><a href="informes.html">Más información</a></li>
						</ul>
					</div>
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="causas.html">Causas</a></li>
							<li><a href="proyectos.html">Proyectos</a></li>
							<li><a href="actividades.html">Actividades</a></li>
							<li><a href="campanas.html">Campañas</a></li>
							<li><a href="materiales-educativos.html">Materiales Educativos</a></li>
						</ul>
					</div>
					<div class="col-xs-4">
						<ul class="marked-list offs2">
							<li><a href="practicas-profesionales.html">Prácticas Profesionales</a></li>
							<li><a href="voluntariado-dia.html">Voluntariado por un día</a></li>
							<li><a href="experiencia-360.html">Experiencia 360</a></li>
							<li><a href="embajador.html">Embajadores por el mundo</a></li>
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