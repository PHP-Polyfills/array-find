<?php

/**
 * Checks whether the $callback returns TRUE for ANY of the array
 *  elements.
 *
 * @param array $array The array that should be searched.
 * @param callable $callback The callback function to call to check
 *  each element. The first parameter contains the value ($value), the
 *  second parameter contains the corresponding key ($key). If this
 *  function returns TRUE (or a truthy value), TRUE is returned
 *  immediately and the $callback will not be called for further
 *  elements.
 *
 * @return bool TRUE if there is at least one element for which
 *  $callback returns TRUE. FALSE otherwise.
 */
function array_any(array $array, callable $callback): bool {
    foreach ($array as $key => $value) {
        if ($callback($value, $key)) {
            return true;
        }
    }

    return false;
}

/**
 * Checks whether the $callback returns TRUE for ALL the array
 *  elements.
 *
 * @param array $array The array that should be searched.
 * @param callable $callback The callback function to call to check
 *  each element. The first parameter contains the value ($value), the
 *  second parameter contains the corresponding key. If this function
 *  returns FALSE (or any falsy value), FALSE is returned immediately
 *  and the $callback will not be called for further elements.
 *
 * @return bool TRUE, if $callback returns TRUE for all elements.
 *  FALSE otherwise.
 */
function array_all(array $array, callable $callback): bool {
    foreach ($array as $key => $value) {
        if (!$callback($value, $key)) {
            return false;
        }
    }

    return true;
}

if (\PHP_VERSION_ID >= 80000) {
    /**
     * Returns the VALUE of the first element from $array for which the
     *  $callback returns true. Returns NULL if no matching element is
     *  found.
     *
     * @param array $array The array that should be searched.
     * @param callable $callback The callback function to call to check
     *  each element. The first parameter contains the value ($value),
     *  the second parameter contains the corresponding key ($key).
     *  If this callback returns TRUE (or a truthy value), the value
     *  ($value) is returned immediately and the callback will not be
     *  called for further elements.
     *
     * @return mixed The function returns the value of the first
     *  element for which the $callback returns TRUE. NULL, if no
     *  matching element is found. Note that the matching element value
     *  itself could be NULL as well.
     */
    function array_find(array $array, callable $callback): mixed {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return null;
    }

    /**
     * Returns the KEY of the first element from $array for which the
     *  $callback returns TRUE. If no matching element is found the
     *  function returns NULL.
     *
     * @param array $array The array that should be searched.
     * @param callable $callback The callback function to call to check
     *  each element. The first parameter contains the value ($value),
     *  the second parameter contains the corresponding key ($key). If
     *  this function returns TRUE, the key ($key) is returned
     *  immediately and the callback will not be called for further
     *  elements.
     *
     * @return mixed The key of the first element for which the
     *  $callback returns TRUE. NULL, If no matching element is found.
     */
    function array_find_key(array $array, callable $callback): mixed {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $key;
            }
        }

        return null;
    }
}
else {

    /**
     * Returns the VALUE of the first element from $array for which the
     *  $callback returns true. Returns NULL if no matching element is
     *  found.
     *
     * @param array $array The array that should be searched.
     * @param callable $callback The callback function to call to check
     *  each element. The first parameter contains the value ($value),
     *  the second parameter contains the corresponding key ($key).
     *  If this callback returns TRUE (or a truthy value), the value
     *  ($value) is returned and the callback will not be called for
     *  further elements.
     *
     * @return mixed The function returns the value of the first
     *  element for which the $callback returns TRUE. NULL, if no
     *  matching element is found. Note that the matching element value
     *  itself could be NULL as well.
     */
    function array_find(array $array, callable $callback) {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return null;
    }

    /**
     * Returns the KEY of the first element for which the $callback
     *  returns TRUE. If no matching element is found the function
     *  returns NULL.
     *
     * @param array $array The array that should be searched.
     * @param callable $callback The callback function to call to check
     *  each element. The first parameter contains the value ($value),
     *  the second parameter contains the corresponding key ($key). If
     *  this function returns TRUE, the key ($key) is returned
     *  immediately and the callback will not be called for further
     *  elements.
     *
     * @return mixed The key of the first element for which the
     *  $callback returns TRUE. NULL, If no matching element is found.
     */
    function array_find_key(array $array, callable $callback) {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $key;
            }
        }

        return null;
    }
}
