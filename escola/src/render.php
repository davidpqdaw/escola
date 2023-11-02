<?php
    function render(string $template,array $data=[]):string{
        if(isset($data)){
            extract($data, EXTR_OVERWRITE);
        }
        //inicializar buffer de salida
        ob_start();
        require 'src/views/'.$template.'.tpl.php';
        return ob_get_clean();
    }