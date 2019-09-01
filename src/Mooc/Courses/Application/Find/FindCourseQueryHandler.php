<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindCourseQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(CourseFinder $finder)
    {
        $this->finder = pipe($finder, new CourseResponseConverter());
    }

    public function __invoke(FindCourseQuery $query): CourseResponse
    {
        $id = new CourseId($query->id());

        return apply($this->finder, [$id]);
    }
}
