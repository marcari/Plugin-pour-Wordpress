<?php
/* Update si changements */
if($_POST['action'] == 'update') {
    update_option('wpsocial_plugin_settings', $_POST["wpsocial_plugin_settings"]);
    $options_saved = true;
    echo '<div id="message" class="updated fade"><p><strong>Options sauvegardées.</strong></p></div>';
}
?>
<div class="wrap wp_socials">
<h2>Options de personnalisation Mes Réseaux Sociaux</h2>
<form method="post" action="">
<?php settings_fields('wpsocial-plugin-settings'); ?>
<?php $options = get_option('wpsocial_plugin_settings'); ?>
<?php
/* Par défaut */
if(!$options)  {
    $options = array(
        fb_like_btn => 1,
        fb_send_btn => 1,
        fb_faces_btn => 1,
        fb_type_btnlike => 'button_count',
        fb_settings_single => 1,
        fb_share_btn => 1,
        fb_share_settings_single => 1,
        twitt_btn => 1,
        twitt_settings_single => 1,
        plusone_settings_single => 1,
        twitt_type_btn => 'horizontal',
        plusone_btn => 1,
        plusone_type_btn => 'medium',
        margin_top => 20,
        margin_bottom => 0
    );
    update_option('wpsocial_plugin_settings', $options);
}
/* Fin options */

