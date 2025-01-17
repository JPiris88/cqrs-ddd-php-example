<?php
declare(strict_types = 1);
namespace CodelyTv\Test\Mooc\Videos\Application\Find;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Mooc\Shared\Domain\Videos\VideoUrl;
use CodelyTv\Mooc\Videos\Application\Find\VideoResponse;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoTitle;
use CodelyTv\Mooc\Videos\Domain\VideoType;
use CodelyTv\Test\Mooc\Shared\Domain\Courses\CourseIdMother;
use CodelyTv\Test\Mooc\Shared\Domain\Videos\VideoUrlMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoIdMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTitleMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoTypeMother;
use CodelyTv\Test\Mooc\Videos\Domain\VideoCreatedOnMother;
use CodelyTv\Test\Shared\Domain\DuplicatorMother;
use DateTimeImmutable;

final class VideoResponseMother
{
    public static function create(
        VideoId $id,
        VideoType $type,
        VideoTitle $title,
        VideoUrl $url,
        CourseId $courseId,
        DateTimeImmutable $createdOn
    ): VideoResponse {
        return new VideoResponse($id->value(), $type->value(), $title->value(), $url->value(), $courseId->value(), $createdOn->format('Y-m-d H:i:s'));
    }
    public static function withId(VideoId $id): VideoResponse
    {
        return DuplicatorMother::with(self::random(), ['id' => $id->value()]);
    }
    public static function random(): VideoResponse
    {
        return self::create(
            VideoIdMother::random(),
            VideoTypeMother::random(),
            VideoTitleMother::random(),
            VideoUrlMother::random(),
            CourseIdMother::random(),
            VideoCreatedOnMother::random()
        );
    }
}