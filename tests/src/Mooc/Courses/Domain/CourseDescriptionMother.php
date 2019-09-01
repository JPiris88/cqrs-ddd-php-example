<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Test\Shared\Domain\WordMother;

final class CourseDescriptionMother
{
    public static function create(string $description): CourseDescription
    {
        return new CourseDescription($description);
    }

    public static function random(): CourseDescription
    {
        return self::create(WordMother::random());
    }
}