?>
  <ul>
    <li>&nbsp;</li>
    <!-- BOUTON FACEBOOK LIKE -->
    <li><b>Bouton Facebook "Like"</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_like_btn]" value="1" <?php if($options['fb_like_btn']==1) { echo "checked"; } ?> />  Affiche le bouton 'like Facebook'</label></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_send_btn]" value="1" <?php if($options['fb_send_btn']==1) { echo "checked"; } ?> />  Affiche le bouton 'send Facebook'</label></li>
    <li><label><select name="wpsocial_plugin_settings[fb_type_btnlike]">
                <option value="standard" <?php if($options['fb_type_btnlike']=="standard") { echo "selected"; } ?> />Standard</option>
                <option value="button_count" <?php if($options['fb_type_btnlike']=="button_count") { echo "selected"; } ?> />Button Count</option>
                <option value="box_count" <?php if($options['fb_type_btnlike']=="box_count") { echo "selected"; } ?> />Box Count</option>
                </select>  Sélectionnez le type</label>
    </li>
    <li><b>Position du Facebook "Like"</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_settings_home]" value="1" <?php if($options['fb_settings_home']==1) { echo "checked"; } ?> />  Sur la page principale</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_settings_single]" value="1" <?php if($options['fb_settings_single']==1) { echo "checked"; } ?> />  Sur les articles</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_settings_category]" value="1" <?php if($options['fb_settings_category']==1) { echo "checked"; } ?> />  Sur les catégories</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_settings_page]" value="1" <?php if($options['fb_settings_page']==1) { echo "checked"; } ?> />  Sur les pages</label></li>
    <li><b>Position du Facebook "Faces"</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_faces_settings_home]" value="1" <?php if($options['fb_faces_settings_home']==1) { echo "checked"; } ?> />  Sur la page principale</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_faces_settings_single]" value="1" <?php if($options['fb_faces_settings_single']==1) { echo "checked"; } ?> />  Sur les articles</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_faces_settings_category]" value="1" <?php if($options['fb_faces_settings_category']==1) { echo "checked"; } ?> />  Sur les catégories</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_faces_settings_page]" value="1" <?php if($options['fb_faces_settings_page']==1) { echo "checked"; } ?> />  Sur les pages</label></li>

    <!-- BOUTON FACEBOOK SHARE -->
    <li>&nbsp;</li>
    <li><b>Bouton Facebook "Partager"</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_share_btn]" value="1" <?php if($options['fb_share_btn']==1) { echo "checked"; } ?> />  Affiche le bouton partager Facebook</label></li>
    <li><label><select name="wpsocial_plugin_settings[fb_type_btn]">
                <option value="standard" <?php if($options['fb_type_btn']=="standard") { echo "selected"; } ?> />Standard</option>
                <option value="button_count" <?php if($options['fb_type_btn']=="button_count") { echo "selected"; } ?> />Button Count</option>
                <option value="box_count" <?php if($options['fb_type_btn']=="box_count") { echo "selected"; } ?> />Box Count</option>
                </select>  Sélectionnez le type</label>
    </li>
    <li><b>Position du Facebook "Partager"</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[fb_share_settings_home]" value="1" <?php if($options['fb_share_settings_home']==1) { echo "checked"; } ?> />  Sur la page principale</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_share_settings_single]" value="1" <?php if($options['fb_share_settings_single']==1) { echo "checked"; } ?> />  Sur les articles</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_share_settings_category]" value="1" <?php if($options['fb_share_settings_category']==1) { echo "checked"; } ?> />  Sur les catégories</label> <label><input type="checkbox" name="wpsocial_plugin_settings[fb_share_settings_page]" value="1" <?php if($options['fb_share_settings_page']==1) { echo "checked"; } ?> />  Sur les pages</label></li>
    <li>&nbsp;<hr size="1">&nbsp;</li>

    <!-- BOUTON TWITTER -->
    <li><b>Bouton Twitter</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[twitt_btn]" value="1" <?php if($options['twitt_btn']==1) { echo "checked"; } ?> />  Affiche le bouton re-twitte</label></li>
    <li><label>Via : <input type="text" width="150" name="wpsocial_plugin_settings[twitt_account]" value="<?php echo $options['twitt_account']; ?>"/> (Cet utilisateur sera @ mentionné dans le Tweet)</label></li>
    <li><label><select name="wpsocial_plugin_settings[twitt_type_btn]">
                <option value="vertical" <?php if($options['twitt_type_btn']=="vertical") { echo "selected"; } ?> />Vertical</option>
                <option value="horizontal" <?php if($options['twitt_type_btn']=="horizontal") { echo "selected"; } ?> />Horizontal</option>
                <option value="none" <?php if($options['twitt_type_btn']=="none") { echo "selected"; } ?> />Aucun compteur</option>
                </select>  Sélectionnez le type</label></li>
    <li><b>Position du bouton Twitter</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[twitt_settings_home]" value="1" <?php if($options['twitt_settings_home']==1) { echo "checked"; } ?> />  Sur la page principale</label> <label><input type="checkbox" name="wpsocial_plugin_settings[twitt_settings_single]" value="1" <?php if($options['twitt_settings_single']==1) { echo "checked"; } ?> />  Sur les articles</label> <label><input type="checkbox" name="wpsocial_plugin_settings[twitt_settings_category]" value="1" <?php if($options['twitt_settings_category']==1) { echo "checked"; } ?> />  Sur les catégories</label> <label><input type="checkbox" name="wpsocial_plugin_settings[twitt_settings_page]" value="1" <?php if($options['twitt_settings_page']==1) { echo "checked"; } ?> />  Sur les pages</label></li>
    <li>&nbsp;<hr size="1">&nbsp;</li>

    <!-- BOUTON GOOGLE+1 -->
    <li><b>Bouton +1 de Google</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[plusone_btn]" value="1" <?php if($options['plusone_btn']==1) { echo "checked"; } ?> />  Affiche le bouton +1</label></li>
    <li><label><select name="wpsocial_plugin_settings[plusone_type_btn]">
                <option value="standard" <?php if($options['plusone_type_btn']=="standard") { echo "selected"; } ?> />Standard</option>
                <option value="small" <?php if($options['plusone_type_btn']=="small") { echo "selected"; } ?> />Petit</option>
                <option value="medium" <?php if($options['plusone_type_btn']=="medium") { echo "selected"; } ?> />Moyen</option>
                <option value="tall" <?php if($options['plusone_type_btn']=="tall") { echo "selected"; } ?> />Grand</option>
                </select>  Sélectionnez le type</label></li>
    <li><b>Position du bouton Bouton +1 de Google</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[plusone_settings_home]" value="1" <?php if($options['plusone_settings_home']==1) { echo "checked"; } ?> />  Sur la page principale</label> <label><input type="checkbox" name="wpsocial_plugin_settings[plusone_settings_single]" value="1" <?php if($options['plusone_settings_single']==1) { echo "checked"; } ?> />  Sur les articles</label> <label><input type="checkbox" name="wpsocial_plugin_settings[plusone_settings_category]" value="1" <?php if($options['plusone_settings_category']==1) { echo "checked"; } ?> />  Sur les catégories</label> <label><input type="checkbox" name="wpsocial_plugin_settingsplusone_settings_page]" value="1" <?php if($options['plusone_settings_page']==1) { echo "checked"; } ?> />  Sur les pages</label></li>
    <li>&nbsp;<hr size="1">&nbsp;</li>

    <!-- BOUTON ADDTHIS -->
    <li><b>Bouton AddThis</b></li>
    <li><label><input type="checkbox" name="wpsocial_plugin_settings[addthis_btn]" value="1" <?php if($options['addthis_btn']==1) { echo "checked"; } ?> />  Affiche le bouton AddThis</label></li>
    <li><label><input type="text" width="150" name="wpsocial_plugin_settings[addthis_account]" value="<?php echo $options['addthis_account']; ?>"/> Compte AddThis</label></li>
    <li>&nbsp;<hr size="1">&nbsp;</li>
    <li><b>Options</b></li>
    <li><label>Marge haut : <input type="text" width="2" size="5" name="wpsocial_plugin_settings[margin_top]" value="<?php echo $options['margin_top']; ?>" />px</label></li>
    <li><label>Marge bas : <input type="text" width="2" size="5" name="wpsocial_plugin_settings[margin_bottom]" value="<?php echo $options['margin_bottom']; ?>" />px</label></li>
    <li></li>
    <li>&nbsp;</li>
    <li><input  class="button_primary" type="submit" name="Save" value="<?php _e("Sauvegarder les Options"); ?>" id="submitbutton" /></li>
  </ul>
</form>
</div>

