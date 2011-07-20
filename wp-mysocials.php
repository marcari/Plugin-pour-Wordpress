<?php

/*
Plugin Name: Mes réseaux sociaux - Plugin
Plugin URI: http://www.restezconnectes.fr/plugins/mesreseauxsociaux-plugin.zip
Description: Propose un encart avec différents réseaux sociaux. Facebook Like & Send, Twitter, +1 de Google. Le tout paramètrable et en français uniquement.
Version: 0.1
Author: Florent Maillefaud
Author URI: http://www.restezconnectes.fr
*/


/*
Change Log
16/07/2011 - Ajout d'options des positions (2)
08/07/2011 - Ajout de la page Uninstall
08/07/2011 - Ajout d'options des positions
21/06/2001 - Création du Plugin
*/

if(!defined('WP_CONTENT_URL')) { define('WP_CONTENT_URL', get_option( 'siteurl') . '/wp-content'); }
if(!defined('WP_CONTENT_DIR')) { define('WP_CONTENT_DIR', ABSPATH . 'wp-content'); }
if(!defined('WP_PLUGIN_URL')) { define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins'); }
if(!defined('WP_PLUGIN_DIR')) { define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins'); }


function afficheReseauxSociaux() {

    if(get_option('wpsocial_plugin_settings')) { extract(get_option('wpsocial_plugin_settings')); }

    if(is_single()) {
        $positionReseaux = array(
            fb_like => $fb_settings_single,
            fb_share => $fb_share_settings_single,
            fb_faces => $fb_faces_settings_single,
            plusone => $plusone_settings_single,
            twitter => $twitt_settings_single
        );

    } else if(is_page()) {
         $positionReseaux = array(
            fb_like => $fb_settings_page,
            fb_share => $fb_share_settings_page,
            fb_faces => $fb_faces_settings_page,
            plusone => $plusone_settings_page,
            twitter => $twitt_settings_page
        );

    } else if(is_home()) {
         $positionReseaux = array(
            fb_like => $fb_settings_home,
            fb_share => $fb_share_settings_home,
            fb_faces => $fb_faces_settings_home,
            plusone => $plusone_settings_home,
            twitter => $twitt_settings_home
        );

    } else {
        $positionReseaux = array(
            fb_like => $fb_settings_category,
            fb_share => $fb_share_settings_category,
            fb_faces => $fb_faces_settings_category,
            plusone => $plusone_settings_category,
            twitter => $twitt_settings_category
        );

    }

    if($fb_settings_single==1 or $fb_share_settings_single==1 or $plusone_settings_single==1 or $twitt_settings_single==1) {
        $linkPermaLink = get_permalink($post->ID);
    } else {
        $linkPermaLink = the_permalink();
    }
    /* div général */
    $output .= '<div id="reseauSociaux" style="margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px;">';

        /* Bouton FB Like */
        if($fb_like_btn==1 && $positionReseaux['fb_like']==1) {
            $fbLikeSend = "false";
            $fbLikeClear = '';

            if($fb_send_btn==1) {
               $fbLikeSend = "true";
            }
            if($positionReseaux['fb_faces']==0 or !$positionReseaux['fb_faces']) {
                $output .= '<div id="wp-socials-fb-like">';
                $output .= '<div id="fb-root"></div>';
                $output .= '<script src="http://connect.facebook.net/fr_FR/all.js#appId=241045832586163&amp;xfbml=1"></script>';
                $output .= '<fb:like href="'.$linkPermaLink.'" send="'.$fbLikeSend.'" layout="'.$fb_type_btnlike.'" width="450" show_faces="false" font="lucida grande"></fb:like>';
                $output .= '</div>';
            } else {
                $output .= '<div id="wp-socials-fb-faces">';
                $output .= '<iframe src="http://www.facebook.com/plugins/like.php?href='.$linkPermaLink.'&amp;layout='.$fb_type_btnlike.'&amp;show_faces=true&amp;width=200&amp;action=like&amp;colorscheme=light&amp;height=60&amp;send='.$fbLikeSend.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:60px;" allowTransparency="true"></iframe>';
                $output .= '<div class="clear"></div>';
                $output .= '</div>';
                $output .= '<div class="clear"></div>';
            }
           
        }
        /* ------------ */

        /* div pour les boutons des réseaux sociaux */
        $output .= '<div id="wp-socials-general-btn">';

        /* Bouton FB partager */
        if($fb_share_btn==1 && $positionReseaux['fb_share']==1) {
            if($fb_type_btn=="button_count") { $widthShare = 'width:110px;'; } else { $widthShare = ''; }
            $output .= '<div id="wp-socials-fb-share" style="'.$widthShare.'">
                    <a name="fb_share" type="'.$fb_type_btn.'" share_url="'.$linkPermaLink.'">Partager</a>
                    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                  </div>';
        }
        /* ------------ */

        /* Bouton ReTwitte */
        if($twitt_btn==1 && $positionReseaux['twitter']==1) {
            $output .= '<div id="wp-socials-twitter">
                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$twitt_type_btn.'"';
            if($twitt_account) { $output .= 'data-via="'.$twitt_account.'"'; }
            $output .= ' data-lang="fr" data-url="'.$linkPermaLink.'">Tweeter</a>
                    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                 </div>';
        }
        /* ------------ */

        /* Bouton +1 de Google */
        if($plusone_btn==1 && $positionReseaux['plusone']==1) {
            if($plusone_type_btn!="tall") { $widthShare = 'width:80px;'; } else { $widthShare = ''; }
            $output .= '<div id="wp-socials-plusone" style="'.$widthShare.'"><g:plusone count="true" size="'.$plusone_type_btn.'" href="'.$linkPermaLink.'"></g:plusone></div>';
        }
        /* ------------ */
        /* Bouton AddThis */
        if($addthis_btn==1) {
            if($addthis_account!="") {
                $pubId = $addthis_account;
                $addThisMore = '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>';
            } else {
                $pubId = 'xa-4e01a6d865a58df0';
                $addThisMore = '';
            }
            $output .= '<div id="wp-socials-addthis">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                    </div>
                    '.$addThisMore.'
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid='.$pubId.'"></script>
                    <!-- AddThis Button END -->
                 </div>';
        }
        /* ------------ */

        $output .= '<div clas="clear"></div>';
        $output .= '</div>';
        /* Fin div pour les boutons des réseaux sociaux */

    $output .= '<div class="clear"></div>';
    $output .= '</div>';
    /* fin div général */

    return $output;
}

function add_social_content($content) {

    global $single;

    if(get_option('wpsocial_plugin_settings'))  {
        extract(get_option('wpsocial_plugin_settings'));
        $output = afficheReseauxSociaux();
        return $content.$output.$add;

    } else {
        return $content;
    }
}
add_filter('the_content', 'add_social_content', 10);
add_filter('the_excerpt', 'add_social_content', 10);

//récupère le formulaire d'administration du plugin
function adminSocialPanel() {
    include("wp-mysocials-admin.php");
}

function wpSocialCSS() {
    $siteurl = get_option('siteurl');
    $url = $siteurl.'/wp-content/plugins/'.basename(dirname(__FILE__)).'/wp-mysocials-css.css';
    echo "<link href='$url' rel='stylesheet' type='text/css' />";
}

function plusOneOptions() {
    extract(get_option('wpsocial_plugin_settings'));
    if($plusone_btn==1) {
    echo '<link rel="canonical" href="'.get_permalink($post->ID).'" />
';
    echo "<script src=\"http://apis.google.com/js/plusone.js\" type=\"text/javascript\" >{lang: 'fr'}</script>
";
    }
}


function addWpSocialAdmin() {
    $hook = add_options_page("Options pour l'affichage réseaux sociaux", "Mes Réseaux Sociaux",  10, __FILE__, "adminSocialPanel");
    //Garantit que le style s'ajoute seulement notre page d'admin et ne vienne pas empiÈter sur les autres pages
    //add_action("admin_head-{$hook}", 'wpSocialCSS' );
}

//intègre le tout aux pages Admin de Wordpress
add_action("admin_menu", "addWpSocialAdmin");
add_action('wp_head', 'plusOneOptions');
add_action('wp_head', 'wpSocialCSS' );

?>
