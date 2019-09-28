<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Infrastructure\Persistence;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\Courses;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Shared\Infrastructure\Doctrine\DoctrineRepository;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

final class CourseRepositoryMySql extends DoctrineRepository implements CourseRepository
{
    public function all(): Courses {
        return new Courses($this->repository(Course::class)->findAll());
    }

    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
