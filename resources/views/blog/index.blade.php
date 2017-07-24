@extends('layouts.admin-app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Blog Posts</h1>
  </div>
</div>

<div class="row">

  @include('notifications.status_message')
  
  <table class="table table-striped">
    <tr>
      <th>No.</th>
      <th>Title</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>

    <a href="{{ route('blog.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i>Create New</a><br><br>

    <?php $no = 1; ?>

    @foreach($blogs as $blog)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$blog->title}}</td>
      <td>{{$blog->description}}</td>
      <td style="width:125px;">
        <form class="" action="{{ route('blog.destroy', $blog->id) }}" method="post">
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
          <input type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this data')" name="name" value="delete">

        </form>
      </td>
    </tr>

    @endforeach
  </table>
</div>

@endsection
