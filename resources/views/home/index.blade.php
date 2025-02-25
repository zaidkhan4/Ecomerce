<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')


    @include('home.slider')


</div>


  @include('home.product')


{{-- all comment section start --}}


    <div style="text-align: center; padding-bottom: 30px;">

        <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>

        <form action="{{ route('add_comment') }}" method="post">

            @csrf

            <textarea style="height: 150px; width: 600px;" name="comment" id="" placeholder="Comment something here"
            ></textarea>

            <br>

            <input type="submit" class="btn btn-primary" value="Comment">

        </form>


    </div>



    <div style="padding-left: 20%;">

        <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>

        <div>

            @foreach ($comments as $comment)

                <b>{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a><br>


                @foreach ($replies as $reply)

                @if ($reply->comment_id == $comment->id)

                    <div style="padding-left: 3%; padding-bottom: 10px;">

                        <b>{{ $reply->name }}</b>
                        <p>{{ $reply->reply }}</p>
                        <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a><br>


                    </div>

                @endif
                @endforeach


            @endforeach






        </div>




        <div style="display: none;" class="replyDiv">

            <form action="{{ route('add_reply') }}" method="post">
                @csrf

                <input type="text" id="commentId" name="commentId" hidden="" >
                <textarea style="height: 100px; width: 500px;" name="reply" id=""
                placeholder="write something here"></textarea>

                <br>

                <input type="submit" class="btn btn-primary" value="Reply">

                <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>

            </form>

        </div>

    </div>











{{-- all comment section end --}}


{{-- script code start --}}


<script type="text/javascript">


    function reply(caller)
    {
        document.getElementById('commentId').value = $(caller).attr('data-Commentid');

        $('.replyDiv').insertAfter($(caller));

        $('.replyDiv').show();


    }




    function reply_close(caller)
    {


        $('.replyDiv').hide();


    }




</script>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>







{{-- script code end --}}


  @include('home.footer')


</body>

</html>
