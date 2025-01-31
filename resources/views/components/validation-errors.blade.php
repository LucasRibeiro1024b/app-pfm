
@if ($errors->any() || Session::get('erro'))
    <div class="font-medium text-red-600 mb-4">{{ __('Whoops! Algo deu errado.') }}
        @if($message = Session::get('erro'))
            <li>{{ $message }}</li> 
        @endif
        
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>
@endif