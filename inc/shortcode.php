<?php
/**
 * erw-builder functions and definitions
 *
 * @package erw-builder
 */

add_shortcode( 'page_header', function ( $atts, $content = null ) {
    extract( shortcode_atts( array( 'class' => '', ), $atts ) );
    global $post;
    ob_start();
    $exit = '<div id="page-title-'. $post->ID .'" class="page_title1 parallax '.$class.'" style="background-image: url(\''. wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) .'\')";>';
    $exit .= ob_get_clean();
    $content =    do_shortcode($content);
    $exit .= $content."</div>";
    return $exit;
} );

/*------------------------------------------------------------
 *= [h1], [h2], [h3], [h4], [h5], [p], [section], [article]
 *------------------------------------------------------------ */
$tags = array('h1','h2','h3','h4','h5','h6','p','section','article');
foreach( $tags as $tag ) {
    add_shortcode( $tag, function( $atts, $content = null, $tag ) {
        extract( shortcode_atts( array( 'class' => '', 'id' => '', 'style' => '', ), $atts ) );
        if (isset($id) && $id != "") { $_id='id="'.esc_attr($id).'"'; }
        if (isset($class) && $class != "") { $_class='class="'.esc_attr($class).'"'; }
        $output = sprintf( '<%1$s %2$s %3$s>%4$s</%1$s>', 
            esc_attr($tag),
            $_class,
            $_id,
            do_shortcode( $content )
        );
        return $output;
    });
}
add_shortcode( 'section_contact_call', function( $atts ) {
    extract( shortcode_atts( array( 'two' => false, ), $atts ) );
    $phone = ($two == false) ? do_shortcode("[phone class='fw100']") : do_shortcode("[phonetwo class='fw100']");
    $output .= '<section class="sec-cont-contact clearfix">';
    $output .= '    <div class="container">';
    $output .= '        <div class="row align-items-center">';
    $output .= '            <div class="center-vertical img-content col-6">';
    $output .= '                <img src="%1$s" class="img-fluid" alt="Image">';
    $output .= '            </div>';
    $output .= '            <div class="center-vertical text-content text-center col-6">';
    $output .= '                <h1 class="big fw300">%2$s</h1>';
    $output .= '                <h2>%3$s</h2>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '</section>';
    return wp_sprintf( $output, 
        get_stylesheet_directory_uri().'/assets/img/x125a5s28528ad.png', 
        esc_html('Questions?'),
        $phone
    );
});

/*------------------------------------------------------------
 *= [section_page]
 *------------------------------------------------------------ */
add_shortcode( 'section_page', function ( $atts, $content = null ) {
    global $post;
    extract( shortcode_atts( array( 'class' => '', ), $atts ) );
    if ( function_exists('icl_get_languages') ) {
        $id = icl_object_id($post->ID, 'page', false, 'es');
    } else {
       $id = $post->ID;
    }
    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'pheader_img' );
    return sprintf('<section class="layer-overlay parallax %2$s" id="page-title-%1$s" style="%3$s">%4$s</section>',
        esc_attr( $id ),
        esc_attr( $class ),
        'background-image: url(\'' . esc_url( $image_src[0] ) . '\')',
        do_shortcode( $content )
    );
});
/*------------------------------------------------------------
 *= [id_page]
 *------------------------------------------------------------ */
add_shortcode( 'id_page', function ( $atts, $content = null ) {
    global $post;
    return esc_attr('page-title-'.$post->ID);
});
/*------------------------------------------------------------
 *= [title_page]
 *------------------------------------------------------------ */
add_shortcode( 'title_page', function ( $atts, $content = null ) {
    ob_start(); // Code ?>
        <h1 class="section-title text-center color_blue Absolute-Center"><?php echo the_title(); ?></h1>
    <?php return ob_get_clean();
});
/*------------------------------------------------------------
 *= [urltheme]
 *------------------------------------------------------------ */
add_shortcode( 'urltheme', function () {
    return esc_attr( get_stylesheet_directory_uri() );
});
/*------------------------------------------------------------
 *= Image Shortcode [img]
 *------------------------------------------------------------ */
