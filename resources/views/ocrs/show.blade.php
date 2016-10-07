@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">OCR Record Details</div>
                <div class="panel-body">
                    <img src="{{ Storage::disk('local')->url($ocr->file) }}" class="img-responsive center-block img-thumbnail" alt="Image">
                    <hr>
                    <div class="well well-small">
                        <pre>
                            {{ $ocr->data }}
                        </pre>
                    </div>
                    <a href="{{ url('/home') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection