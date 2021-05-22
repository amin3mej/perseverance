<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Rover;

use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use Amin3mej\Perseverance\Commander\Commandable;
use Amin3mej\Perseverance\Exception\InvalidPositionException;
use Amin3mej\Perseverance\Playground;

class Rover implements Commandable
{
    #region Fields
    /**
     * @var Playground
     */
    private $playground;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @var CardinalDirection
     */
    private $direction;
    #endregion

    #region Constructor and Validators
    public function __construct(Playground $playground)
    {
        $this->playground = $playground;
    }

    /**
     * @throws InvalidPositionException
     */
    public function setLocation(int $x, int $y, CardinalDirection $direction)
    {
        $this->ensureIsLocationValid($x, $y);
        $this->ensureIsDirectionValid($direction);

        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }

    /**
     * @throws InvalidPositionException
     */
    private function ensureIsLocationValid(int $x, int $y)
    {
        if (!$this->playground->has($x, $y))
            throw new InvalidPositionException();
    }

    /**
     * @throws InvalidPositionException
     */
    private function ensureIsDirectionValid(CardinalDirection $direction)
    {
        if (!CardinalDirection::includes($direction))
            throw new InvalidPositionException();
    }
    #endregion

    #region Commandability
    function turnLeft(): void
    {
        $this->direction = $this->direction->getLeft();
    }

    function turnRight(): void
    {
        $this->direction = $this->direction->getRight();
    }

    /**
     * @throws InvalidPositionException
     */
    function goAhead(): void
    {
        list($xDiff, $yDiff) = $this->direction->getImpact();

        if (!$this->playground->has($this->x + $xDiff, $this->y + $yDiff))
            throw new InvalidPositionException();


        $this->x = $this->x + $xDiff;
        $this->y = $this->y + $yDiff;
    }
    #endregion

    public function __toString()
    {
        return sprintf("%d %d %s", $this->x, $this->y, $this->direction->getValue());
    }
}