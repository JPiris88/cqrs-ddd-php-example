<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Shared\Domain\DomainError;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

final class CourseNotFound extends DomainError
{
    private $id;

    public function __construct(CourseId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'Course_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The Course <%s> has not been found', $this->id->value());
    }
}
