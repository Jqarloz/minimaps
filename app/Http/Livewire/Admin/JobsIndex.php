<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menus\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.jobs-index', compact('jobs'));
    }
}
