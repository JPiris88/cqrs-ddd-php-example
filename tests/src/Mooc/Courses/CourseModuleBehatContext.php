<?php

declare(strict_types = 1);

namespace CodelyTv\Test\Mooc\Courses;

use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use function Lambdish\Phunctional\apply;

final class CourseModuleBehatContext extends RawMinkContext
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }
}
