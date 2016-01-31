<?php

namespace Stark\Domain\Services\Shifts;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class CreateShift
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * CreateShift constructor.
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    public function __invoke(array $input)
    {
        return $this->payload
            ->setStatus(PayloadStatus::CREATED)
            ->setOutput($input);
    }
}