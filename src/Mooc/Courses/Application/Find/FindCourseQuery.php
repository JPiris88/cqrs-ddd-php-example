<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Shared\Domain\Bus\Query\Query;

final class FindCourseQuery implements Query
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}