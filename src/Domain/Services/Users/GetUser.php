<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class GetUser
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * GetUser constructor.
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
        $user = [
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Bob Smith',
                    'role' => 'employee',
                    'email' => 'bob@starkindustries.com',
                    'phone' => '555-555-5555',
                    'created_at' => '2016-01-30',
                    'updated_at' => '2016-01-31'
                ]
            ]
        ];

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($user);
    }
}