<?php

spl_autoload_register(function ($class) {
    require_once implode(
        DIRECTORY_SEPARATOR,
        [dirname(__FILE__), 'lib', str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php']
    );
});
