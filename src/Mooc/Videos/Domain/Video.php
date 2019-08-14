<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Shared\Domain\Videos\VideoUrl;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;
use DateTimeImmutable;

final class Video extends AggregateRoot
{
    private $id;
    private $type;
    private $title;
    private $url;
    private $courseId;
    private $createdOn;

    public function __construct(VideoId $id, VideoType $type, VideoTitle $title, VideoUrl $url, CourseId $courseId, DateTimeImmutable $createdOn)
    {
        $this->id       = $id;
        $this->type     = $type;
        $this->title    = $title;
        $this->url      = $url;
        $this->courseId = $courseId;
        $this->createdOn = $createdOn;
    }

    public static function create(
        VideoId $id,
        VideoType $type,
        VideoTitle $title,
        VideoUrl $url,
        CourseId $courseId,
        DateTimeImmutable $createdOn
    ): Video {
        $video = new self($id, $type, $title, $url, $courseId, $createdOn);

        $video->record(
            new VideoCreatedDomainEvent(
                $id->value(),
                [
                    'type'     => $type->value(),
                    'title'    => $title->value(),
                    'url'      => $url->value(),
                    'courseId' => $courseId->value(),
                    'createdOn' => $createdOn->format('Y-m-d H:i:s')
                ]
            )
        );

        return $video;
    }

    public function updateTitle(VideoTitle $newTitle): void
    {
        $this->title = $newTitle;
    }

    public function id(): VideoId
    {
        return $this->id;
    }

    public function type(): VideoType
    {
        return $this->type;
    }

    public function title(): VideoTitle
    {
        return $this->title;
    }

    public function url(): VideoUrl
    {
        return $this->url;
    }

    public function courseId(): CourseId
    {
        return $this->courseId;
    }

    public function createdOn(): DateTimeImmutable
    {
        return $this->createdOn;
    }
}
