<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Application\Update;

use CodelyTv\Mooc\Videos\Domain\VideoFinder;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Videos\Domain\VideoTitle;
use CodelyTv\Shared\Domain\Bus\Event\DomainEventPublisher;

final class VideoTitleUpdater
{
    private $finder;
    private $repository;
    private $publisher;

    public function __construct(VideoRepository $repository, DomainEventPublisher $publisher)
    {
        $this->finder     = new VideoFinder($repository);
        $this->repository = $repository;
        $this->publisher = $publisher;
    }

    public function __invoke(VideoId $id, VideoTitle $newTitle): void
    {
        $video = $this->finder->__invoke($id);

        $video->updateTitle($newTitle);

        $this->repository->save($video);

        $this->publisher->publish(...$video->pullDomainEvents());
    }
}
