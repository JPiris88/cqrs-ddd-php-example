<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Application\FindAll;

use CodelyTv\Mooc\Courses\Domain\Courses;
use CodelyTv\Mooc\Courses\Application\Find\CourseResponseConverter;

final class CoursesResponseConverter
{
    private $items;

    public function __invoke(Courses $courses): CoursesResponse
    {
        $this->items = Array();

        foreach ($courses as &$course) {
            array_push($this->items, [
                'id' => $course->id()->value(),
                'title' => $course->title()->value(),
                'description' => $course->description()->value()]);
        }
        
        return new CoursesResponse($this->items);
    }
}
