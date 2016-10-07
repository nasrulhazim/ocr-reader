@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('/ocr') }}" class="btn btn-success">New Record</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ocrs as $ocr)
                                    <tr>
                                        <td>{{ $ocr->file }}</td>
                                        <td>
                                            <a href="{{ url('/ocr/'. $ocr->id ) }}" class="btn btn-primary">Details</a>
                                            <div class="btn btn-danger" onclick="removeOcr({{ $ocr->id }})">Delete</div>
                                        </td>
                                    </tr>
                                @empty
                                   <tr>
                                        <td colspan="2" class="alert alert-info">No OCR Recorded</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function removeOcr(id)
        {
            if(confirm('Are you sure want to delete this record?')) {
                var params = {
                    _method : 'DELETE',
                    _token : window.Laravel.csrfToken
                }
                $.post('/ocr/'+id, params, function(data, textStatus, xhr) {
                    alert(data.data);
                    if(data.status) {
                        window.location = '<?php echo url('/home'); ?>'
                    }
                });
            }
        }
    </script>
@endsection
