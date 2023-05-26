<?php

/**
 * ExplicitCallCheck
 * 
 * Проверка явного вызова метода для PHP 8.0.0+
 * https://github.com/deathscore13/ExplicitCallCheck
 */

abstract class ExplicitCallCheck
{
    /**
     * Проверяет был ли вызов метода явным
     * 
     * @return bool             true если вызов явный, false если неявный
     */
    public static function check(): bool
    {
        $dbg = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        if (!isset($dbg[1]))
            return false;
        
        return preg_match_all('/('.($dbg[1]['type'] === '->' ? '->' : $dbg[1]['class'].'(\s+)*::').')*(\s+)*'.$dbg[1]['function'].'(\s+)*(\(|$)/',
            file($dbg[1]['file'], FILE_USE_INCLUDE_PATH|FILE_IGNORE_NEW_LINES)[$dbg[1]['line'] - 1]);
    }
}
