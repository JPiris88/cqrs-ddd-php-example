<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Domain;

use CodelyTv\Mooc\Videos\Domain\VideoTitleUpdatedDomainEvent;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoTitle;

final class VideoTitleUpdatedDomainEventMother
{
    public static function create(
        VideoId $id,
        VideoTitle $title
    ): VideoTitleUpdatedDomainEvent {
        return new VideoTitleUpdatedDomainEvent(
            $id->value(),
            [
                'title'    => $title->value()
            ]
        );
    }

    public static function random(): VideoTitleUpdatedDomainEvent
    {
        return self::create(
            VideoIdMother::random(),
            VideoTitleMother::random()
        );
    }
}
