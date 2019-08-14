<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Shared\Domain\Videos\VideoUrl;
use CodelyTv\Mooc\Videos\Domain\VideoCreatedDomainEvent;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoTitle;
use CodelyTv\Mooc\Videos\Domain\VideoType;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Shared\Domain\Videos\VideoUrlMother;
use CodelyTv\Test\Mooc\Shared\Domain\Videos\VideoCreatedOnMother;
use DateTimeImmutable;

final class VideoCreatedDomainEventMother
{
    public static function create(
        VideoId $id,
        VideoType $type,
        VideoTitle $title,
        VideoUrl $url,
        CourseId $courseId,
        DateTimeImmutable $createdOn
    ): VideoCreatedDomainEvent {
        return new VideoCreatedDomainEvent(
            $id->value(),
            [
                'type'     => $type->value(),
                'title'    => $title->value(),
                'url'      => $url->value(),
                'courseId' => $courseId->value(),
                'createdOn' => $createdOn->format('Y-m-d H:i:s')
            ]
        );
    }

    public static function random(): VideoCreatedDomainEvent
    {
        return self::create(
            VideoIdMother::random(),
            VideoTypeMother::random(),
            VideoTitleMother::random(),
            VideoUrlMother::random(),
            CourseIdMother::random(),
            VideoCreatedOnMother::random()
        );
    }
}
