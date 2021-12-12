//Slug automático

console.log('hola');

function editUp(){
    console.log('1');
    console.log(document.getElementById("name").value);
    //document.getElementById("name").addEventListener('keyup', slugChange);
}

function slugChange(){
    
    var name = document.getElementById("name").value;
    console.log(name);
    //document.getElementById("slug").value = slug(name);
    Livewire.emit('getSlugJS', slug(name));
}

function slug (str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}
