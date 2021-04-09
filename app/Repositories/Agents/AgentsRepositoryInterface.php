<?php
namespace App\Repositories\Agents;

interface AgentsRepositoryInterface
{
    public function find($id);
    public function getList($attr=[]);
}
