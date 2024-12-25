<div class="row">
    <div class="col-lg-12">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
            <img src="{{ url($getReceiver->getProfileDirect()) }}" alt="avatar">
        </a>
        <div class="chat-about">
            <h6 class="m-b-0">{{ $getReceiver->name }}</h6>
            <small>
                @if (!empty($getReceiver->OnlineUser()))
                    <span style="color:green">Online</span>
                @else
                    Last seen: {{ Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans() }}
                @endif


            </small>
        </div>
    </div>

</div>
