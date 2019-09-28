<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;

final class CourseCreatedDomainEventMother
{
    public static function create(
        CourseId $id,
        CourseTitle $title,
        CourseDescription $description
    ): CourseCreatedDomainEvent {
        return new CourseCreatedDomainEvent(
            $id->value(),
            [
                'title'    => $title->value(),
                'description'    => $description->value()
            ]
        );
    }

    public static function random(): CourseCreatedDomainEvent
    {
        return self::create(
            CourseIdMother::random(),
            CourseTitleMother::random(),
            CourseDescriptionMother::random()
        );
    }
}
