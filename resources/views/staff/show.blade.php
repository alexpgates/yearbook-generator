@extends('layouts.page')

@section('content')
<div class="" style="margin-top:30px;">
    <div class="row">
        <h2 style="padding-left:15px;margin-bottom:20px;font-weight:bold;">Staff</h2>
    </div>
    <div class="row">
        <?php
            $x = 1;
            $total = 1;
        ?>
        <div class="col text-center"><img src="{{ asset('yearbook/Staff/'.$principal->photo ) }}" style="width:100%;"><br><p>{{$principal->prefix}} {{$principal->last_name}}<br>Principal</p></div>

        @foreach($staff as $s)
        <div class="col text-center"><img src="{{ asset('yearbook/staff/'.$s->photo) }}" style="width:100%;"><br><p>{{$s->prefix}} {{$s->last_name}}<br>{{$s->title}}</p></div>
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
