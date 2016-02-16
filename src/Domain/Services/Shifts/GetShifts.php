<?php

namespace Stark\Domain\Services\Shifts;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;
use Stark\Domain\Entities\Shift;

class GetShifts
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
     * GetUsers constructor.
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
        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($this->shift->all());
    }
}