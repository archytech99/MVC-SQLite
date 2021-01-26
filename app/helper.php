<?php

if (!function_exists('base_url')) {
    function base_url($url=null,$atRoot=FALSE, $atCore=FALSE, $parse=FALSE): string
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];
            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        $base_url = rtrim($base_url,'/');
        if (!empty($url)) {
            $base_url .= $url;
        }

        return $base_url;
    }
}

if (!function_exists('asset')) {
    function asset($path): string
    {
        return base_url() . "/assets/$path";
    }
}

if (!function_exists('asset_media')) {
    function asset_media($path): string
    {
        return base_url() . "/assets/media/$path";
    }
}

if (!function_exists('asset_vendor')) {
    function asset_vendor($path): string
    {
        return base_url() . "/assets/vendor/$path";
    }
}

if (!function_exists('view')) {
    function view($view, $data = []) {
        require_once __DIR__.'/View/' . strtolower($view) . '.php';
    }
}

if (!function_exists('model')) {
    function model($model)
    {
        $model = ucfirst($model);
        require_once MODEL_PATH . $model . '.php';
        $className = MODEL_SPACE . $model;
        return new $className;
    }
}

if (!function_exists('vd')) {
    function vd($data)
    {
        var_dump($data);
        die();
    }
}

if (!function_exists('stdClass')) {
    function stdClass($result, $set = false)
    {
        $data = [];
        if ($set) {
            foreach($result as $dt) {
                $data[] = (object) $dt;
            }
            return $data;
        } else {
            return (object) $result;
        }
    }
}

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        $cfg = parse_ini_file(BASE_PATH.'/.config');
        if (empty($default)) {
            return $cfg[$key];
        } else {
            return $default;
        }
    }
}

if (!function_exists('setFlash')) {
    function setFlash($param = [])
    {
        $_SESSION['flasher'] = (object) $param;
    }
}

if (!function_exists('flash')){
    function flash()
    {
        if (isset($_SESSION['flasher'])) {
            $fMessage = $_SESSION['flasher'];
            unset($_SESSION['flasher']);
            echo "<div class='alert alert-{$fMessage->tipe} alert-dismissible fade show' role='alert'>
                <strong>{$fMessage->aksi}!</strong> {$fMessage->pesan}.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }
}