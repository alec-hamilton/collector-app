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

    public function testGivenStringReturnError()
    {
        $string = 'string';

        $this->expectException(TypeError::class);

        $result = displayReleases($string);
    }

    public function testGivenDataOutsideRangeReturnFalse()
    {
        $data = 200.1;

        $array = ['year' => $data];

        $result = dataValidation($array);

        $this->assertFalse($result);
    }

    public function testGivenDataWithinRangeReturnTrue()
    {
        $data = 1995;

        $array = ['year' => $data];

        $result = dataValidation($array);

        $this->assertTrue($result);
    }

    public function testGivenStringWithNeedleReturnWithout()
    {
        $data = '-success-this is a test';

        $result = trimImageString($data);

        $this->assertEquals('this is a test', $result);
    }

    public function testGivenNoNeedleReturnFail()
    {
        $data = 'this is a random string for testing';

        $result = trimImageString($data);

        $this->assertEquals('fail', $result);
    }

}



