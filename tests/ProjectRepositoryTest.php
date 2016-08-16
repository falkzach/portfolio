<?php

use falkzach\portfolio\Models\Project;
use falkzach\portfolio\Project\ProjectRepository;
use Illuminate\Support\Facades\App;

class ProjectRepositoryTest extends TestCase
{
    /** @var  ProjectRepository $projectRepository */
    private $projectRepository;

    public function setUp()
    {
        parent::setUp();
        $this->projectRepository = App::make('falkzach\portfolio\Project\ProjectRepository');
        $this->createInitialProjects();
    }

    private function createInitialProjects()
    {
        Project::create(
            ['name' => 'Test Project', 'description' => 'A project for testing purposes.', 'legacy' => false]
        );
        Project::create(
            ['name' => 'Legacy Project', 'description' => 'A project for testing purposes.', 'legacy' => true]
        );
    }

    public function testGetAll()
    {
        $projects = $this->projectRepository->getAll();
        $this->assertCount(2, $projects);
    }

    public function testGetOriginal()
    {
        $projects = $this->projectRepository->getOriginal();
        $this->assertCount(1, $projects);
        $this->assertEquals('Test Project', $projects[0]->name);
    }

    public function testGetLegacy()
    {
        $projects = $this->projectRepository->getLegacy();
        $this->assertCount(1, $projects);
        $this->assertEquals('Legacy Project', $projects[0]->name);
    }
}
