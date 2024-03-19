<div class="grow flex flex-col gap-y-2 overflow-y-scroll max-h-[75%]">
    @foreach($comments as $comment)
        <x-show-profile-in-post :linkImg="asset($comment->owner->image)" :username="$comment->owner->username" :paragraph="$comment->body" :createdAt="$comment->created_at->shortAbsoluteDiffForHumans()" />
    @endforeach
</div>
