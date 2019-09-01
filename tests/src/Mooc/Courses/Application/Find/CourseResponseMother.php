<?php
declare(strict_types = 1);
namespace CodelyTv\Test\Mooc\Courses\Application\Find;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Application\Find\CourseResponse;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseTitleMother;
use CodelyTv\Test\Shared\Domain\DuplicatorMother;

final class CourseResponseMother
{
    public static function create(
        CourseId $id,
        CourseTitle $title,
        CourseDescription $description
    ): CourseResponse {
        return new CourseResponse($id->value(), $title->value(), $description->value());
    }
    public static function withId(CourseId $id): CourseResponse
    {
        return DuplicatorMother::with(self::random(), ['id' => $id->value()]);
    }
    public static function random(): CourseResponse
    {
        return self::create(
            CourseIdMother::random(),
            CourseTitleMother::random(),
            CourseDescriptionMother::random()
        );
    }
}