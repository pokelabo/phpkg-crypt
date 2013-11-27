<?php

namespace pokelabo\crypt;

/**
 * Originally written by Serge at 20-May-2008 03:19,
 * found on http://php.net/md5.
 */
class Md5 {
    const HEX_CHARS = '0123456789abcdef';
    const BASE62_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /*
      Converts from an arbitrary-base string to a decimal string
    */
    static private function convertFromArbitraryBase($str, $chars) {
        if (!preg_match('/^[' . $chars . ']+$/', $str)) return false;
        
        $result = '0';

        for ($i = 0; $i < strlen($str); $i++) {
            if ($i != 0) $result = bcmul($result, strlen($chars));
            $result = bcadd($result, strpos($chars, $str[$i]));
        }

        return $result;
    }

    /*
      Converts from a decimal string to an arbitrary-base string
    */
    static private function convertToArbitraryBase($str, $chars) {
        if (preg_match('/^[0-9]+$/', $str)) {
            $result = '';

            do {
                $result .= $chars[bcmod($str, strlen($chars))];
                $str = bcdiv($str, strlen($chars));
            } while (bccomp($str, '0') != 0);

            return strrev($result);
        }

        return false;
    }

    public static function short($str) {
        $md5 = md5($str);
        $value = self::convertFromArbitraryBase($md5, self::HEX_CHARS);
        return self::convertToArbitraryBase($value, self::BASE62_CHARS);
    }
}
