<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses\Application\Create;

use CodelyTv\Mooc\Courses\Application\Create\CreateCourseCommandHandler;
use CodelyTv\Mooc\Courses\Application\Create\CourseCreator;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseCreatedDomainEventMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseTitleMother;
use CodelyTv\Test\Mooc\Courses\Domain\CourseDescriptionMother;
use CodelyTv\Test\Mooc\Courses\CourseModuleUnitTestCase;

final class CreateCourseTest extends CourseModuleUnitTestCase
{
    /** @var CreateCourseCommandHandler */
    private $handler;

    protected function setUp()
    {
        parent::setUp();

        $creator = new CourseCreator($this->repository(), $this->domainEventPublisher());

        $this->handler = new CreateCourseCommandHandler($creator);
    }

    /** @test */
    public function it_should_create_a_course(): void
    {
        $command = CreateCourseCommandMother::random();

        $id       = CourseIdMother::create($command->id());
        $title    = CourseTitleMother::create($command->title());
        $description = CourseDescriptionMother::create($command->description());

        $course = CourseMother::create($id, $title, $description);

        $domainEvent = CourseCreatedDomainEventMother::create($id, $title, $description);

        $this->shouldSaveCourse($course);
        $this->shouldPublishDomainEvents($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
