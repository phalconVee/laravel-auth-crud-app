@extends('layouts.admin-app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Edit Blog Post</h3>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" action="{{ route('blog.update', $blog->id) }}" method="post">
      <input type="hidden" name="_method" value="PATCH">

      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          <label for="title" class="col-md-4 control-label">Title</label>

          <div class="col-md-6">
              <input type="text" name="title" class="form-control" title="Enter Title Here" value="{{ $blog->title }}">

              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
          <label for="title" class="col-md-4 control-label">Description</label>

          <div class="col-md-6">
              <textarea name="description" class="form-control" title="Enter Description Here" rows="8" cols="80">
                {{ $blog->description }}
              </textarea>

              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
          </div>
      </div>

    <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
          <input type="submit" class="btn btn-primary" name="Save">
      </div>
    </div>

    </form>

  </div>

  <div class="col-md-3">
      &nbsp;
  </div>

  <div class="col-md-3">
      &nbsp;
  </div>

</div>


@endsection
