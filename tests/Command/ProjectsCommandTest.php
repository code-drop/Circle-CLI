<?php

namespace Circle\Tests\Command;

use Circle\Tests\TestSetupTrait;

class ProjectsCommandTest extends \PHPUnit_Framework_TestCase {

  use TestSetupTrait;

  /**
   * Test the projects command executes without any issues.
   */
  public function testProjectsCommand() {
    $config['endpoints']['get_all_projects'] = [
      'request' => [
        'circle-token' => '',
      ],
      'username' => 'username-in-config',
      'project' => 'project-name-in-config',
      'display' => ['committer_name'],
    ];
    // Get the mock circle config and service.
    $circle_config = $this->getCircleConfigMock($config);
    $circle = $this->getCircleServiceMock($circle_config);

    $circle
      ->expects($this->once())
      ->method('queryCircle')
      ->willReturn(['results' => []]);

    $command = $this->getCommand('Circle\Command\ProjectsCommand', $circle);
    $this->runCommand($command);
  }

}
