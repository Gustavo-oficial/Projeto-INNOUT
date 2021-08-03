<?php

class WorkingHours extends Model
{
    protected static $tableName = 'working_hours';
    protected static $columns = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time',
    ];

    public static function loadFromUserAndDate($userId, $workDate)
    {
        $registro = self::getOne(['user_id' => $userId, 'work_date' => $workDate]);

        if (!$registro) {
            $registro = new WorkingHours([
                'user_id' => $userId,
                'work_date' => $workDate,
                'worked_time' => 0,
            ]);
        }

        return $registro;
    }

    public function getNextTime()
    {
        if (!$this->time1) {
            return 'time1';
        }

        if (!$this->time2) {
            return 'time2';
        }

        if (!$this->time3) {
            return 'time3';
        }

        if (!$this->time4) {
            return 'time4';
        }

        return null;
    }

    public function innout($time)
    {
        $timeColuwn = $this->getNextTime();

        if (!$timeColuwn) {
            throw new AppException('Todos batimentos do dia ja realizados');
        }
        $this->$timeColuwn = $time;
        $this->worked_time = getSecondsFromDateInterval($this->getWorkedInterval());
        if ($this->id) {
            $this->update();
        } else {
            $this->save();
        }
    }

    function getBalance() {
        if(!$this->time1 && !isPastWorkday($this->work_date)) return '';
        if($this->worked_time == DAILY_TIME) return '-';

        $balance = $this->worked_time - DAILY_TIME;
        $balanceString = getTimeStringFromSeconds(abs($balance));
        $sign = $this->worked_time >= DAILY_TIME ? '+' : '-';
        return "{$sign}{$balanceString}";
    }

    public function getWorkedInterval()
    {
        [$t1, $t2, $t3, $t4] = $this->getTimes();

        $part1 = new DateInterval('PT0S');
        $part2 = new DateInterval('PT0S');

        if ($t1) {
            $part1 = $t1->diff(new DateTime());
        }

        if ($t2) {
            $part1 = $t1->diff($t2);
        }

        if ($t3) {
            $part2 = $t3->diff(new DateTime());
        }

        if ($t4) {
            $part2 = $t3->diff($t4);
        }

        return sumIntervals($part1, $part2);
    }

    public function almocoInterval()
    {
        [, $t2, $t3,] = $this->getTimes();

        $tempinho = new DateInterval('PT0S');


        if ($t2) {
            $tempinho = $t2->diff(new DateTime());
        }

        if ($t3) {
            $tempinho = $t2->diff($t3);
        }

        return $tempinho;
    }

    public function meterOPe()
    {
        [$t1,,,$t4] = $this->getTimes();

        $workday = DateIntervaL::createFromDateString('8 hours 48 minutes');


        if(!$t1){
            return (new DateTimeImmutable())->add($workday);
        } elseif ($t4){
             return $t4;
        } else{
            $total = sumIntervals($workday, $this->almocoInterval());
            return $t1->add($total);
        }
    }

    public function getActiveClock(){
        $next = $this->getNextTime();

        if($next === 'time1' || $next === 'time3'){
           return 'exitTime';
        } elseif ($next === 'time2' || $next === 'time4'){
            return 'workedInterval';
        } else{
            return null;
        }
    }

    public static function getMonthlyReport($userId, $date) {
        $registries = [];
        $startDate = getFirstDayOfMonth($date)->format('Y-m-d');
        $endDate = getLastDayOfMonth($date)->format('Y-m-d');

        $result = static::getResultSetFromSelect([
            'user_id' => $userId,
            'raw' => "work_date between '{$startDate}' AND '{$endDate}'"
        ]);

        if($result) {
            while($row = $result->fetch_assoc()) {
                $registries[$row['work_date']] = new WorkingHours($row);
            }
        }     
        return $registries;
    }

    private function getTimes()
    {
        $times = [];

        $this->time1 ? array_push($times, getDateFromString($this->time1)) : array_push($times, null);
        $this->time2 ? array_push($times, getDateFromString($this->time2)) : array_push($times, null);
        $this->time3 ? array_push($times, getDateFromString($this->time3)) : array_push($times, null);
        $this->time4 ? array_push($times, getDateFromString($this->time4)) : array_push($times, null);

        return $times;
    }
}
