
@extends('layouts.master')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')

    <br />
    <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active start">
        <div class="jumbotron">
            {{ Form::open(array('class' => 'form-inline', 'url' => 'save-email', 'id' => 'vote-form')) }}
                <h1>Beyond D Staff Awards</h1>
                <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success">Start Voting </button>
                </div>
                <div class="result"></div>
            {{ Form::close() }}
        </div>
      </div>
      <div class="item award-1">
        <div class="jumbotron">
            {{ Form::open(array('class' => 'form-inline award-form', 'url' => 'save-awardone', 'id' => 'awardone-form')) }}
                <div class="result alert alert-danger"></div>
                <h1>Tourettes Award</h1>
                <p class="lead">Biggest potty mouth</p>
                <div class="form-group">
                    <label class="sr-only" for="name1">Enter Name</label>
                    <input type="name" class="form-control input-lg typeahead name" id="name1" placeholder="Type Name" required>
                    <input type="hidden" id="user_id_1" class="user_id" value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success">Submit Vote</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="item award-2">
            <div class="jumbotron">
                {{ Form::open(array('class' => 'form-inline award-form', 'url' => 'save-awardtwo', 'id' => 'awardtwo-form')) }}
                    <div class="result alert alert-danger"></div>
                    <h1>Garbage Disposal Award</h1>
                    <p class="lead">Most likely to back for seconds at lunch</p>
                    <div class="form-group">
                        <label class="sr-only" for="name1">Enter Name</label>
                        <input type="name" class="form-control input-lg typeahead name" id="name2" placeholder="Type Name" required>
                        <input type="hidden" id="user_id_2" class="user_id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success">Submit Vote</button>
                    </div>
                {{ Form::close() }}
            </div>
      </div>

    <!-- Controls -->
     <!-- <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a> -->
    </div>
    <div class="nominee">
        <h2>Nominee list:</h2>
        <?php $count = 0; ?>
        <div class="list-group col-md-6">
        @foreach($names as $key => $name)
            @if ($count == 5)
                </div><div class="list-group col-md-6">
                <?php $count = 0; ?>
            @endif
            <a href="#" class="list-group-item" data-value="{{ $name->name }}">{{ $name->name }}</a>
            <?php $count++; ?>
        @endforeach
        </div>
    </div>

      <!-- <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol> -->

@stop