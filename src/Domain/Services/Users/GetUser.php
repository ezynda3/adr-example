<?php

namespace Stark\Domain\Services\Users;

use Aura\Payload_Interface\PayloadInterface;
use Aura\Payload_Interface\PayloadStatus;
use Stark\Domain\Entities\User;

class GetUser
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
     * GetUser constructor.
     * @param PayloadInterface $payload
     * @param User $user
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
        return $this->payload
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput($this->user->find($input['id'])->toArray());
    }
}