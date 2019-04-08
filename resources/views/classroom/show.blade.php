@extends('layouts.page')

@section('content')
<div class="" style="margin-top:30px;">
    <div class="row">
        <h2 style="padding-left:15px;margin-bottom:20px;font-weight:bold;">{{$teacher->prefix}} {{$teacher->last_name}} <small>{{$teacher->title}}</small></h2>
    </div>
    <div class="row">
        <?php
            $x = 1;
            $total = 1;
        ?>
        <div class="col text-center"><img src="{{ asset('yearbook/staff/'.$teacher->photo ) }}" style="width:100%;"><br><p>{{$teacher->prefix}} {{$teacher->last_name}}</p></div>
        @foreach($support as $sup)
            <div class="col text-center"><img src="{{ asset('yearbook/staff/'.$sup->photo ) }}" style="width:100%;"><br><p>{{$sup->prefix}} {{$sup->last_name}}</p></div>
        <?php
            $x++;
            $total++;
            if($x == 6){
                echo '<div class="w-100"></div>';
                $x = 0;
            }
        ?>
        @endforeach

        @foreach($students as $student)
        <div class="col text-center"><img src="{{ asset('yearbook/'.$student->teacher.'/'.$student->photo) }}" style="width:100%;"><br><p>{{$student->first_name}} {{$student->last_name}}</p></div>
        <?php
            $x++;
            $total++;
            if($x == 6){
                echo '<div class="w-100"></div>';
                $x = 0;
            }
        ?>
        @endforeach
        <?php
            if($total < 40){
                while ($total <= 40) {
                    echo '<div class="col text-center"></div>';
                    if($x == 5){
                        echo '<div class="w-100"></div>';
                        $x = 0;
                    }
                    $x++;
                    $total++;
                }
            }
         ?>
    </div>
</div>
@endsection
