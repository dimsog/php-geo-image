<?php

namespace Dimsog\Geoimage\Tests;

use Dimsog\Geoimage\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testImageNotExists()
    {
        $result = Coordinates::extract(__DIR__ . '/image-not-found.jpg');
        $this->assertNull($result);
    }

    public function testNonImage()
    {
        $result = Coordinates::extract(__DIR__ . '/files/test.txt');
        $this->assertNull($result);
    }

    public function testImageWithoutGps()
    {
        $result = Coordinates::extract(__DIR__ . '/files/image-without-gps.jpg');
        $this->assertNull($result);
    }

    public function testImageWithGps()
    {
        $result = Coordinates::extract(__DIR__ . '/files/image.jpg');
        $this->assertEquals([53.1441231, 35.3697342], $result);
    }
}