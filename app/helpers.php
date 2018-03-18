<?php

/**
 * Set active class to navigation.
 *
 * @param string $path
 * @param string $class
 */
function activePage($path, $class = 'active')
{
    if (request()->is($path)) {
        return $class;
    }

    return '';
}
