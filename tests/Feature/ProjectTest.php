<?php

use App\Models\Project;

uses(Tests\TestCase::class);

beforeEach(function () {
    $this->refreshApplication(); // Ensures Laravel is booted
});

test('Project method', function () {
    $project = Project::inRandomOrder()->first();

    echo 'Project Title : ' . $project->title . PHP_EOL;

    echo 'Despesa Esperada: '. $project->expectedExpense() . PHP_EOL;
    echo 'Despesa : '. $project->realExpense() . PHP_EOL;
    echo 'Receita Esperada: '. $project->expectedReceipt() . PHP_EOL;
    echo 'Receita : '. $project->realReceipt() . PHP_EOL;
    echo 'Lucro Esperado : '. $project->expectedProfit() . PHP_EOL;
    echo 'Lucro : '. $project->realProfit() . PHP_EOL;
});
