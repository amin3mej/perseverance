<?php declare(strict_types=1);

namespace Amin3mej\Perseverance;

use Amin3mej\Perseverance\Exception\OutOfPlaygroundRangeException;

class Playground
{
    const WIDTH_STARTING_POINT = 0;
    const HEIGHT_STARTING_POINT = 0;

    /**
     * @var int
     */
    private $width;
    /**
     * @var int
     */
    private $height;

    /**
     * @throws OutOfPlaygroundRangeException
     */
    public function __construct(int $width, int $height)
    {
        $this->ensureNumbersAreValid($width, $height);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @throws OutOfPlaygroundRangeException
     */
    private function ensureNumbersAreValid(int $width, int $height)
    {
        if ($width <= self::WIDTH_STARTING_POINT || $height <= self::HEIGHT_STARTING_POINT)
            throw new OutOfPlaygroundRangeException();
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }


    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    public function has(int $x, int $y): bool
    {
        return ($x >= self::WIDTH_STARTING_POINT && $x <= $this->width) &&
            ($y >= self::HEIGHT_STARTING_POINT && $y <= $this->height);
    }
}