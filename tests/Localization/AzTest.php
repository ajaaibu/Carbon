<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Localization;

use Carbon\Carbon;
use Tests\AbstractTestCase;

class AzTest extends AbstractTestCase
{
    public function testDiffForHumansLocalizedInAzerbaijani()
    {
        Carbon::setLocale('az');

        $scope = $this;
        $this->wrapWithNonDstDate(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 saniyə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 saniyə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 dəqiqə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 dəqiqə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subHour();
            $scope->assertSame('1 saat əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 saat əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subDay();
            $scope->assertSame('1 gün əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 gün əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 həftə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 həftə əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 ay əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 ay əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subYear();
            $scope->assertSame('1 il əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 il əvvəl', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->addSecond();
            $scope->assertSame('1 saniyə sonra', $d->diffForHumans(null, false, true));
            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 saniyə sonra', $d->diffForHumans($d2, false, true));
            $scope->assertSame('1 saniyə əvvəl', $d2->diffForHumans($d, false, true));
            $scope->assertSame('1 saniyə', $d->diffForHumans($d2, true, true));
            $scope->assertSame('2 saniyə', $d2->diffForHumans($d->addSecond(), true, true));
        });
    }
}
