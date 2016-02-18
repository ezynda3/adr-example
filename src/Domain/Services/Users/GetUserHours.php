<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;
use Carbon\Carbon;
use Stark\Domain\Entities\Shift;

class GetUserHours
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * @var Shift
     */
    private $shift;

    /**
     * GetUserHours constructor.
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload, Shift $shift)
    {
        $this->payload = $payload;
        $this->shift = $shift;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function __invoke(array $input)
    {
        if (!isset($input['month'])) {
            return $this->payload
                ->setStatus(PayloadStatus::ERROR)
                ->setInput($input)
                ->setOutput("Month cannot be blank e.g. '?month=2016-02'");
        }

        if (!\Datetime::createFromFormat('Y-m', $input['month'])) {
            return $this->payload
                ->setStatus(PayloadStatus::ERROR)
                ->setInput($input)
                ->setOutput("Month is incorrect format e.g. '?month=2016-02'");
        }

        $month_start = Carbon::createFromFormat('Y-m', $input['month'])->startOfMonth();
        $month_end = Carbon::createFromFormat('Y-m', $input['month'])->endOfMonth();

        $shifts = $this->shift
            ->where('employee_id', '=', $input['id'])
            ->where('start_time', '>=', $month_start)
            ->where('start_time', '<=', $month_end)
            ->get();

        $hours = [
            'total_shifts' => $shifts->count(),
            'total_hours' => 0
        ];

        foreach ($shifts as $shift) {
            $hours['total_hours'] += $shift->start_time->diffInHours($shift->end_time);
        }

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($hours);
    }
}