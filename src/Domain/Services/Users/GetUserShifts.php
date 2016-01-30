<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class GetUserShifts
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * GetUserShifts constructor.
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    public function __invoke(array $input)
    {
        $shifts = [
            'data' => [
                [
                    'id' => 1,
                    'manager_id' => 4,
                    'employee_id' => 1,
                    'break' => 15,
                    'start_time' => '2016-01-30 09:00:00',
                    'end_time' => '2016-01-30 17:00:00',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-30'
                ],
                [
                    'id' => 2,
                    'manager_id' => 5,
                    'employee_id' => 1,
                    'break' => 15,
                    'start_time' => '2016-02-30 09:00:00',
                    'end_time' => '2016-02-30 17:00:00',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-30'
                ],
                [
                    'id' => 3,
                    'manager_id' => 4,
                    'employee_id' => 1,
                    'break' => 15,
                    'start_time' => '2016-03-30 09:00:00',
                    'end_time' => '2016-03-30 17:00:00',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-30'
                ],
            ]
        ];

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($shifts);
    }
}