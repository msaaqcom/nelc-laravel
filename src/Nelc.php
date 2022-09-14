<?php

namespace Msaaq\NelcLaravel;

use Msaaq\Nelc\ApiClient;
use Msaaq\Nelc\Interfaces\StatementInterface;
use Msaaq\Nelc\StatementClient;

class Nelc
{
    private ApiClient $client;

    public function __construct(
        private readonly string $key,
        private readonly string $secret,
        private readonly string $platform,
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
        return StatementClient::setClient($this->client)
                              ->setPlatform($this->platform)
                              ->send($statement);
    }
}
