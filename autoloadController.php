<?php

function autoloadController($name)
{
    include 'controllers/'.$name.'.php';
}

spl_autoload_register('autoloadController');
