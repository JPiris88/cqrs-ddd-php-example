<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Videos\Domain;

use DateTimeImmutable;

final class VideoCreatedOnMother
{
    public static function create(DateTimeImmutable $date): DateTimeImmutable
    {
        return $date;
    }

    public static function random(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
