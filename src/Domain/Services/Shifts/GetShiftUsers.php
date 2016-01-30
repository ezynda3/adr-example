<?php

namespace Stark\Domain\Services\Shifts;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class GetShiftUsers
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    public function __invoke(array $input)
    {
        $users = [
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Bob Smith',
                    'role' => 'employee',
                    'email' => 'bob@starkindustries.com',
                    'phone' => '555-555-5555',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-31'
                ],
                [
                    'id' => 2,
                    'name' => 'Jon Jones',
                    'role' => 'employee',
                    'email' => 'jon@starkindustries.com',
                    'phone' => '555-555-5555',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-31'
                ],
                [
                    'id' => 3,
                    'name' => 'Sally Black',
                    'role' => 'employee',
                    'email' => 'sally@starkindustries.com',
                    'phone' => '555-555-5555',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-31'
                ],
                [
                    'id' => 4,
                    'name' => 'Tony Stark',
                    'role' => 'manager',
                    'email' => 'tony@starkindustries.com',
                    'phone' => '555-555-5555',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-31'
                ],
            ]
        ];

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($users);
    }
}