<?php

require '../functions.php';
use PHPUnit\Framework\TestCase;
class functions extends TestCase {
    public function testSuccessDisplaySithData()
    {
        $input = [
            [
                'photo' => 'peter.png',
                'name' => 'peter',
                'height' => 123,
                'homeworld' => 'earth',
                'birthyear' => '91'
            ]
        ];
        $expectedOutput = '<div class="sithProfile">
                    <img src="peter.png" alt="Picture of peter">
                    <h1>peter</h1>
                    <h2> Homeworld: earth</h2>
                    <h2> Height: 123cm</h2>
                    <h2> Birth Year: 91 BBY</h2>
                    </div>';
        $result = displaySithData($input);
        $this->assertEquals($expectedOutput, $result);
    }

    public function testMalformedDisplaySithData()
    {
    $this->expectException(TypeError::class);
    $input = 'do it';
    displaySithData($input);
    }
}