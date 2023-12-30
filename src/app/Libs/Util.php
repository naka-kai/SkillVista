<?php

namespace App\Libs;

class Util
{
    /**
     * 現在時刻との差を取得する
     *
     * @param string $datetime
     * @return string
     */
    public function getDateDiff(string $datetime): string
    {
        $now = new \Carbon\Carbon();
        $target = new \Carbon\Carbon($datetime);

        $diff_seconds = $now->diffInSeconds($target);
        if (0 <= $diff_seconds && $diff_seconds < 60) return '1分前';

        $diff_minutes = $now->diffInMinutes($target);
        if (1 <= $diff_minutes && $diff_minutes < 60) return $diff_minutes . '分前';

        $diff_hours = $now->diffInHours($target);
        if (1 <= $diff_hours && $diff_hours < 24) return $diff_hours . '時間前';

        $diff_days = $now->diffInDays($target);
        if (1 <= $diff_days && $diff_days < 7) return $diff_days . '日前';

        $diff_weeks = $now->diffInWeeks($target);
        if (1 <= $diff_weeks && $diff_weeks < 4) return $diff_weeks . '週間前';

        $diff_months = $now->diffInMonths($target);
        if (1 <= $diff_months && $diff_months < 12) return $diff_months . 'ヶ月前';

        $diff_years = $now->diffInYears($target);
        if (1 <= $diff_years) return $diff_years . '年前';

        return $target->format('Y-m-d H:i:s');
    }
}