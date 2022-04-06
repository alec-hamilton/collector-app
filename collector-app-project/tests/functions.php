<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    public function testGivenEmptyArray()
    {
        $array = [];

        $result = displayReleases($array);

        $this->assertEquals('', $result);
    }

    public function testisOutputString()
    {
        $array[] = [
            'id' => 1,
            'artist' => 'Florian T M Zeisig',
            'release_name' => 'Slow Bench',
            'label' => 'enmossed',
            'year' => '2022',
            'format' => '7"',
            'image_url' => 'R-22458883-1646926153-9657.jpeg'
            ];

        $result = displayReleases($array);

        $this->assertIsString($result);
    }

    public function givenStringReturnError()
    {
        $string = 'string';

        $this->expectException(TypeError::class);

        $result = displayReleases($string);
    }
}