add_shortcode( 'img', function ( $atts ) {
    extract( shortcode_atts(
           array(
            'src'       => '#',
            'width'     => false,
            'height'    => false,
            'alt'       => 'Image',
            'theme_url' => false,
            'class'     => 'img-responsive',
        ), $atts ) );

    $src_url = $theme_url ? get_stylesheet_directory_uri().$src : $src;
    return '<img '. $width .' '. $height .' src="'. $src_url .'" class="'. esc_attr($class) .'" alt="'. $alt .'" />';
});
/*------------------------------------------------------------
 *= Google Map Shortcode
 *------------------------------------------------------------ */
add_shortcode( 'google_map', function ( $atts ) {
    extract(
        shortcode_atts(
           array('address' => get_theme_mod('th_address'),
                 'class' => '',
                 'static' => false, ), $atts ) );
    ob_start(); ?>

    <?php if ($static != false): ?>
        <img id='map' class="img-responsive <?php echo $class; ?>" src='https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address; ?>&size=744x280'>
    <?php else: ?>
    <div id="map-canvas" class="<?php echo $class; ?>" style="position: relative;overflow: hidden;transform: translateZ(0px);background-color: rgb(229, 227, 223);display: block;width: 100%;height: 450px;margin: 0 auto;"></div>
    <script type="text/javascript">
        (function($){
        $(document).ready(function(){
            var map, latlng, geocoder, address;
            //define the basic color of your map, plus a value for saturation and brightness
            var $main_color = '#000000',
                $saturation= -100,
                $brightness= 10;
            //we define here the style of the map
            var style= [{
                    //set saturation for the labels on the map
                    elementType: "labels",
                    stylers: [
                        {saturation: $saturation}
                    ]
                },{   //poi stands for point of interest - don't show these lables on the map
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },{
                    //don't show highways lables on the map
                    featureType: 'road.highway',
                    elementType: 'labels',
                    stylers: [
                        {visibility: "off"}
                    ]
                },{
                    //don't show local road lables on the map
                    featureType: "road.local",
                    elementType: "labels.icon",
                    stylers: [
                        {visibility: "off"}
                    ]
                },{
                    //don't show arterial road lables on the map
                    featureType: "road.arterial",
                    elementType: "labels.icon",
                    stylers: [
                        {visibility: "off"}
                    ]
                },{
                    //don't show road lables on the map
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [
                        {visibility: "off"}
                    ]
                },{
                    featureType: "transit",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "poi",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "poi.government",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "poi.sport_complex",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "poi.attraction",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "poi.business",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "transit",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "transit.station",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "landscape",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]

                },{
                    featureType: "road",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                },{
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [
                        { hue: $main_color },
                        { visibility: "on" },
                        { lightness: $brightness },
                        { saturation: $saturation }
                    ]
                }
            ];

            // Set the coordinates of your location
            function initialize() {
                geocoder = new google.maps.Geocoder();
                address = '<?php echo $address; ?>';
                geocoder.geocode({'address': address}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {

                        //set google map options
                        var mapOptions = {
                            center: results[0].geometry.location,
                            zoom: 18,
                            panControl: true,
                            zoomControl: true,
                            mapTypeControl: true,
                            streetViewControl: true,
                            mapTypeId: google.maps.MapTypeId.HYBRID,
                            scrollwheel: false,
                            styles: style,
                        },

                        //inizialize the map
                        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                        map.setCenter(results[0].geometry.location);
                        //add a custom marker to the map

                        var contentString = '<div id="content">'+
                            '<div id="bodyContent" >'+
                            '    <h4 class="text-center"><strong><?php echo bloginfo('name'); ?></strong></h4>'+
                            '    <span><i class="fa fa-phone"></i> <?php echo get_theme_mod('phone'); ?></span><br />'+
                            '    <span><i class="fa fa-phone"></i> <?php echo get_theme_mod('phone2'); ?></span><br />'+
                            '    <span><i class="fa fa-map-marker"></i> <?php echo get_theme_mod('th_address'); ?></span><br />'+
                            '</div>'+
                            '<ul class="social-icons icon-rounded list-inline">'+
                            '    <li><a href="<?php echo get_theme_mod('th_socials_facebook'); ?>"'+
                            '        target="_blank"'+
                            '        title="Facebook">'+
                            '        <i class="fa fa-facebook"></i>'+
                            '    </a></li>'+
                            '    <li><a href="<?php echo get_theme_mod('th_socials_twitter'); ?>"'+
                            '        target="_blank"'+
                            '        title="Twitter">'+
                            '        <i class="fa fa-twitter"></i>'+
                            '    </a></li>'+
                            '    <li><a href="<?php echo get_theme_mod('th_socials_googleplus'); ?>"'+
                            '        target="_blank"'+
                            '        title="Google Plus">'+
                            '        <i class="fa fa-google-plus"></i>'+
                            '    </a></li>'+
                            '</ul>'+
                        '</div>';


                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        }),

                        lat = results[0].geometry.location.lat(),
                        lng = results[0].geometry.location.lng(),

                        mapLink = 'https://www.google.com/maps/preview?ll='+lat+','+lng+'=14&q=<?php echo get_theme_mod('th_address'); ?>',

                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            visible: true,
                            title: '<?php echo bloginfo('name'); ?>',
                            labelContent: '<i class="fa fa-send fa-3x" style="color:rgba(153,102,102,0.8);"></i>',
                            labelAnchor: new google.maps.Point(22, 50)
                        });
                        marker.addListener('mouseover', function() {
                            infowindow.open(map, marker);
                        });
                        marker.addListener('click', function() {
                            window.open(mapLink,'_blank');
                        });

                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
            google.maps.event.addDomListener(window, "load", initialize);
        }); // End document ready
    })(this.jQuery);
    </script>
    <?php endif ?>
    <?php return ob_get_clean();
});


