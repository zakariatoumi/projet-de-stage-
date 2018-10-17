@extends('Master.layout')
@section('content')
<div class="container mt-5" id="auto">
<div class="row mt-5">
@include('conversations.users',['users'=>$users , 'unread' => $unread])

<div class="col-md-9 mt-5">

    <!-- Form chat -->
        
    <div class="card mx-xl-5">
        <div class="card-body">

            <!--Header-->
            <div class="form-header primary-color">
                <h3 style="color:honeydew"><i class="fa fa-wechat" aria-hidden="true"></i> <span class="text-success">{{ $user->prenom }}</span></h3>
            </div>

            @if($messages->hasMorePages())
            <div class="text-center">
                <a href="{{ $messages->nextPageUrl() }}" class="btn btn-light">
                        <span style="color: #4285F4"> Voir les messages precedant</span>
                </a>
            </div>
            @endif
    
            @foreach(array_reverse($messages->items()) as $message)
            <div class="row">
                <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offest-md-2 text-right' : '' }}">
                    <p>
                        <strong>{{ $message->from->id !== $user->id ? 'Moi' : $message->from->prenom }}</strong><br>
                        {!! nl2br(e($message->content)) !!}
                    </p>
                </div>
            </div>
            <hr>
            @endforeach
    
            @if($messages->previousPageUrl())
            <div class="text-center">
                <a href="{{ $messages->previousPageUrl() }}" class="btn btn-light">
                    <span style="color: #4285F4">Voir les messages suivant</span>
                </a>
            </div>
            @endif
    
            <form action="" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="content" placeholder="Ecrivez votre message..." class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">
                           {{ implode(',', $errors->get('content')) }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>

        <!--Footer-->
        <div class="modal-footer">
            
        </div>

    </div>
                   
<!-- Form chat -->

</div>
</div>
</div>
@include('Pages.footer');
@endsection

