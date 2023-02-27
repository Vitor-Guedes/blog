@if ( session()->has('success') )
    
    <div class="row mb-3">
            
        <div class="col-sm-12">
                
            <div class="alert text-white" style="background-color: #47afc4;     border-radius:5px;">
                
                {!! session('success') !!}
            
            </div>
        
        </div>
    
    </div>

@endif

@if ( session()->has('error') )
    
    <div class="row">
            
        <div class="col-sm-12">
                
            <div class="alert alert-danger">

                {!! session('error') !!}
            
            </div>
        
        </div>
    
    </div>

@endif

@if (isset($errors) && count($errors) > 0)
    
    <div class="row">
            
        <div class="col-sm-12">
                
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>
                    
                    @endforeach
                </ul>
            
            </div>
        
        </div>
    
    </div>

@endif