<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Shared\Domain\Aggregate\AggregateRootCollection;

final class Courses extends AggregateRootCollection
{
    protected function type(): string
    {
        return Course::class;
    }
}