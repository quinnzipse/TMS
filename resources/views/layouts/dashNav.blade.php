<div class="card">
    <div class="card-header">Navigation</div>
    <div class="list-group">
        @if(Auth::user()->beta)
            <a class="list-group-item list-group-item-action" href="{{route('home')}}">Home</a>
        @endif
        <a class="list-group-item list-group-item-action" href="{{route('tasks')}}">Tasks</a>
        @php
            if(Auth::user()->beta){
                echo '<a class="list-group-item list-group-item-action" href="{{route(\'settings\')}}">Settings</a>';
                echo '<a class="list-group-item list-group-item-action" href="#">Account</a>';
            }
        @endphp
    </div>
</div>
