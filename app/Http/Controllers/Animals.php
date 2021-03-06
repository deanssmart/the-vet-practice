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

   
        $animal = new Animal($request->only(["name", "type", "dob", "weight", "height", "biteyness"]));

        $owner->animals()->save($animal);

        //takes the data input from the animal create form as a string, converts it to an array delimitted by commas then passes the array to the setTreatments method
        $animal->setTreatments(explode(",", $request->get("treatments")));
        
        return redirect("/owners/{$owner->id}");
    }

    public function edit(Owner $owner, Animal $animal)
    {
        return view("animals/edit", [
            "owner" => $owner,
            "animal" => $animal
        ]);
    }

    public function editPost(AnimalRequest $request, Animal $animal)
    {
        $owner = $animal->owner;
        $data = $request->only(["name", "type", "dob", "weight", "height", "biteyness"]);
        $animal->update($data);
        $animal->setTreatments(explode(",", $request->get("treatments")));
        return redirect("/owners/{$owner->id}");        
    }

    public function destroy(Animal $animal)
    {
        $owner = $animal->owner;
        $animal->delete();
        
        return redirect("/owners/{$owner->id}");
    }

}




