<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;

final class CourseMother
{
    public static function withId(CourseId $id): Course
    {
        return self::create(
            $id,
            CourseTitleMother::random(),
            CourseDescriptionMother::random()
        );
    }

    public static function create(
        CourseId $id,
        CourseTitle $title,
        CourseDescription $description
    ): Course {
        return new Course($id, $title, $description);
    }

    public static function random(): Course
    {
        return self::create(
            CourseIdMother::random(),
            CourseTitleMother::random(),
            CourseDescriptionMother::random()
        );
    }
}
