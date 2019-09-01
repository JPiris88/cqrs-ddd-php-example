<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Test\Shared\Domain\WordMother;

final class CourseTitleMother
{
    public static function create(string $title): CourseTitle
    {
        return new CourseTitle($title);
    }

    public static function random(): CourseTitle
    {
        return self::create(WordMother::random());
    }
}
