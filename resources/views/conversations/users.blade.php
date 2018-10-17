<div class="col-md-3">
    <div class="list-group">
        @foreach($users as $user)
        
            <a class="list-group-item d-flex justify-content-between align-items-center" href="{{ route('conversations.show', $user->id) }}"> 
                    <img src="/uploads/avatars/{{ $user->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid" width="40" height="40">
                    

                    <!-- online offline -->

                    @if($user->isOnline())
                        {{--<li class="text-success">
                            online <span style="border: 2px solid black"></span>
                        </li>--}}
                        <svg height="20" width="900">
                            <circle cx="10" cy="10" r="5" stroke="green" stroke-width="3" fill="green" />
                            Sorry, your browser does not support inline SVG.  
                          </svg> 
                        @else
                        {{--<li class="text-muted">
                            offline <div style="border: 2px solid black;border-radius: 50%"></div>
                        </li>--}}
                        <svg height="20" width="900">
                            <circle cx="10" cy="10" r="5" stroke="red" stroke-width="3" fill="red" />
                            Sorry, your browser does not support inline SVG.  
                          </svg> 
                    @endif

                {{ $user->prenom }}
                
            @if(isset($unread[$user->id]))
            <span class="badge badge-pill badge-primary">
            {{ $unread[$user->id] }}
            </span>
            @endif
            
         
        </a>

        @endforeach
    </div>
</div>