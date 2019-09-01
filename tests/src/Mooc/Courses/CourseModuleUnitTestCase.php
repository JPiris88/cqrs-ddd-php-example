<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Test\Mooc\Shared\Infrastructure\MoocContextUnitTestCase;
use Mockery\MockInterface;
use function CodelyTv\Test\Shared\equalTo;
use function CodelyTv\Test\Shared\similarTo;

abstract class CourseModuleUnitTestCase extends MoocContextUnitTestCase
{
    private $repository;

    /** @return CourseRepository|MockInterface */
    protected function repository()
    {
        return $this->repository = $this->repository ?: $this->mock(CourseRepository::class);
    }
    
    protected function shouldSearchCourse(CourseId $id, Course $Course = null): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(equalTo($id))
            ->once()
            ->andReturn($Course);
    }
}
