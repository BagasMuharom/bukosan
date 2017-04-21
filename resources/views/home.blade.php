@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dasbor</div>

                <div class="panel-body">
                    Anda Telah masuk,
                    <?php
                    if(\Auth::check()){
                        echo  \Auth::user()->username;
                    }
                     ?>
                     !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
