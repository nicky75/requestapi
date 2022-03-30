@if (isset($errors) && count($errors) > 0 && is_array($errors))
    <div class="alert alert-danger">
        @foreach ($errors as $error)
            <li>{{ $error }}</strong></li>
        @endforeach
    </div>
@endif