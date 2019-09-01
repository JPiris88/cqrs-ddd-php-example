<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class Course extends AggregateRoot
{
    private $id;
    private $title;
    private $description;

    public function __construct(CourseId $id, CourseTitle $title, CourseDescription $description)
    {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
    }

    public static function create(CourseId $id, CourseTitle $title, CourseDescription $description): Course
    {
        $course = new self($id, $title, $description);

        $course->record(
            new CourseCreatedDomainEvent(
                $id->value(),
                [
                    'title'       => $title->value(),
                    'description' => $description->value(),
                ]
            )
        );

        return $course;
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function title(): CourseTitle
    {
        return $this->title;
    }

    public function description(): CourseDescription
    {
        return $this->description;
    }

    public function updateTitle(CourseTitle $newTitle): void
    {
        $this->title = $newTitle;
    }
}
