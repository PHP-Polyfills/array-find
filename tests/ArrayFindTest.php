<?php

namespace Polyfills\MbTrimPolyfill\Tests;

use PHPUnit\Framework\TestCase;

class ArrayFindTest extends TestCase {

    public function testArrayFind() {
        $array1 = [
            "a" => 1,
            "b" => 2,
            "c" => 3,
            "d" => 4,
            "e" => 5,
        ];

        $array2 = [
            1, 2, 3, 4, 5,
        ];

        $evenFunction = static function($input) {
            return $input % 2 === 0;
        };

        self::assertSame(array_find(['apple', 'banana'], static function($value, $key) {
            return $value === 'banana';
        }), 'banana');

        self::assertSame(2, array_find($array1, $evenFunction));

        self::assertNull(array_find($array2, static function($value) {
            return $value > 5;
        }));

        self::assertNull(array_find($array2, static function($value) {
            return $value > 5;
        }));

        self::assertNull(array_find([], static function($value) {
            return true;
        }));

        self::assertSame(3, array_find($array1, static function($value, $key) {
            return $key === "c";
        }));

        self::assertNull(array_find($array1, static function($value) {
            return false;
        }));
    }

    public function testArrayFindKey() {
        $array1 = [
            "a" => 1,
            "b" => 2,
            "c" => 3,
            "d" => 4,
            "e" => 5,
        ];

        $array2 = [
            1, 2, 3, 4, 5,
        ];

        $evenFunction = static function($input) {
            return $input % 2 === 0;
        };

        self::assertSame("d", array_find_key($array1, static function($value) {
            return $value > 3;
        }));

        self::assertSame(3, array_find_key($array2, static function($value) {
            return $value > 3;
        }));

        self::assertSame(1, array_find_key($array2, $evenFunction));

        self::assertNull(array_find_key($array2, static function($value) {
            return $value > 5;
        }));

        self::assertNull(array_find_key([], static function($value) {
            return true;
        }));

        self::assertSame("c", array_find_key($array1, static function($value, $key) {
            return $key === "c";
        }));

        self::assertNull(array_find_key($array2, static function($value, $key) {
            return false;
        }));
    }

    public function testArrayAny() {
        $array1 = [
            "a" => 1,
            "b" => 2,
            "c" => 3,
            "d" => 4,
            "e" => 5,
        ];

        $array2 = [
            1, 2, 3, 4, 5,
        ];

        $evenFunction = static function($input) {
            return $input % 2 === 0;
        };

        self::assertTrue(array_any($array1, static function($value) {
            return $value > 3;
        }));

        self::assertTrue(array_any($array2, static function($value) {
            return $value > 3;
        }));

        self::assertTrue(array_any($array2, $evenFunction));

        self::assertFalse(array_any($array2, static function($value) {
            return $value > 5;
        }));

        self::assertFalse(array_any([], static function($value) {
            return true;
        }));

        self::assertTrue(array_any($array1, static function($value, $key) {
            return $key === "c";
        }));

        self::assertFalse(array_any($array2, static function($value, $key) {
            return false;
        }));
    }

    public function testArrayAll() {
        $array1 = [
            "a" => 1,
            "b" => 2,
            "c" => 3,
            "d" => 4,
            "e" => 5,
        ];

        $array2 = [
            1, 2, 3, 4, 5,
        ];

        $evenFunction = static function($input) {
            return $input % 2 === 0;
        };

        self::assertTrue(array_all($array1, static function($value) {
            return $value > 0;
        }));

        self::assertTrue(array_all($array1, static function($value) {
            return $value > 0;
        }));

        self::assertFalse(array_all($array2, static function($value) {
            return $value > 1;
        }));

        self::assertFalse(array_all($array2, $evenFunction));

        self::assertTrue(array_all([], static function($value) {
            return true;
        }));

        self::assertTrue(array_all([], static function($value) {
            return false;
        }));

        self::assertFalse(array_all($array2, static function($value) {
            return $value > 5;
        }));
    }
}
