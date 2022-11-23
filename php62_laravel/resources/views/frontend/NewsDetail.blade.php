@extends("frontend.Layout")
@section("fill-du-lieu-vao-layout")

<?php 
	$record = DB::table("news")->where("id","=",$id)->first();
 ?>
  <article>
<div class="title-box">
    <h1>The Hangover 3: The Trilogy Finale Teaser Trailer Leaked Online</h1>
</div>
<div class="post-thumb">
	<img src="{{ asset('upload/news/'.$record->photo)}}" alt="">
</div>
<div class="post-content" style="margin-top: 10px;">
    {!! $record->description !!}
     {!! $record->content !!}
    <div class="marked-title first">
        <h3>Tin tức khác</h3>
    </div>
    <div class="row-fluid">
    	<?php 
    		// lay 4 ban tin ngay sau tin hien thi ben tren
    	$other_news = DB::table("news")->where("id","<",$record->id)->orderBy("id","desc")->offset(0)->take(4)->get();// phai co get thi moi lay duoc du lieu ra 
    	 ?>
    	 @foreach($other_news as $rows)
       <!-- other news -->
        <div class="span4">
            <article class="small single">
                <div class="post-thumb">
                    <a href="{{ url('news/detail/'.$rows->id)}}"><img src="{{ asset('upload/news/'.$rows->photo)}}" alt=""></a>
                </div>
                <div class="cat-post-desc">
                    <h3><a href="blog-single.html">{{ $record->name }}</a></h3>
                </div>
            </article>    
        </div>
        <!-- end other news -->
       @endforeach
    </div>
    
    
</div>
</article>
@endsection