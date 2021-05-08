@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">待辦事項清單</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mission') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="mission" class="col-form-label text-md-left">任務：</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="mission" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">新增</button>
                            </div>
                        </form>

                        @foreach($missions as $mission)
                            <div class="row form-group">
                                <div class="col-sm-1" align="center">
                                    <form method="POST"
                                          action="{{ route('missionDelete', ['missionKey' => $mission->id]) }}">
                                        @csrf
                                        {{ method_field('Delete') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-sm-8">
                                    @if($mission->status !== 'true')
                                        <span>{{ $mission->mission }}</span>
                                    @else
                                        <s>{{ $mission->mission }}</s>
                                    @endif
                                </div>
                                <div class="col-sm-1" align="center">
                                    <form method="POST"
                                          action="{{ route('missionComplete', ['missionKey' => $mission->id]) }}">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        @if($mission->status !== 'true')
                                            <button type="submit" class="btn btn-primary">
                                                <i class="far fa-thumbs-up"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-thumbs-up"></i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
