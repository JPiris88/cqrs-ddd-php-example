<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Courses\Application\Find\FindCourseQuery;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;

final class FindCourseQueryMother
{
    public static function create(CourseId $id): FindCourseQuery
    {
        return new FindCourseQuery($id->value());
    }

    public static function random(): FindCourseQuery
    {
        return self::create(CourseIdMother::random());
    }
}
