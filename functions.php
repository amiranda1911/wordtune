<?php 
    function reduce_image ($file) {}
    
    function is_image ($file) {
        return strstr($file['type'], 'image/');
    }
    
    function less_than_max_size (int $size) {
        $maxsize = intval(get_option("wordtune_image_maxsize_option") * 1024);
        return ($size < $maxsize);
    }
    
    function uploader_filter ($file) {
        
        $quality = 80; //80% da qualidade original
        
        // se o arquivo não é do tipo image/* retorna a var $file original 
        if (!is_image($file) || less_than_max_size(intval($file ["size"]), $quality)) {
            return $file;
        }

        var_dump($file);

        $image = null;

        switch ($file['type']) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
            case 'image/bmp':
                $image = imagecreatefrombmp($file['tmp_name']);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp( $file['tmp_name'] );
                break;
        }

        imagewebp($image, $file['tmp_name'], $quality);
        $file['type'] = 'image/webp';
        $file['name'] =  $file['name'].".webp";
        $file['full_path'] = $file['name'];
        $file['size'] = filesize($file['tmp_name']);
        
        return $file;    
    }
    
    add_filter('wp_handle_upload_prefilter', 'uploader_filter');
?>