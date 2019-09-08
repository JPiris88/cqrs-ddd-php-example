<?php

declare(strict_types = 1);

namespace CodelyTv\MoocBackend\Controller\Video;

use CodelyTv\Mooc\Videos\Application\Update\UpdateVideoTitleCommand;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Shared\Infrastructure\Api\Controller\ApiController;
use CodelyTv\Shared\Infrastructure\Api\Response\ApiHttpOkResponse;
use Symfony\Component\HttpFoundation\Request;

final class VideoPatchTitleController extends ApiController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request)
    {
        $command = new UpdateVideoTitleCommand(
            new Uuid($request->get('request_id')),
            $request->get('id'),
            $request->get('title')
        );

        $this->dispatch($command);

        return new ApiHttpOkResponse();
    }
}
