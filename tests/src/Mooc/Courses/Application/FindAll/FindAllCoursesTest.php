<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Application\FindAll;

use CodelyTv\Mooc\Courses\Application\FindAll\FindAllCoursesQueryHandler;
use CodelyTv\Mooc\Courses\Application\FindAll\FindAllCoursesQuery;
use CodelyTv\Mooc\Courses\Application\FindAll\CoursesFinder;
use CodelyTv\Test\Mooc\Courses\Domain\CourseMother;
use CodelyTv\Test\Mooc\Courses\Domain\CoursesMother;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\CourseModuleUnitTestCase;

final class FindAllCoursesTest extends CourseModuleUnitTestCase
{
    private $handler;

    protected function setUp()
    {
        parent::setUp();

        $finder = new CoursesFinder($this->repository());

        $this->handler = new FindAllCoursesQueryHandler($finder);
    }

    /** @test */
    public function it_should_find_courses(): void
    {
        $query = new FindAllCoursesQuery();

        $courses = CoursesMother::random();

        $response = CoursesResponseMother::create($courses);

        $this->shouldSearchAllCourses($courses);

        $this->assertAskResponse($query, $response, $this->handler);
    }
}
