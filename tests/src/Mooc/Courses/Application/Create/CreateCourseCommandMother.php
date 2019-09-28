<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Application\Create;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Application\Create\CreateCourseCommand;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseTitleMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseDescriptionMother;
use CodelyTv\Test\Shared\Domain\UuidMother;

final class CreateCourseCommandMother
{
    public static function create(
        Uuid $requestId,
        CourseId $id,
        CourseTitle $title,
        CourseDescription $description
    ): CreateCourseCommand {
        return new CreateCourseCommand(
            $requestId,
            $id->value(),
            $title->value(),
            $description->value()
        );
    }

    public static function random(): CreateCourseCommand
    {
        return self::create(
            new Uuid(UuidMother::random()),
            CourseIdMother::random(),
            CourseTitleMother::random(),
            CourseDescriptionMother::random()
        );
    }
}
