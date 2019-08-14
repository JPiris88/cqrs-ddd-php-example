<?php

declare(strict_types = 1);

namespace CodelyTv\MoocBackend\Controller\Status;

use CodelyTv\Shared\Infrastructure\Api\Response\ApiHttpOkResponse;
use DateTimeImmutable;

final class StatusGetController
{
    public function __invoke()
    {
        $fecha = new DateTimeImmutable('2017-02-29');
        return new ApiHttpOkResponse(['status' => 'OK']);
    }
}
