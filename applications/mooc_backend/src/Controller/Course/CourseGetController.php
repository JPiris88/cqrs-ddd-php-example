<?php

declare(strict_types = 1);

namespace CodelyTv\MoocBackend\Controller\Course;

use CodelyTv\Mooc\Courses\Application\Find\FindCourseQuery;
use CodelyTv\Mooc\Courses\Domain\CourseNotFound;
use CodelyTv\Shared\Infrastructure\Api\Controller\ApiController;
use Symfony\Component\HttpFoundation\Response;

final class CourseGetController extends ApiController
{
    protected function exceptions(): array
    {
        return [
            CourseNotFound::class => Response::HTTP_NOT_FOUND,
        ];
    }

    public function __invoke(string $id)
    {
        return $this->ask(new FindCourseQuery($id));
    }
}
