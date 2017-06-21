@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新分類
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('type.store')}}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">分類名稱</label>
                                <div class="col-md-10">
                                    <input type="text" name="type" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-primary">儲存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection