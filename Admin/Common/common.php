<?php

//过滤字符
function checkstr($str) {
    if (is_string($str)) {
        $str = htmlspecialchars($str);
        if (!get_magic_quotes_gpc()) {
            $str = addslashes($str);
        }
    }
    return trim($str);
}
