@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">OCR Reader</div>
                <div class="panel-body">
					<form class="form-vertical" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/ocr') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Choose File</label>
    						<input type="file" name="ocr" class="form-control">
                        </div>
                        @if ($errors->has('ocr'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ocr') }}</strong>
                            </span>
                        @endif
                        <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection