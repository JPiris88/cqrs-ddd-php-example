<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Courses\Domain\CourseFinder as DomainCourseFinder;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;

final class CourseFinder
{
    private $finder;

    public function __construct(CourseRepository $repository)
    {
        $this->finder = new DomainCourseFinder($repository);
    }

    public function __invoke(CourseId $id)
    {
        return $this->finder->__invoke($id);
    }
}
