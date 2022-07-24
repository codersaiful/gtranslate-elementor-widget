<?php
    
    function gt_only_lang_codes(){
        $data = get_option('GTranslate');
        foreach($data['fincl_langs'] as $dt){?>
            <a href="#" onclick="doGTranslate('en|<?php echo $dt;?>'); return false;" class="glink nturl notranslate">
                <?php echo $dt;?>
            </a>
        <?php }
    }
    add_shortcode('gt_only_lang_codes', 'gt_only_lang_codes');

    function gt_only_flag(){
        $wp_plugin_url = preg_replace('/^https?:/i', '', plugins_url() . '/gtranslate');
        $data = get_option('GTranslate');
        $flag_size= $data['flag_size'];

        foreach($data['fincl_langs'] as $dt){?>
            <a href="#" onclick="doGTranslate('en|<?php echo $dt;?>'); return false;" class="glink nturl notranslate">
                <img src="<?php echo $wp_plugin_url; ?>/flags/<?php echo $flag_size;?>/<?php echo $dt;?>.png" height="<?php echo $flag_size;?>" width="<?php echo $flag_size;?>" alt="<?php echo $dt;?>">
            </a>
        <?php 
        }
    }
    add_shortcode('gt_only_flag', 'gt_only_flag');

    function svg_common_icon(){
            $icons=array(
                'button-1' => 'Icon-1',
                'button-2' => 'Icon-2',
                'button-3' => 'Icon-3',
                'button-4' => 'Icon-4',
                'button-5' => 'Icon-5',
                'button-6' =>'Icon-6', 
                'button-7' => 'Icon-7',
                'button-8' => 'Icon-8',
                'button-9' => 'Icon-9',
                'button-10' => 'Icon-10',
            );
            echo '<svg width="0" height="0" class="hidden">';
            foreach ( $icons as $icon=>$val ) {
                echo '
                <symbol id="'.$icon.'-volume" viewBox="0 0 18 18">
                    <path d="M15.6 3.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4C15.4 5.9 16 7.4 16 9c0 1.6-.6 3.1-1.8 4.3-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3C17.1 13.2 18 11.2 18 9s-.9-4.2-2.4-5.7z" />
                    <path d="M11.282 5.282a.909.909 0 000 1.316c.735.735.995 1.458.995 2.402 0 .936-.425 1.917-.995 2.487a.909.909 0 000 1.316c.145.145.636.262 1.018.156a.725.725 0 00.298-.156C13.773 11.733 14.13 10.16 14.13 9c0-.17-.002-.34-.011-.51-.053-.992-.319-2.005-1.522-3.208a.909.909 0 00-1.316 0zm-7.496.726H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z" />
                </symbol>
                <symbol id="'.$icon.'-muted" viewBox="0 0 18 18">
                    <path d="M12.4 12.5l2.1-2.1 2.1 2.1 1.4-1.4L15.9 9 18 6.9l-1.4-1.4-2.1 2.1-2.1-2.1L11 6.9 13.1 9 11 11.1zM3.786 6.008H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z" />
                </symbol>
                <symbol id="'.$icon.'-enter-fullscreen" viewBox="0 0 18 18">
                    <path d="M10 3h3.6l-4 4L11 8.4l4-4V8h2V1h-7zM7 9.6l-4 4V10H1v7h7v-2H4.4l4-4z" />
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" id="'.$icon.'-settings">
                    <path d="M16.135,7.784 C14.832,7.458 14.214,5.966 14.905,4.815 C15.227,4.279 15.13,3.817 14.811,3.499 L14.501,3.189 C14.183,2.871 13.721,2.774 13.185,3.095 C12.033,3.786 10.541,3.168 10.216,1.865 C10.065,1.258 9.669,1 9.219,1 L8.781,1 C8.331,1 7.936,1.258 7.784,1.865 C7.458,3.168 5.966,3.786 4.815,3.095 C4.279,2.773 3.816,2.87 3.498,3.188 L3.188,3.498 C2.87,3.816 2.773,4.279 3.095,4.815 C3.786,5.967 3.168,7.459 1.865,7.784 C1.26,7.935 1,8.33 1,8.781 L1,9.219 C1,9.669 1.258,10.064 1.865,10.216 C3.168,10.542 3.786,12.034 3.095,13.185 C2.773,13.721 2.87,14.183 3.189,14.501 L3.499,14.811 C3.818,15.13 4.281,15.226 4.815,14.905 C5.967,14.214 7.459,14.832 7.784,16.135 C7.935,16.742 8.331,17 8.781,17 L9.219,17 C9.669,17 10.064,16.742 10.216,16.135 C10.542,14.832 12.034,14.214 13.185,14.905 C13.72,15.226 14.182,15.13 14.501,14.811 L14.811,14.501 C15.129,14.183 15.226,13.72 14.905,13.185 C14.214,12.033 14.832,10.541 16.135,10.216 C16.742,10.065 17,9.669 17,9.219 L17,8.781 C17,8.33 16.74,7.935 16.135,7.784 L16.135,7.784 Z M9,12 C7.343,12 6,10.657 6,9 C6,7.343 7.343,6 9,6 C10.657,6 12,7.343 12,9 C12,10.657 10.657,12 9,12 L9,12 Z"></path>
                </symbol>
                <symbol id="'.$icon.'-exit-fullscreen" viewBox="0 0 18 18">
                    <path d="M1 12h3.6l-4 4L2 17.4l4-4V17h2v-7H1zM16 .6l-4 4V1h-2v7h7V6h-3.6l4-4z" />
                </symbol>
                <symbol id="'.$icon.'-pip" viewBox="0 0 18 18">
                    <path d="M13.293 3.293L7.022 9.564l1.414 1.414 6.271-6.271L17 7V1h-6z" />
                    <path d="M13 15H3V5h5V3H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1v-6h-2v5z" />
                </symbol>
                '; 
            }
            echo '<svg>';

    }