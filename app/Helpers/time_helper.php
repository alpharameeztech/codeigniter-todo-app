<?php

use CodeIgniter\I18n\Time;

if (!function_exists('humanizeTime')) {
    function humanizeTime($datetime)
    {
        return Time::parse($datetime)->humanize();
    }
}
