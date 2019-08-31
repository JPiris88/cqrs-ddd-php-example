<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

final class CourseFinder
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id): Course
    {
        $Course = $this->repository->search($id);

        $this->ensureCourseExists($id, $Course);

        return $Course;
    }
    
    private function ensureCourseExists(CourseId $id, Course $Course = null): void
    {
        if (null === $Course) {
            throw new CourseNotFound($id);
        }
    }
}
