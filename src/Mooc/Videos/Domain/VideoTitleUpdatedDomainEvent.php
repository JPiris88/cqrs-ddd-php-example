<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

/**
 * @method string title()
 */
final class VideoTitleUpdatedDomainEvent extends DomainEvent
{
    public static function eventName(): string
    {
        return 'video_title_updated';
    }

    protected function rules(): array
    {
        return [
            'title'    => ['string']
        ];
    }
}
