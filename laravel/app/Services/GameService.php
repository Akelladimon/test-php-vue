<?php

namespace App\Services;

use App\Enum\Percent;
use App\Enum\Rate;

class GameService
{
    const MIN = 1;
    const MAX = 1000;

    /**
     * @param int $min
     * @param int $max
     * @return int
     * @throws \Exception
     */
    public function generateAmount(int $min= self::MIN, int $max = self::MAX): int
    {
        $randomNumber = random_int($min, $max);

        if ($randomNumber % 2 !== 0) {
            return 0;
        }

        return $this->calculateWinnings($randomNumber);
    }

    private function calculateWinnings(int $number):int
    {
        if ($number >= Rate::MAX->value) {
            return $number * (float)Percent::MAX->value;
        }

        if ($number >= Rate::MIDDLE->value) {
            return $number * (float)Percent::MIDDLE->value;
        }

        if ($number >= Rate::SMALL->value) {
            return $number * (float)Percent::SMALL->value;
        }

        return $number * (float)Percent::MIN->value;
    }
}
