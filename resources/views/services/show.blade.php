@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center ">
            <h3 class="section-subheading text-center"> Service {{ $service->name }} </h3>
        </div>

        <div class="row">
            <div class="col">
                Status
            </div>
            <div class="col">
                {{ $service->status }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Type
            </div>
            <div class="col">
                {{ $service->type }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Creation Date
            </div>
            <div class="col">
                {{ $service->created }}
            </div>
        </div>
        <div class="col-lg-12">
            <h4> Port </h4>
        </div>
        <?php
        function parseKey($value) {
            $arr = explode('_', $value);
            $str = '';
            foreach ($arr as $val) {
                $str .= ucfirst($val) . ' ';
            }
            return $str;
        }
        function parseArray($array)
        {
            $array = (Array) $array;
            if (is_array($array)) {
                foreach ($array as $key => $value) {
                    if (is_array($value)) {
                        foreach ($value as $key1 => $value1) {
                            $value1 = $value1 ?? ' - ';
                            echo parseKey($key1) . ': ' . $value1 . '<br/>';
                        }
                    } else {
                        $value = $value ?? ' - ';
                        if ($key) {
                            echo parseKey($key) . ': ' . $value . '<br/>';
                        } else {
                            echo $value . '<br/>';
                        }
                    }
                }
            } else {
                $array = $array ?? ' - ';
                echo $array;
            }
        }
        ?>
        @foreach (json_decode(json_encode($service->port), true) as $key => $value)
        <div class="row">
            <div class="col">
                <?php echo parseKey($key);?>
            </div>
            <div class="col">
                <?php
                parseArray($value);
                ?>
            </div>
        </div>

        @endforeach
        <div class="col-lg-12 mt-5">
            <a class="btn btn-secondary text-center" href="{{ route('services.index') }}">Back</a>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection