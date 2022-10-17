<?php

namespace Msaaq\NelcLaravel;

use Msaaq\Nelc\ApiClient;
use Msaaq\Nelc\Common\Platform;
use Msaaq\Nelc\Interfaces\StatementInterface;
use Msaaq\Nelc\StatementClient;

class Nelc
{
    private ApiClient $client;

    public function __construct(
        private readonly string $key,
        private readonly string $secret,
        private readonly string $platformIdentifier = '',
        private readonly string $platformName = '',
        private readonly bool $isSandbox = false
    ) {
        $this->client = new ApiClient(
            key: $this->key,
            secret: $this->secret,
            isSandbox: $this->isSandbox,
        );
    }

    public function sendStatement(StatementInterface $statement)
    {
        if ( ! $this->platformIdentifier) {
            $platform = new Platform($this->platformIdentifier, $this->platformName);
        }

        return StatementClient::setClient($this->client)
                              ->setPlatform($platform ?? $statement->getPlatform())
                              ->send($statement);
    }
}
