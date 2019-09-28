<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Infrastructure\Persistence;

use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Videos\Infrastructure\Persistence\VideoRepositoryMySql;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Infrastructure\Persistence\CourseRepositoryMySql;
use CodelyTv\Test\Mooc\Courses\Domain\CourseMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoIdMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoMother;
use CodelyTv\Test\Mooc\Videos\VideoModuleFunctionalTestCase;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTypeMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTitleMother;
use CodelyTv\Test\Mooc\Shared\Domain\Videos\VideoUrlMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoCreatedOnMother;

final class VideoRepositoryTest extends VideoModuleFunctionalTestCase
{
    /** @test */
    public function it_should_save_a_video(): void
    {
        $course = CourseMother::random();

        $this->courseRepository()->save($course);

        $video = VideoMother::create(
            VideoIdMother::random(),
            VideoTypeMother::random(),
            VideoTitleMother::random(),
            VideoUrlMother::random(),
            $course->id(),
            VideoCreatedOnMother::random()
        );

        $this->repository()->save($video);
    }

    /** @test */
    public function it_should_find_an_existing_video(): void
    {
        $course = CourseMother::random();

        $this->courseRepository()->save($course);

        $video = VideoMother::create(
            VideoIdMother::random(),
            VideoTypeMother::random(),
            VideoTitleMother::random(),
            VideoUrlMother::random(),
            $course->id(),
            VideoCreatedOnMother::random()
        );

        $this->repository()->save($video);
        $this->clearUnitOfWork();

        $this->assertSimilar($video, $this->repository()->search($video->id()));
    }

    /** @test */
    public function it_should_not_find_a_non_existing_video(): void
    {
        $this->assertNull($this->repository()->search(VideoIdMother::random()));
    }


    private function courseRepository(): CourseRepository
    {
        return $this->service(CourseRepositoryMySql::class);
    }

    private function repository(): VideoRepository
    {
        return $this->service(VideoRepositoryMySql::class);
    }
}
