<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Update;

use CodelyTv\Mooc\Courses\Domain\CourseFinder;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\CourseTitle;

final class CourseTitleUpdater
{
    private $finder;
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->finder     = new CourseFinder($repository);
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id, CourseTitle $newTitle): void
    {
        $course = $this->finder->__invoke($id);

        $course->updateTitle($newTitle);

        $this->repository->save($course);
    }
}
