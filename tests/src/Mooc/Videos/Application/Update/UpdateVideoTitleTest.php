<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Application\Update;

use CodelyTv\Mooc\Videos\Application\Update\UpdateVideoTitleCommandHandler;
use CodelyTv\Mooc\Videos\Application\Update\VideoTitleUpdater;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTitleUpdatedDomainEventMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoIdMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTitleMother;
use CodelyTv\Test\Mooc\Videos\Application\Find\FindVideoQueryMother;
use CodelyTv\Test\Mooc\Videos\VideoModuleUnitTestCase;
use CodelyTv\Test\Shared\Domain\UuidMother;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

final class UpdateVideoTitleTest extends VideoModuleUnitTestCase
{
    /** @var UpdateVideoTitleCommandHandler */
    private $handler;

    protected function setUp()
    {
        parent::setUp();

        $updater = new VideoTitleUpdater($this->repository(), $this->domainEventPublisher());

        $this->handler = new UpdateVideoTitleCommandHandler($updater);
    }

    /** @test */
    public function it_should_update_a_video_title(): void
    {
        $query = FindVideoQueryMother::random();

        $id = VideoIdMother::create($query->id());
        $video = VideoMother::withId($id);

        $command = UpdateVideoTitleCommandMother::create(
            new Uuid(UuidMother::random()),
            $id,
            VideoTitleMother::create($video->title()->value())
        );

        $this->shouldSearchVideo($id, $video);

        $domainEvent = VideoTitleUpdatedDomainEventMother::create($id, VideoTitleMother::create($command->newTitle()));

        $this->shouldSaveVideo($video);
        $this->shouldPublishDomainEvents($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
