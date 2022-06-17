<?php
/**
 * Created by PhpStorm.
 * Filename: Mapper.php
 * User: Nguyễn Văn Ước
 * Date: 17/06/2022
 * Time: 10:35
 */

namespace Uocnv\Dictionary;

use Benlipp\SrtParser\Caption;
use Benlipp\SrtParser\Parser;

class Mapper extends Parser
{
    private $performance = 0.5;

    public function map(string $file1, string $file2)
    {
        $result    = [];
        $captions1 = $this->loadFile($file1)->parse();
        $captions2 = $this->loadFile($file2)->parse();

        foreach ($captions1 as $cap1) {
            $arr2 = [];
            foreach ($captions2 as $cap2) {
                $intersect = $this->getIntersect($cap1, $cap2);
                if ($intersect && $this->checkPerformance($intersect, $cap1, $cap2)) {
                    $arr2[] = $cap2->text;
                }
            }
            $result[] = [$cap1->text, $arr2];
            unset($arr2);
        }
        return $result;
    }

    /**
     * @param Caption $sub1
     * @param Caption $sub2
     * @return float|int|null
     */
    protected function getIntersect(Caption $sub1, Caption $sub2)
    {
        if ($sub1->startTime >= $sub2->endTime || $sub1->endTime <= $sub2->startTime) {
            return 0;
        }

        $timeSub1       = $sub1->endTime - $sub1->startTime;
        $deviationStart = $sub1->startTime - $sub2->startTime;
        $deviationEnd   = $sub1->endTime - $sub2->endTime;

        return $timeSub1 + ($deviationStart < 0 ? $deviationStart : 0) - ($deviationEnd > 0 ? $deviationEnd : 0);
    }

    /**
     * @param float $intersect
     * @param Caption $sub1
     * @param Caption $sub2
     * @return bool
     */
    protected function checkPerformance(float $intersect, Caption $sub1, Caption $sub2): bool
    {
        $duration1 = $sub1->endTime - $sub1->startTime;
        $duration2 = $sub2->endTime - $sub2->startTime;
        if (round($intersect / $duration1, 2) >= $this->performance ||
            round($intersect / $duration2, 2) >= $this->performance) {
            return true;
        }
        return false;
    }
}
