@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9 pt-3"> 
           
                    <div ><h3>{!! $post->title !!}</h3></div>
                    <div class="text-dark"> {!! nl2br(e($post->description))!!}</div>
                    
              <div class="row">
                <div class="col-3">
                    @can('delete', $post)
                        <a href="/delete/{{$post->id}}">delete</a>  
                    @endcan     
                </div>
                <div class="col-3">
                    @can('delete', $post)
                        <a href="/p/{{$post->id}}/edit">edit</a>     
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-3 pt-3">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage() }} " class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="p-3 pt-4"><h5>Comments</h5></div>
        
            @foreach($post->comments as $comment)
                <div class=" row p-4">
                         <div class="col-1 ">   
                             <a href="/profile/{{ $comment->user_id }} "> <img src="{{$comment->user->profile->profileImage() }} " class="rounded-circle w-100" style="max-width: 28px;">
                                       </a>
                        </div>
                        <div class="col-11 ">
                                <div class="font-weight-bold">
                                    <a href="/profile/{{ $comment->user->id }}">
                                        <span class="text-dark">{{ $comment->user->username }}</span>
                                    </a>     
                                </div>
                                <div class="text-dark">{!! nl2br(e($comment->description))!!}</div>
                        </div>
                        

                </div>
             @endforeach    
                
        
    </div>
    <form action="/sent/{{$post->id}}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-8 offset-2">

                            <div class="form-group row">
                                    <label for="desciption" class="col-md-4 col-form-label">Add comment</label>
                                    
                                    <textarea id="description"
                                    rows="2" cols="80"
                                    class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description"
                                    autocomplete="description" autofocus
                                    id="description" 
                                    ></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="row pt-4">
                                <button class="btn btn-primary">Sent</button>
                            </div>
                        
                        </div>
                    </div>
    </form>
</div>
@endsection
