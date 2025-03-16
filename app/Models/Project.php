<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $guarded = [];
    
    public function client() 
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'project_id');
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'project_id');
    }

    // métodos dos cálculos

    // progresso

    private function tasksAll(){
        return Task::where('project_id', $this->id)->count();
    }

    private function tasksCompleted(){
        return Task::where('project_id', $this->id)->where('completed', 1)->count();
    }

    public function progress()
    {
        $tasks_all = $this->tasksAll();
        $tasks_completed = $this->tasksCompleted();

        if ($tasks_all > 0) {
            $progress = ($tasks_completed / $tasks_all) * 100;
        }
        else {
            $progress = 100;
        }

        $progress = number_format($progress, 2);

        return $progress;
    }

    // despesas previstas

    public function expectedExpenses() {
        $value_expected_expenses = 0;
        foreach ($this->tasks as $task) {
            $value_expected_expenses += $task->value;
        }

        return $value_expected_expenses;
    }

    // despesas reais

    public function realExpenses() {
        $value_real_expenses = 0;
        foreach ($this->expenses as $expense) {
            $value_real_expenses += $expense->value;
        }

        return $value_real_expenses;
    }

    //receitas previstas

    public function expectedReceipts() {
        return 0;
    }


    // receitas reais

    public function realReceipts() {
        $value_real_receipts = 0;
        foreach ($this->receipts as $receipt) {
            $value_real_receipts += $receipt->value;
        }

        return $value_real_receipts;
    }

    //lucro real

    public function expectedProfit() {
        return $this->expectedReceipts() - $this->expectedExpenses();
    }

    //lucro real

    public function realProfit() {
        return $this->realReceipts() - $this->realExpenses();
    }

}
