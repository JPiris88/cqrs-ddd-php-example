<?php

declare(strict_types = 1);

namespace CodelyTv\MoocBackend\Controller\Courses;

use CodelyTv\Mooc\Courses\Application\FindAll\FindAllCoursesQuery;
use CodelyTv\Shared\Infrastructure\Api\Controller\ApiController;
use Symfony\Component\HttpFoundation\Response;

final class CoursesGetController extends ApiController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke()
    {
        return $this->ask(new FindAllCoursesQuery());
    }
}