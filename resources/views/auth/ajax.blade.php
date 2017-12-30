@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form action ="{{ URL::to('ajax/insert') }}" method="POST" id="comment-insert">
                    {{ csrf_field() }}
                    <label>package id</label>
                    <input type="text" name="package_id" class="form-control">
                    <label>traveler id</label>
                    <input type="text" class="form-control" name="traveler_id">
                    <label>comment</label>
                    <textarea name="comment" class="form-control"></textarea>
                    <br>
                    <input type="submit" class="btn btn-info">
                </form>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-striped table-condensed" id="comments">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>package ID</th>
                        <th>traveler ID</th>
                        <th>comment</th>
                        <th>created</th>
                    </tr>
                </thead>
                @foreach($comments as $comment)
                    <tr class="comment{{$comment->id}}">
                        <td>
                            {{ $comment->id }}
                        </td>
                        <td>
                            {{ $comment->package_id }}
                        </td>
                        <td>
                            {{ $comment->traveler_id }}
                        </td>
                        <td>
                            {{ $comment->comment }}
                        </td>
                        <td>
                            {{ ($comment->created_at)->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('script')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '#comment-insert', (function(e){
        e.preventDefault();
        var data = $(this).serialize();
        //console.log(data);

        var url = $(this).attr('action');
        var post = $(this).attr('method');

        $.ajax({
            type: post,
            url:url,
            data:data,
            dataTy: 'json',
            success: function(data){
                console.log(data);
                $('#comments').append("<tr class='comment" + data.id + "'><td>" + data.id + 
                    "</td><td>" + data.package_id + "</td><td>" + data.traveler_id + 
                    "</td><td>" + data.comment + "</td><td>" + data.created_at + "</td></tr>");
            }
        });
    }));
</script>
@endsection
