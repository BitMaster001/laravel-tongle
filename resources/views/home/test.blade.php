@extends('layouts.app')
@section('title')
Test
@endsection

@section('content')
<p>video 1</p>
<br>
<video controls="true" preload="metadata" playsinline="" disablepictureinpicture="" controlslist="nodownload" name="media" width="100%">
    <source src="/storage/users/User1/posts/8c69a54f507552720419f38977dc65514c8e362812mxetavitlptbgfmuekrcpc/video1.mp4#t=0.5" type="video/mp4">
</video>

<p>video 2</p>
<br>
<video controls="true" preload="metadata" playsinline="" disablepictureinpicture="" controlslist="nodownload" name="media" width="100%" src="http://alpha.ljltongle.com/storage/users/User1/posts/8c69a54f507552720419f38977dc65514c8e362812mxetavitlptbgfmuekrcpc/video1.mp4#t=0.5">
    Your browser does not support the video tag.
</video>

<p>video 3</p>
<br>
<video controls="true" preload="metadata" playsinline="" disablepictureinpicture="" controlslist="nodownload" name="media" width="100%" src="http://alpha.ljltongle.com/storage/users/User1/posts/8c69a54f507552720419f38977dc65514c8e362812mxetavitlptbgfmuekrcpc/video1.mp4#t=0.5">
    Your browser does not support the video tag.
</video>

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection


