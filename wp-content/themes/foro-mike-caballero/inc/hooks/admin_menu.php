<?php
add_action('admin_menu', function(){
    add_menu_page( 'foro-mc', 'Foro MC', 'manage_options', 'Foro MC', function(){ 
        
        if( isset( $_POST['submit'] ) ):
            if( isset( $_POST['shareImage'] ) ) update_option('shareImage', $_POST['shareImage']);
            if( isset( $_POST['favicon'] ) ) update_option('favicon', $_POST['favicon']);
            if( isset( $_POST['googleTagManager'] ) ) update_option('googleTagManager', trim(stripslashes($_POST['googleTagManager'])));
            if( isset( $_POST['metaKeyWords'] ) ) update_option('metaKeyWords', $_POST['metaKeyWords']);
        endif;
        
        $shareImage = get_option( 'shareImage');
        $favicon = get_option( 'favicon' );
        $googleTagManager = get_option( 'googleTagManager');
        $metaKeyWords = get_option( 'metaKeyWords'); ?>

        <div class="wrap">            
            <h1>Configuración Foro MC</h1>
            <form method="post" novalidate="novalidate">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="shareImage">Imagen Redes Sociales</label>
                            </th>         
                            <td>
                                <ul class="imageList" data-image-list-name="shareImage">
                                    <li 
                                        class="imageListItem imageListItemDisabled<?= ! empty($shareImage) ? '' : ' imageListItemEmpty'; ?>" 
                                        style="background-image: url(<?= wp_get_attachment_url( $shareImage ); ?>);">
                                        <input type="hidden" name="shareImage" value="<?= $shareImage; ?>">
                                        <button 
                                            type="button" 
                                            class="imageListButtonIcon imageUpdate<?= ! empty($shareImage) ? '' : ' dNone'; ?>" 
                                            title="Cambiar imagen">
                                            <i class="fas fa-exchange-alt"></i>
                                        </button>
                                        <button 
                                            type="button" 
                                            class="imageListButtonFull imagePick<?= ! empty($shareImage) ? ' dNone' : ''; ?>" 
                                            title="Elegir imagen">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button 
                                            type="button" 
                                            class="imageListButtonIcon imageDiscard<?= ! empty($shareImage) ? '' : ' dNone'; ?>" 
                                            title="Descartar imagen">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </li>
                                </ul>
                                <p class="description">
                                    Esta imagen es la que se mostrara al ser compartido el sitio por Facebook, WhatsApp, etc. <br>
                                    <strong>Si se comparte una publicación/evento tomara la imagen destacada</strong> <br>
                                    <strong>Tamaño recomendado 300 x 300 px</strong>
                                </p>
                            </td>
                        </tr>       
                        <tr>
                            <th scope="row">
                                <label for="favicon">Favicon</label>
                            </th>            
                            <td>
                                <ul class="imageList" data-image-list-name="favicon">
                                    <li 
                                        class="imageListItem favicon imageListItemDisabled<?= ! empty($favicon) ? '' : ' imageListItemEmpty'; ?>" 
                                        style="background-image: url(<?= wp_get_attachment_url($favicon); ?>);">
                                        <input type="hidden" name="favicon" value="<?=$favicon; ?>">
                                        <button 
                                            type="button" 
                                            class="imageListButtonIcon imageUpdate<?= ! empty($favicon) ? '' : ' dNone'; ?>" 
                                            title="Cambiar imagen">
                                            <i class="fas fa-exchange-alt"></i>
                                        </button>
                                        <button 
                                            type="button" 
                                            class="imageListButtonFull imagePick<?= ! empty($favicon) ? ' dNone' : ''; ?>" 
                                            title="Elegir imagen">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button 
                                            type="button" 
                                            class="imageListButtonIcon imageDiscard<?= ! empty($favicon) ? '' : ' dNone'; ?>" 
                                            title="Descartar imagen">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </li>
                                </ul>
                                <p class="description">
                                    Icono para mostrarse en la pesta;a del navegador. <br>
                                    <strong>Tamaño recomendado 200 x 200 px</strong>
                                </p>
                            </td>
                        </tr>       
                        <tr>
                            <th scope="row">
                                <label for="">Google Code</label>
                            </th>           
                            <td>
                                <textarea 
                                name="googleTagManager" 
                                id="googleTagManager"
                                placeholder="<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-XXXXXX'></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-XXXXXX');
</script>"><?=$googleTagManager;?></textarea>
                                <p class="description custom-foro--description">
                                    Codigo de Google Tag Manager.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="">Keywords</label>
                            </th>           
                            <td>
                                <input class="large-text" type="text" name="metaKeyWords" value="<?=$metaKeyWords;?>" placeholder="">
                                <p class="description custom-foro--description">
                                    Potencializa tu posicionamiento usando palabras clave para tu sitio. <br>
                                    <strong>Separadas por una comma (,)</strong>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar cambios">
                </p>
            </form>
        </div> <?php
    },'dashicons-admin-generic', 20);
});