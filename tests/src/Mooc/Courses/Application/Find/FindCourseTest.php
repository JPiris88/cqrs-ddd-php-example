<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Courses\Application\Find\FindCourseQueryHandler;
use CodelyTv\Mooc\Courses\Application\Find\CourseFinder;
use CodelyTv\Mooc\Courses\Domain\CourseNotFound;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseMother;
use CodelyTv\Test\Mooc\Courses\CourseModuleUnitTestCase;

final class FindCourseTest extends CourseModuleUnitTestCase
{
    /** @var FindCourseQueryHandler */
    private $handler;

    protected function setUp()
    {
        parent::setUp();

        $finder = new CourseFinder($this->repository());

        $this->handler = new FindCourseQueryHandler($finder);
    }

    /** @test */
    public function it_should_find_an_existing_course(): void
    {
        $query = FindCourseQueryMother::random();

        $id    = CourseIdMother::create($query->id());
        $Course = CourseMother::withId($id);

        $response = CourseResponseMother::create(
            $Course->id(),
            $Course->title(),
            $Course->description()
        );

        $this->shouldSearchCourse($id, $Course);

        $this->assertAskResponse($query, $response, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_finding_a_non_existing_course(): void
    {
        $query = FindCourseQueryMother::random();

        $id = CourseIdMother::create($query->id());

        $this->shouldSearchCourse($id);

        $this->assertAskThrowsException(CourseNotFound::class, $query, $this->handler);
    }
}
