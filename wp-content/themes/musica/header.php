<?php 
$kopa_logo = get_option('kopa_theme_options_logo_url');
$kopa_socials = array(
    'twitter'   => get_option( 'kopa_theme_options_social_links_twitter_url' ),
    'facebook'  => get_option( 'kopa_theme_options_social_links_facebook_url' ),
    'gplus'     => get_option( 'kopa_theme_options_social_links_gplus_url' ),
    'pinterest' => get_option( 'kopa_theme_options_social_links_pinterest_url' ),
    'dribbble'  => get_option( 'kopa_theme_options_social_links_dribbble_url' ),
    'rss'       => get_option( 'kopa_theme_options_social_links_rss_url' ),
);
$kopa_theme_options_social_link_target = get_option('kopa_theme_options_social_link_target', '_self');
$kopa_display_weather = get_option( 'kopa_theme_options_display_weather_status', 'show' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">                   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php kopa_print_page_title(); ?></title>     
    <link rel="profile" href="http://gmpg.org/xfn/11">           
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <?php if ( get_option('kopa_theme_options_favicon_url') ) { ?>       
        <link rel="shortcut icon" type="image/x-icon"  href="<?php echo get_option('kopa_theme_options_favicon_url'); ?>">
    <?php } ?>
    
    <?php if ( get_option('kopa_theme_options_apple_iphone_icon_url') ) { ?>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_option('kopa_theme_options_apple_iphone_icon_url'); ?>">
    <?php } ?>

    <?php if ( get_option('kopa_theme_options_apple_ipad_icon_url') ) { ?>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_option('kopa_theme_options_apple_ipad_icon_url'); ?>">
    <?php } ?>

    <?php if ( get_option('kopa_theme_options_apple_iphone_retina_icon_url') ) { ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_option('kopa_theme_options_apple_iphone_retina_icon_url'); ?>">
    <?php } ?>

    <?php if ( get_option('kopa_theme_options_apple_ipad_retina_icon_url') ) { ?>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_option('kopa_theme_options_apple_ipad_retina_icon_url'); ?>">        
    <?php } ?>

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/PIE_IE678.js"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="page-header">
    <div id="header-top">
        <div class="wrapper clearfix">
            <div id="logo-image">
            <?php if ( ! empty( $kopa_logo ) ) { ?>
                <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( $kopa_logo ); ?>" alt="<?php bloginfo('name'); ?>"></a>
            <?php } else { ?>
                <h1 id="kopa-logo-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
            </div>
            <div id="header-left" class="clearfix">
                <ul class="socials-link clearfix">
                    <?php if ( ! empty( $kopa_socials['twitter'] ) ) { ?>
                        <li><a class="kp-twitter-icon" href="<?php echo esc_url( $kopa_socials['twitter'] ); ?>" data-icon="&#xe1c9;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a></li>
                    <?php } ?>

                    <?php if ( ! empty( $kopa_socials['facebook'] ) ) { ?>
                        <li><a class="kp-facebook-icon" href="<?php echo esc_url( $kopa_socials['facebook'] ); ?>" data-icon="&#xe1c5;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a></li>
                    <?php } ?>

                    <?php if ( ! empty( $kopa_socials['gplus'] ) ) { ?>
                        <li><a class="kp-gplus-icon" href="<?php echo esc_url( $kopa_socials['gplus'] ); ?>" data-icon="&#xe1c1;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a></li>
                    <?php } ?>

                    <?php if ( ! empty( $kopa_socials['pinterest'] ) ) { ?>
                        <li><a class="kp-pinterest-icon" href="<?php echo esc_url( $kopa_socials['pinterest'] ); ?>" data-icon="&#xe1fd;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a></li>
                    <?php } ?>

                    <?php if ( ! empty( $kopa_socials['dribbble'] ) ) { ?>
                        <li><a class="kp-dribbble-icon" href="<?php echo esc_url( $kopa_socials['dribbble'] ); ?>" data-icon="&#xe1da;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a></li>
                    <?php } ?>

                    <?php if ( $kopa_socials['rss'] != 'HIDE' ) { 
                        if ( empty( $kopa_socials['rss'] ) ) {
                            $kopa_socials['rss'] = get_bloginfo('rss2_url');
                        }
                    ?>
                        <li>
                            <a class="kp-rss-icon" href="<?php echo esc_url( $kopa_socials['rss'] ); ?>" data-icon="&#xe1cc;" target="<?php echo $kopa_theme_options_social_link_target; ?>"></a>
                        </li>
                    <?php } ?>
                </ul>
                <!-- socials-link -->

                <?php if ( 'show' == $kopa_display_weather ) {
                    kopa_weather_widget();
                } ?>
                    
            </div>
            <!-- header-left -->
        </div>
        <!-- wrapper -->
    </div>
    <!-- header-top -->
    <div id="header-bottom">
        <div class="wrapper clearfix">
            <nav id="main-nav">
            <?php 
            if ( has_nav_menu( 'main-nav' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'main-nav',
                    'container'      => '',
                    'menu_id'        => 'main-menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>'
                ) );

                $mobile_menu_walker = new kopa_mobile_menu();
                wp_nav_menu( array(
                    'theme_location' => 'main-nav',
                    'container'      => 'div',
                    'container_id'   => 'mobile-menu',
                    'menu_id'        => 'toggle-view-menu',
                    'items_wrap'     => '<span>'.__( 'Menu', kopa_get_domain() ).'</span><ul id="%1$s">%3$s</ul>',
                    'walker'         => $mobile_menu_walker
                ) );
            } ?>
            </nav>
            <!-- main-nav -->
            <div class="search-box clearfix">

                <?php get_search_form(); ?>

            </div>
            <!--search-box-->
        </div>
        <!-- wrapper -->
    </div>
    <!-- header-bottom -->

<!-- google visualize START ---> 

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
  <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([

['País', 'Inscritas en CERA'],
[' ARGENTINA', 367227],
[' FRANCIA', 185220],
[' VENEZUELA', 155893],
[' CUBA', 104984],
[' BRASIL', 101450],
[' ALEMANIA', 97131],
[' MÉXICO', 91689],
[' ESTADOS UNIDOS DE AMÉRICA', 82084],
[' SUIZA', 81471],
[' REINO UNIDO', 63895],
[' URUGUAY', 55547],
[' CHILE', 46310],
[' BÉLGICA', 40765],
[' ANDORRA', 21380],
[' ECUADOR', 19495],
[' PAÍSES BAJOS', 17113],
[' AUSTRALIA', 16030],
[' COLOMBIA', 15098],
[' ITALIA', 14720],
[' PERÚ', 13623],
[' REPÚBLICA DOMINICANA', 13054],
[' CANADÁ', 11576],
[' PORTUGAL', 8058],
[' PANAMÁ', 7257],
[' GUATEMALA', 6053],
[' COSTA RICA', 5594],
[' SUECIA', 5292],
[' BOLIVIA', 4962],
[' MARRUECOS', 4284],
[' IRLANDA', 4183],
[' PARAGUAY', 3619],
[' CHINA', 3317],
[' LUXEMBURGO', 3067],
[' FILIPINAS', 2725],
[' AUSTRIA', 2713],
[' NORUEGA', 2414],
[' DINAMARCA', 1978],
[' EMIRATOS ÁRABES UNIDOS', 1972],
[' HONDURAS', 1880],
[' EL SALVADOR', 1827],
[' ISRAEL', 1689],
[' RUSIA', 1569],
[' JAPÓN', 1345],
[' SUDÁFRICA', 1328],
[' FINLANDIA', 1200],
[' GUINEA ECUATORIAL', 1184],
[' NICARAGUA', 1143],
[' TURQUÍA', 1052],
[' GRECIA', 1025],
[' ARABIA SAUDÍ', 882],
[' QATAR', 797],
[' SINGAPUR', 736],
[' POLONIA', 709],
[' JORDANIA', 681],
[' INDIA', 568],
[' REPÚBLICA CHECA', 562],
[' LÍBANO', 533],
[' NUEVA ZELANDA', 484],
[' TAILANDIA', 474],
[' ARGELIA', 456],
[' EGIPTO', 419],
[' OTROS PAÍSES O TERRITORIOS DE ASIA', 419],
[' INDONESIA', 358],
[' RUMANÍA', 316],
[' TÚNEZ', 307],
[' LIECHTENSTEIN', 299],
[' HUNGRÍA', 289],
[' SIRIA', 281],
[' ANGOLA', 266],
[' COREA', 265],
[' SENEGAL', 249],
[' MALASIA', 238],
[' UCRANIA', 232],
[' NAMIBIA', 221],
[' PAKISTÁN', 197],
[' MOZAMBIQUE', 181],
[' MÓNACO', 180],
[' VIETNAM', 177],
[' KENIA', 176],
[' CAMERÚN', 152],
[' SERBIA', 151],
[' COSTA DE MARFIL', 151],
[' BULGARIA', 150],
[' CHIPRE', 149],
[' MALTA', 140],
[' REPÚBLICA DEMOCRÁTICA DEL CONGO', 140],
[' NIGERIA', 133],
[' CROACIA', 128],
[' REPÚBLICA ESLOVACA', 122],
[' MAURITANIA', 117],
[' ISLANDIA', 110],
[' GHANA', 100],
[' KUWAIT', 97],
[' ETIOPÍA', 90],
[' JAMAICA', 88],
[' CABO VERDE', 84],
[' LIBIA', 82],
[' ESLOVENIA', 78],
[' TANZANIA', 76],
[' OMÁN', 73],
[' LITUANIA', 72],
[' GABÓN', 70],
[' ESTONIA', 60],
[' HAITÍ', 59],
[' IRÁN', 57],
[' ZIMBABWE', 56],
[' BOSNIA Y HERZEGOVINA', 52],
[' TRINIDAD Y TOBAGO', 52],
[' GUINEA-BISSAU', 51],
[' BAHAMAS', 51],
[' LETONIA', 50],
[' SUDÁN', 45],
[' CAMBOYA', 44],
[' KAZAJSTÁN', 39],
[' GAMBIA', 38],
[' AFGANISTÁN', 37],
[' BENIN', 36],
[' MALI', 34],
[' MADAGASCAR', 31],
[' ALBANIA', 30],
[' BANGLADESH', 27],
[' MAURICIO', 25],
[' UGANDA', 25],
[' RUANDA', 23],
[' TOGO', 22],
[' SRI LANKA', 22],
[' NÍGER', 21],
[' MALAWI', 19],
[' BAHRÉIN', 19],
[' GUINEA', 18],
[' TIMOR ORIENTAL', 18],
[' GEORGIA', 17],
[' MACEDONIA', 17],
[' BURKINA FASO', 17],
[' CHAD', 17],
[' LIBERIA', 17],
[' BARBADOS', 17],
[' IRAQ', 17],
[' ZAMBIA', 15],
[' LAOS', 10],
[' NEPAL', 10],
[' MONTENEGRO', 9],
[' SEYCHELLES', 9],
[' MOLDAVIA', 8],
[' BOTSWANA', 8],
[' ANTIGUA Y BARBUDA', 8],
[' BELICE', 8],
[' UZBEKISTÁN', 8],
[' AZERBAIYÁN', 7],
[' MALDIVAS', 7],
[' BELARÚS', 6],
[' REPÚBLICA CENTROAFRICANA', 6],
[' SIERRA LEONA', 6],
[' SUDÁN DEL SUR', 6],
[' SANTA LUCÍA', 6],
[' YEMEN', 6],
[' MYANMAR', 5],
[' FIJI', 5],
[' PAPÚA NUEVA GUINEA', 5],
[' GRANADA', 4],
[' CONGO', 3],
[' SANTO TOMÉ Y PRÍNCIPE', 3],
[' SWAZILANDIA', 3],
[' BRUNEI', 3],
[' MONGOLIA', 3],
[' LESOTHO', 2],
[' GUYANA', 2],
[' VANUATU', 2],
[' SAN MARINO', 1],
[' SANTA SEDE', 1],
[' BURUNDI', 1],
[' DJIBOUTI', 1],
[' ERITREA', 1],
[' SAN CRISTÓBAL Y NIEVES', 1],
[' SAN VICENTE Y LAS GRANADINAS', 1],
[' COREA DEL NORTE (REP.POP)', 1],
[' MICRONESIA', 1],
[' PALAOS', 1]
        ]);

        var options = {
        	colorAxis: {maxValue: 400000,
			    colors: ['#FFFFFF','#dcaf70', '#BA4357','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F']}
	};        

	<!-- colores amarillos:  ['#F3F781','#dcaf70', '#BA4357','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F','#AF1F4F'] ---> 

        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    };
    </script>



<!-- google visualize END ---> 

</header>
<!-- page-header -->

<div id="main-content">
    <div class="wrapper clearfix">
