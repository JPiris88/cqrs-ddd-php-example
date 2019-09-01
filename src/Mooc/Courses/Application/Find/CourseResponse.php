<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Shared\Domain\Bus\Query\Response;

final class CourseResponse implements Response
{
    private $id;
    private $title;
    private $description;

    public function __construct(string $id, string $title, string $description)
    {
        $this->id       = $id;
        $this->title    = $title;
        $this->description    = $description;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }
}
