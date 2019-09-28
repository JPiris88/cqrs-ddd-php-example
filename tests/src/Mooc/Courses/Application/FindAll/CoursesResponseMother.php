<?php
declare(strict_types = 1);
namespace CodelyTv\Test\Mooc\Courses\Application\FindAll;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Application\FindAll\CoursesResponse;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\Courses;
use CodelyTv\Mooc\Courses\Application\FindAll\CoursesResponseConverter;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;
use CodelyTv\Mooc\Courses\Domain\CourseDescription;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseTitleMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseDescriptionMother;
use CodelyTv\Test\Shared\Domain\DuplicatorMother;
use function Lambdish\Phunctional\each;
use function Lambdish\Phunctional\map;

final class CoursesResponseMother
{
    public static function create(
        Courses $courses
    ): CoursesResponse {
        $responseConverter = new CoursesResponseConverter();

        return $responseConverter->__invoke($courses);
    }
    public static function random(): CoursesResponse
    {
        $courses = new Courses([
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

        return new CoursesResponseConverter($courses);
    }
}