    <form class="form card" method="post">
      @csrf     {{--  Cross-Site Request Forgery  --}}
        <h2 class="card-header">Edit Pet</h2>

        <fieldset class="card-body">
            <div class="form-group">
                <label for="name">Pet Name</label>
                <input 
                    class="form-control @error('name') is-invalid @enderror"
                    id="name" 
                    name="name"                    
                    value="{{ old('name') ?? ($animal->name ?? '') }}"/>

                @error('name')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input 
                    class="form-control @error('type') is-invalid @enderror"
                    id="type"
                    name="type"                    
                    value="{{ old('type') ?? ($animal->type ?? '') }}"/>

                @error('type')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                  
            </div>

            <div class="form-group">
                <label for="dob">D.O.B</label>
                <input 
                    type="date"                    
                    class="form-control @error('dob') is-invalid @enderror"
                    id="dob"
                    name="dob"                    
                    value="{{ old('dob') ?? ($animal->dob ?? '') }}"/>

                @error('dob')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                  
            </div>

            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input 
                    type="number"
                    min="0"
                    step="0.01"
                    class="form-control @error('weight') is-invalid @enderror" 
                    id="weight" 
                    name="weight"                     
                    value="{{ old('weight') ?? ($animal->weight ?? '') }}"/>

                @error('weight')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                  
            </div>            

            <div class="form-group">
                <label for="height">Height (m)</label>
                <input
                    type="number"
                    min="0"
                    step="0.01"
                    class="form-control @error('height') is-invalid @enderror"
                    id="height"
                    name="height"
                    value="{{ old('height') ?? ($animal->height ?? '') }}"/>

                @error('height')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                  
            </div>   

            <div class="form-group">
                <label for="biteyness">Biteyness</label>
                <select class="form-control @error('biteyness') is-invalid @enderror"
                id="biteyness"
                name="biteyness"/>

                @error('biteyness')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror  
                <option value="0" {{ old('biteyness', $animal->biteyness) == 0 ? 'selected' : '' }}>0</option>
                <option value="1" {{ old('biteyness', $animal->biteyness) == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('biteyness', $animal->biteyness) == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('biteyness', $animal->biteyness) == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('biteyness', $animal->biteyness) == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('biteyness', $animal->biteyness) == 5 ? 'selected' : '' }}>5</option>
                </select>
            </div>        

            <div class="form-group">
                <label for="treatments">Treatments <small>(separate each treatment with a comma)</small></label>
                <input 
                    class="form-control @error('treatments') is-invalid @enderror"
                    id="treatments" 
                    name="treatments"                    
                    value="{{ old('treatments') ?? (implode(", ", $animal->treatments()->pluck("name")->all()) ?? '') }}"/>

                @error('name')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror                
            </div>            

        </fieldset>

        <div class="card-footer text-right">
            <button class="btn btn-success">Save</button>
        </div>
    </form>   