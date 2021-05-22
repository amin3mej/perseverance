<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Cardinal;

use Werkspot\Enum\AbstractEnum;

/**
 * @method static CardinalDirection north()
 * @method static CardinalDirection west()
 * @method static CardinalDirection south()
 * @method static CardinalDirection east()
 */
class CardinalDirection extends AbstractEnum
{
    const NORTH = 'N';
    const WEST  = 'W';
    const SOUTH = 'S';
    const EAST  = 'E';


    public $clockwiseOrder = [
        self::NORTH,
        self::EAST,
        self::SOUTH,
        self::WEST,
    ];

    public static function includes(CardinalDirection $direction): bool
    {
        return in_array($direction, [
            self::NORTH,
            self::EAST,
            self::SOUTH,
            self::WEST,
        ]);
    }

    public function getLeft(): CardinalDirection
    {
        $newPos = (array_search($this->getValue(), $this->clockwiseOrder) + 3) % 4;
        return self::get($this->clockwiseOrder[$newPos]);
    }

    public function getRight(): CardinalDirection
    {

        $newPos = (array_search($this->getValue(), $this->clockwiseOrder) + 5) % 4;
        return self::get($this->clockwiseOrder[$newPos]);
    }

    public function getImpact(): array
    {
        return [
            self::NORTH => [0, 1],
            self::EAST => [1, 0],
            self::SOUTH => [0, -1],
            self::WEST => [-1, 0],
        ][$this->getValue()];
    }
}