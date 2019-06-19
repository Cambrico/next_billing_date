<?php

namespace Cambrico\NextBillingDate;

/**
 * Helper class to calculate recurring billing dates.
 */
final class NextBillingDate
{
   /**
    * Calculate the next billing date.
    *
    * @param \DateTime $lastDate
    *   The date object.
    * @param int $numberMonths
    *   Months to add.
    *
    * @return \DateTime
    *   The calculated date object.
    *
    * @throws \Exception
    */
    public static function calculate(\DateTime $lastDate, $numberMonths)
    {
        // Clone the date object or the original date will be altered.
        $nextDate = clone $lastDate;
        $periodUnit = 'M';

        // Add the number of months.
        $nextDate->add(new \DateInterval('P' . $numberMonths . $periodUnit));

        // Check the months amount and correct if it is needed.
        if (self::shouldBeFixed($lastDate, $nextDate, $numberMonths)) {
            $nextDate->modify('last day of -1 month');
        }

        return $nextDate;
    }

    /**
     * Check that the number of months are fine.
     *
     * @param \DateTime $lastDate
     *   The date object.
     * @param \DateTime $nextDate
     *   The calculated date object.
     * @param int $numberMonths
     *   Months to add.
     *
     * @return boolean
     *   TRUE if the number of months are fine, otherwise FALSE.
     */
    private static function shouldBeFixed(\DateTime $lastDate, \DateTime $nextDate, $numberMonths)
    {
        return (boolean) (intval($nextDate->format('n')) > (intval($lastDate->format('n')) + $numberMonths) % 12 &&
            (intval($lastDate->format('n')) + $numberMonths) != 12);
    }
}
