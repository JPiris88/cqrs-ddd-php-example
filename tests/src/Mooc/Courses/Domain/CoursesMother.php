<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\Courses;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;

final class CoursesMother
{
    public static function random(): Courses
    {
        return new Courses([
            new Course(
                CourseIdMother::random(),
                CourseTitleMother::random(),
                CourseDescriptionMother::random()),
            new Course(
                CourseIdMother::random(),
                CourseTitleMother::random(),
                CourseDescriptionMother::random()),
            new Course(
                CourseIdMother::random(),
                CourseTitleMother::random(),
                CourseDescriptionMother::random())]);
    }
}
