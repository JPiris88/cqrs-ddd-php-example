<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Application\Update;

use CodelyTv\Mooc\Videos\Application\Update\UpdateVideoTitleCommand;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoTitle;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Test\Mooc\Videos\Domain\VideoIdMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTitleMother;
use CodelyTv\Test\Shared\Domain\UuidMother;

final class UpdateVideoTitleCommandMother
{
    public static function create(
        Uuid $requestId,
        VideoId $id,
        VideoTitle $title
    ): UpdateVideoTitleCommand {
        return new UpdateVideoTitleCommand(
            $requestId,
            $id->value(),
            $title->value()
        );
    }

    public static function random(): UpdateVideoTitleCommand
    {
        return self::create(
            new Uuid(UuidMother::random()),
            VideoIdMother::random(),
            VideoTitleMother::random()
        );
    }
}
