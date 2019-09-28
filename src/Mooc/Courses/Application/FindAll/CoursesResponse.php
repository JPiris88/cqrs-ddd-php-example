<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\FindAll;

use CodelyTv\Mooc\Courses\Application\Find\CourseResponse;
use CodelyTv\Shared\Domain\Bus\Query\Response;

final class CoursesResponse implements Response
{
    private $courses;

    public function __construct(Array $courses)
    {
        $this->courses = $courses;
    }

    public function items()
    {
        return $this->courses;
    }
}
