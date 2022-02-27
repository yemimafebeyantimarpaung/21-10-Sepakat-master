<?php

if(!function_exists('onMenuInfo')){

    function onMenuInfo($type){
        $petani=isset($_GET['petani']) ? $_GET['petani'] : 'padi';
        return ($petani==$type) ? 'active' : '';
    }

}

if(!function_exists('onMenuMain')){

    function onMenuMain($classing){
        $class=request()->segment(1)=='' ? 'Beranda' : request()->segment(1);
        return ($class==$classing) ? 'active' : '';
    }

}

?>