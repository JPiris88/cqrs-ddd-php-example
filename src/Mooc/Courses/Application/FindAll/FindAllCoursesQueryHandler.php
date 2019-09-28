<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\FindAll;

use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindAllCoursesQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(CoursesFinder $finder)
    {
        $this->finder = pipe($finder, new CoursesResponseConverter());
    }

    public function __invoke(FindAllCoursesQuery $query): CoursesResponse
    {
        return apply($this->finder, []);
    }
}
