<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\FindAll;

use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Domain\Courses;

final class CoursesFinder
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Courses
    {
        return $this->repository->all();
    }
}
