<?php

namespace Stark\Domain\Services\Shifts;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;

class UpdateShift
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * UpdateShift constructor.
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
        return $this->payload
            ->setStatus(PayloadStatus::UPDATED)
            ->setOutput($input);
    }
}