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