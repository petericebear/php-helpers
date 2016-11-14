<?php

if ( ! function_exists('combinations')) {

    /**
     * http://stackoverflow.com/a/8567199
     *
     * @param array $arrays
     * @param int $i
     *
     * @return mixed
     */
    function combinations(array $arrays, $i = 0)
    {
        if ( ! isset($arrays[$i])) {

            return [];
        }

        if ($i == count($arrays) - 1) {

            return $arrays[$i];
        }

        // get combinations from subsequent arrays
        $tmp = combinations($arrays, $i + 1);

        $result = [];

        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {

            foreach ($tmp as $t) {

                $result[] = is_array($t) ?
                    array_merge([$v], $t) :
                    [$v, $t];
            }
        }

        return $result;
    }
}


if ( ! function_exists('concat_ws')) {

    /**
     * Implode with array filter.
     *
     * @param string $glue
     * @param mixed $args
     *
     * @return string|null
     */
    function concat_ws($glue, $args)
    {
        if ( ! is_array($args)) {

            $args = func_get_args();
            array_shift($args);
        }

        if ($args = array_filter($args)) {

            return implode($glue, $args);
        }

        return null;
    }
}


if ( ! function_exists('is_json')) {

    /**
     * @param $string
     *
     * @return bool
     */
    function is_json($string)
    {
        json_decode($string);

        return json_last_error() == JSON_ERROR_NONE;
    }
}


if ( ! function_exists('no_limits')) {

    /**
     * @return void
     */
    function no_limits()
    {
        ini_set('memory_limit', -1);
        set_time_limit(-1);
    }
}


if ( ! function_exists('no_limits')) {

    /**
     * @param mixed $class
     * @param string $trait
     *
     * @return bool
     */
    function usesTrait($class, $trait)
    {
        $classes = class_parents($class);
        $classes[] = $class;

        foreach ($classes as $class) {

            if (in_array($trait, class_uses($class))) {

                return true;
            }
        }

        return false;
    }
}


if ( ! function_exists('zerofill')) {

    /**
     * @param string|int $num
     * @param string|int $zerofill
     *
     * @return string|null
     */
    function zerofill($num, $zerofill)
    {
        if (is_null($num)) {

            return null;
        }

        return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
    }
}
