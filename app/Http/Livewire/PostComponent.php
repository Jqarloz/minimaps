<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public $name, $body, $post_id;

    public $accion = "store";

    protected $rules = [
        'name' => 'required|max:20',
        'body' => 'required'
    ];

    protected $validationAttributes = [
        'name' => 'Nombre'
    ];

    public $messages = [
        'body.required' => 'Ingrese una descripción'
    ];

    public function render()
    {
        $posts = Post::latest('id')->paginate(5);
        return view('livewire.post-component', compact('posts'));
    }
    
    public function store()
    {
        $this->validate();

        Post::create([
            'name' => $this->name,
            'body' => $this->body
        ]);

        $this->reset(['name', 'body']);
    }

    public function edit(Post $x)
    {
        $this->name = $x->name;
        $this->body = $x->body;
        $this->post_id = $x->id;

        $this->accion = "update";
    }

    public function update()
    {
        $this->validate();

        $post = Post::find($this->post_id);

        $post->update([
            'name' => $this->name,
            'body' => $this->body,
        ]);

        $this->reset(['name', 'body', 'accion', 'post_id']);
    }

    public function default()
    {
        $this->reset(['name', 'body', 'accion', 'post_id']);
    }

    public function destroy(Post $x)
    {
        $x->delete();
    }

}
