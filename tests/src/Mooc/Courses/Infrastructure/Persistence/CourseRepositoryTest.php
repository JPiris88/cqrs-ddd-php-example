<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Infrastructure\Persistence;

use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Infrastructure\Persistence\CourseRepositoryMySql;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseMother;
use CodelyTv\Test\Mooc\Courses\CourseModuleFunctionalTestCase;

final class CourseRepositoryTest extends CourseModuleFunctionalTestCase
{
    /** @test */
    public function it_should_save_a_course(): void
    {
        $this->repository()->save(CourseMother::random());
    }

    /** @test */
    public function it_should_find_an_existing_course(): void
    {
        $course = CourseMother::random();

        $this->repository()->save($course);
        $this->clearUnitOfWork();

        $this->assertSimilar($course, $this->repository()->search($course->id()));
    }

    /** @test */
    public function it_should_not_find_a_non_existing_course(): void
    {
        $this->assertNull($this->repository()->search(CourseIdMother::random()));
    }

    private function repository(): CourseRepository
    {
        return $this->service(CourseRepositoryMySql::class);
    }
}
