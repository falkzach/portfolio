<?php namespace falkzach\portfolio\Project;

use falkzach\portfolio\Models\Project;

class ProjectRepository
{
    /**
     * @var Project
     */
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getAll()
    {
        return $this->project->all();
    }

    public function getOriginal()
    {
        return $this->project->where('legacy', false)->get();
    }

    public function getLegacy()
    {
        return $this->project->where('legacy', true)->get();
    }
}