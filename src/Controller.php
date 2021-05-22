<?php declare(strict_types=1);

namespace Amin3mej\Perseverance;


use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use Amin3mej\Perseverance\Commander\Commander;
use Amin3mej\Perseverance\Rover\RoverFactory;

class Controller
{
    public static function cliInterface($commandLines): string
    {
        $lines = explode("\n", $commandLines);

        $firstLine = array_shift($lines);
        $size = trim($firstLine);
        list($w, $h) = explode(' ', $size . ' ');
        $playground = new Playground(intval($w), intval($h));
        $perseverance = RoverFactory::create($playground);

        $result = '';
        foreach (array_chunk($lines, 2) as $commandLine) {
            $pos = trim($commandLine[0]);
            list($x, $y, $d) = explode(' ', $pos . '  ');
            if (!$x) break;
            $perseverance->setLocation(intval($x), intval($y), CardinalDirection::get($d));

            Commander::interprete($commandLine[1], $perseverance);
            $result .= $perseverance . "\n";
        }

        return trim($result);
    }
}