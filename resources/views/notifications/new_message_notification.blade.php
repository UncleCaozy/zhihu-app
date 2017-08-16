<li class="notifications {{$notification->unRead() ? 'unread' :''}}">
    <a href="{{$notification->unRead() ? '/notifications/'.$notification->id.'?redirect_url=/inbox/'.$notification->data['dialog'] : '/inbox/'.$notification->data['dialog']}}">
        {{$notification->data['name']}}给你发送了一条私信</a>
</li>