<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseNotFound;

final class CourseFinder
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id)
    {
        $course = $this->repository->search($id);

        $this->existsCourse($id, $course);

        return $course;
    }

    private function existsCourse(CourseId $id, Course $course = null)
    {
        if (null === $course) {
            throw new CourseNotFound($id);
        }
    }
}
