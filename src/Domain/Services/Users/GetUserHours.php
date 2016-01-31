<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class GetUserHours
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * GetUserHours constructor.
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function __invoke(array $input)
    {
        $hours = [
            'data' => [
                [
                    'shift_date' => '2016-01-30',
                    'hours_worked' => 8
                ],
                [
                    'shift_date' => '2016-02-01',
                    'hours_worked' => 8
                ],
                [
                    'shift_date' => '2016-02-02',
                    'hours_worked' => 8
                ],
                [
                    'shift_date' => '2016-02-03',
                    'hours_worked' => 8
                ],
                [
                    'shift_date' => '2016-02-04',
                    'hours_worked' => 8
                ],
            ]
        ];

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($hours);
    }
}