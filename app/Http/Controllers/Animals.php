<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Animal;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\DB;

class Animals extends Controller
{

    public function createPost(AnimalRequest $request, Owner $owner)
    {
   
        $animal = new Animal($request->all());
        $owner->animals()->save($animal);

        return redirect("/owners/{$owner->id}");
    }

    public function edit(Owner $owner, Animal $animal)
    {
        return view("animals/edit", [
            "owner" => $owner,
            "animal" => $animal
        ]);
    }

    public function editPost(AnimalRequest $request, Animal $animal, Owner $owner)
    {
        $owner = $animal->owner;
        $data = $request->all();
        $animal->update($data);
        return redirect("/owners/{$owner->id}");        
    }

    public function destroy(Animal $animal)
    {
        $owner = $animal->owner;
        $animal->delete();
        
        return redirect("/owners/{$owner->id}");
    }

}




