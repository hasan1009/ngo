     @foreach ($getChatUser as $user)
         <li class="clearfix getChatWindows @if (!empty($receiver_id)) @if ($receiver_id == $user['user_id']) active @endif @endif"
             id="{{ $user['user_id'] }}">

             <img src="{{ $user['profile_pic'] }}" style="height: 45px" alt="avatar">
             <div class="about">
                 <div class="name">{{ $user['name'] }}
                     @if (!empty($user['messageCount']))
                         <span id="ClearMessage{{ $user['user_id'] }}"
                             style="background: green; color:#fff; border-radius: 5px; padding: 1px 7px;">{{ $user['messageCount'] }}</span>
                     @endif
                 </div>
                 <div class="status">
                     @if (!empty($user['is_online']))
                         <i class="fa fa-circle online"></i>
                     @else
                         <i class="fa fa-circle offline"></i>
                     @endif

                     {{ Carbon\Carbon::parse($user['created_date'])->diffForHumans() }}
                 </div>
             </div>

         </li>
     @endforeach