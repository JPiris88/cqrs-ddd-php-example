<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\VideoComments\Domain;

use CodelyTv\Mooc\VideoComments\Contract\VideoCommentPublishedDomainEvent;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class VideoComment extends AggregateRoot
{
    private $id;
    private $videoId;
    private $content;

    public function __construct(VideoCommentId $id, VideoId $videoId, VideoCommentContent $content)
    {
        $this->id      = $id;
        $this->videoId = $videoId;
        $this->content = $content;
    }

    public static function publish(VideoCommentId $id, VideoId $videoId, VideoCommentContent $content): VideoComment
    {
        $comment = new self($id, $videoId, $content);

        $comment->record(
            new VideoCommentPublishedDomainEvent(
                $id->value(),
                [
                    'videoId' => $videoId->value(),
                    'content' => $content->value(),
                ]
            )
        );

        return $comment;
    }

    public function id(): VideoCommentId
    {
        return $this->id;
    }

    public function videoId(): VideoId
    {
        return $this->videoId;
    }

    public function content(): VideoCommentContent
    {
        return $this->content;
    }
}
