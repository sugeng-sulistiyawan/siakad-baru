<?php

Yii::setAlias("@themes", BASE_PATH . "/themes");

/**
 * Extends VarDumper::dump() yii2
 *
 * @param mixed $var
 * @return void
 */
function dd($var)
{
    return \diecoding\helpers\Dump::dd($var);
}


define("APP_NAME", "SIAKAD");
define("APP_UNIT", "Die Coding");
define("APP_UNIT_FULL", "Sistem Akademik");