/*------------------------------------------------------------
 *= social-icons Shortcode [social]
 *------------------------------------------------------------ */
add_shortcode( 'social', function ( $atts ) {
    extract( shortcode_atts( array( 'class' => 'contact-social', 'id' => ''), $atts ) );
    $social_sites = chosen_social_array();
    $output = "<ul id='$id' class='list-unstyled list-inline $class'>";
        foreach ( $social_sites as $social_site => $value ){        
            $_social_value   = get_theme_mod($value);
            if ( !empty( $_social_value ) ){
                $output .= "<li class='mr-1'>";
                $output .= "    <a class='tooltips $social_site'";
                $output .= "        href='$_social_value'";
                $output .= "        target='_blank'";
                $output .= "        title='$social_site'";
                $output .= "        data-toggle='tooltip'";
                $output .= "        data-placement='top'";
                $output .= "        data-original-title='$social_site'";
                $output .= "        alt='$social_site'>";
                $output .= "            <i class='fa fa-$social_site'></i>";
                $output .= "    </a>";
                $output .= "</li>";
            }
        }
    $output .= "</ul>";
    return $output;
});

/*------------------------------------------------------------
 *= [Phone]
 *------------------------------------------------------------ */
add_shortcode( 'phone', function ( $atts ) {
    extract( shortcode_atts( array(
        'id'       => '',
        'phonetwo' => false,
        'class'    => '', ), $atts ) );

    $phone  = get_theme_mod('phone');
    $phone2 = get_theme_mod('phonetwo');

    ob_start(); ?>

    <?php if(isset($phone) && $phone != "" && $phonetwo != true): ?>
        <a class="<?php echo esc_attr($class); ?>" href="tel:<?php echo format_phone(null,$phone);?>"><?php echo format_phone('us', $phone);?></a>
    <?php endif ?>
    <?php if(isset($phone2) && $phone2 != "" && $phonetwo != false): ?>
        <a class="<?php echo esc_attr($class); ?>" href="tel:<?php echo format_phone(null,$phone2);?>"><?php echo format_phone('us', $phone2);?></a>
    <?php endif ?>
    <?php return ob_get_clean();
});
/*------------------------------------------------------------
 *= name Shortcode
 *------------------------------------------------------------ */
