<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest; 

use App\Task;

class TasksController extends Controller
{
    private $tasks;
    
    /*public function __construct() {
        
        $this->tasks = collect([
            ['id' => 2, 'name' => 'Learn Laravel', 'duration' => 12],
            ['id' => 3, 'name' => 'Learn RubyOnRails', 'duration' => 24]
        ])->keyBy('id');
    }*/
    
    public function index() {
        
        //return view('tasks.index')->with('tasks', $this->tasks);
        return view('tasks.index')->with('tasks', Task::all());
        //pour afficher que le tâches avec done ? false
    }
    
    public function show ( $id ) {
        
        //return view('tasks.show')->with('task', $this->tasks[$id]); 
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }
    
    public function create () {
        
        return view('tasks.create');
    }
    
    //public function store ( Request $request ) {
    public function store ( TaskStoreRequest $request ) {
        
        //$task = Task::create($request->all());
        $task = new Task();
        $task->name =$request->name;
        $task->save();
        return redirect(route('tasks.index'));
        
        //$this->validate($request, ['name' => 'required|max:255',]);
        
        //autres validations possibles par exemple (pas pour cet example)
        //'validation_date' => 'required|date|after:check_date'
        //'logo' => 'dimensions:min_width=100,min_height=200'
        //'country' => 'exists:country,abbreviation'
    }
    
    // route model binding
    // see https://laravel.com/docs/5.4/routing#route-model-binding
    public function update ( Request $request, Task $task ) {
        
        $task->done = true;
        $task->save();
        $request->session()->flash('status', 'Task done !');
        return redirect(route('tasks.index', ['done' => true]));
    }
    
}

