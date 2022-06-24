<?php
    function gt_only_lang_codes(){
        $data = get_option('GTranslate');
        $flag_size= $data['flag_size'];
        
        foreach($data['fincl_langs'] as $ds){?>
            <a href="#"  onclick="doGTranslate('en|<?php echo $ds;?>'); return false;" class="glink nturl notranslate">
                <?php echo $ds;?>
            </a>
        <?php }

    }
    add_shortcode('gt_only_lang_codes', 'gt_only_lang_codes');

    function gt_only_flag(){
        $data = get_option('GTranslate');
        $flag_size= $data['flag_size'];

        foreach($data['fincl_langs'] as $ds){?>
            <a href="#"  onclick="doGTranslate('en|<?php echo $ds;?>'); return false;" class="glink nturl notranslate">
                <img src="//localhost/projects/wp-content/plugins/gtranslate/flags/<?php echo $flag_size;?>/<?php echo $ds;?>.png" height="<?php echo $flag_size;?>" width="<?php echo $flag_size;?>" alt="<?php echo $flag_size;?>">
            </a>
        <?php 
        }

    }
    add_shortcode('gt_only_flag', 'gt_only_flag');