add_shortcode( 'name', function ( $atts ) {
    // Attributes
    extract( shortcode_atts( array( 'id' => '', 'class' => '', 'tag' => 'span', ), $atts ) );
    ob_start(); // Code ?>

    <<?php echo $tag; ?> class="<?php echo $class; ?>" id="<?php echo $id; ?>"><?php echo bloginfo('name'); ?></<?php echo $tag; ?>>

    <?php return ob_get_clean();
});
/*------------------------------------------------------------
 *= Email
 *------------------------------------------------------------ */
add_shortcode( 'email', function ( $atts ) {
    extract( shortcode_atts( array(
        'id'       => '',
        'class'    => '', ), $atts ) );
    return '<a href="mailto:'.get_theme_mod('th_email').'">'.get_theme_mod('th_email').'</a>';
});
/*------------------------------------------------------------
 *= Post Category
 *------------------------------------------------------------ */
//add_shortcode( 'category', 'func_category_shortcode' );
/*------------------------------------------------------------
    [carousel]
        [carousel-item active="true"] ... [/carousel-item]
        [carousel-item] ... [/carousel-item]
        [carousel-item] ... [/carousel-item]
    [/carousel]
 *------------------------------------------------------------ */
function carousel_shortcode( $atts, $content = null ) {
    if( isset($GLOBALS['collapsibles_count']) )
        $GLOBALS['collapsibles_count']++;
    else
        $GLOBALS['collapsibles_count'] = 0;
    $atts = shortcode_atts( array(
        "xclass" => false
    ), $atts );

    $class = ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';
    $id = 'custom-collapse-'. $GLOBALS['collapsibles_count'];

    return sprintf(
        '<div class="panel-group %s" id="%s" role="tablist" aria-multiselectable="true">%s</div>',
        esc_attr( trim($class) ),
        esc_attr($id),
        do_shortcode( $content )
    );
  }
add_shortcode( 'carousel', 'carousel_shortcode' );
/*------------------------------------------------------------
    [carousel-item active="true"] ... [/carousel-item]
    [carousel-item] ... [/carousel-item]
    [carousel-item] ... [/carousel-item]
 *------------------------------------------------------------ */
function carousel_item_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
      "title"  => false,
      "type"   => false,
      "active" => false,
      "xclass" => false
    ), $atts );

    $single_collapse_count = 0;
    $collapsibles_count    = 0;

    $panel_class           = ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';
    $a_class_collapsed     = ( $atts['active'] == 'true' )  ? '' : 'collapsed';

    $collapse_class        = ( $atts['active'] == 'true' )  ? ' in' : ' collapse';

    $parent                = 'custom-collapse-'. $collapsibles_count;
    $current_collapse      = $parent . '-'. create_slug( $atts['title'] );

    // $parent                = isset( $collapsibles_count ) ? 'custom-collapse-' . $collapsibles_count : 'single-collapse';
    // $current_collapse      = $parent . '-' . $single_collapse_count;

    return sprintf(
        '<div class="panel panel-default %1$s">
            <div class="panel-heading" role="tab" id="%5$s">
                <h4 class="panel-title">
                    <a class="%2$s" role="button"
                        data-toggle="collapse"
                        data-parent="#%3$s"
                        aria-expanded="false"
                        href="#collapse-%4$s"
                        aria-controls="collapse-%4$s">%5$s
                    </a>
                </h4>
            </div>
            <div id="collapse-%4$s" class="panel-collapse %6$s" role="tabpanel" aria-labelledby="%4$s">
                <div class="panel-body">%7$s</div>
            </div>
        </div>',
    esc_attr( $panel_class ),
    $a_class_collapsed,
    $parent,
    $current_collapse,
    $atts['title'],
    esc_attr( $collapse_class ),
    do_shortcode( $content ) );
}
add_shortcode( 'carousel-item', 'carousel_item_shortcode' );
