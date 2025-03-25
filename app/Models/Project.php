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

    public function expectedExpense() {
        return $this->expenses
        ->whereNull('payment_date')
        ->sum('value');
    }

    // despesas reais

    public function realExpense() {
        return $this->expenses
        ->whereNotNull('payment_date')
        ->sum('value');
    }

    //receitas previstas

    public function expectedReceipt() {
        return $this->receipts
        ->whereNull('payment_date')
        ->sum('value');
    }

    // receitas reais
    public function realReceipt() {
        return $this->receipts
        ->whereNotNull('payment_date')
        ->sum('value');
    }

    //lucro real

    public function expectedProfit() {
        return $this->expectedReceipt() - $this->expectedExpense();
    }

    //lucro real

    public function realProfit() {
        return $this->realReceipt() - $this->realExpense();
    }

}
