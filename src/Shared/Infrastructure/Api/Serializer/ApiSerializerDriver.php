<?php

declare(strict_types = 1);

namespace CodelyTv\Shared\Infrastructure\Api\Serializer;

use CodelyTv\Mooc\Students\Application\Find\StudentResponse;
use CodelyTv\Mooc\Courses\Application\Find\CourseResponse;
use CodelyTv\Mooc\Videos\Application\Find\VideoResponse;
use CodelyTv\Shared\Infrastructure\Jms\CodelyTvSerializerDriver;

final class ApiSerializerDriver extends CodelyTvSerializerDriver
{
    public function __construct()
    {
        $this->addResourceFile(__FILE__);
    }

    public function getMetadata(): array
    {
        return [
            CourseResponse::class => [
                'id'                 => ['type' => 'string'],
                'title'               => ['type' => 'string'],
                'description' => ['type' => 'string'],
            ],
            StudentResponse::class => [
                'id'                 => ['type' => 'string'],
                'name'               => ['type' => 'string'],
                'totalPendingVideos' => ['type' => 'string'],
            ],
            VideoResponse::class   => [
                'id'       => ['type' => 'string'],
                'type'     => ['type' => 'string'],
                'title'    => ['type' => 'string'],
                'url'      => ['type' => 'string'],
                'courseId' => ['type' => 'string'],
                'createdOn' => ['type' => 'string'],
            ],
        ];
    }
}
