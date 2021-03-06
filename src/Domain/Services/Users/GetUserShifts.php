<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;
use Stark\Domain\Entities\User;

class GetUserShifts
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * @var User
     */
    private $user;

    /**
     * GetUserShifts constructor.
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload, User $user)
    {
        $this->payload = $payload;
        $this->user = $user;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function __invoke(array $input)
    {
        $user = $this->user->find($input['id']);

        if (!$user) {
            return $this->payload
                ->setStatus(PayloadStatus::NOT_FOUND);
        }

        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($this->user->find($input['id'])->shifts);
    }
}