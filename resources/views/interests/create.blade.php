@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>


                    <h1>Create Interest</h1>
                    <form method="POST" action="{{action('InterestController@store')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="sr-only" for="title">Name</label>
                            <input type="text" name = "interest_name" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="title">Michael</label>
                            <input type="checkbox" name = "users_id[]" value="1" class="form-control" >Michael
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="title">Jude</label>
                            <input type="checkbox" name = "users_id[]" class="form-control" value="2" >Jude
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="title">Godsman</label>
                            <input type="checkbox" name = "users_id[]" value="3" class="form-control" >Godsman
                        </div>




                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

