@extends("frontend.Layout")
@section("fill-du-lieu-vao-layout")
   <!-- ========================================= -->	
   <?php 
   	// lay tieu de cua danh muc
   //truyen ra o view nen ta co the lay duoc $category_id
   $category = DB::table("categories")->where("id","=",$category_id)->first();
    ?>
<div class="marked-title">
    <h3>{{ $category->name != "" ? $category->name :"" }}</h3>
</div>
<div class="row">
	<?php 
		$news = DB::table("news")->where("category_id","=",$category_id)->paginate(10);
	 ?>
	 @foreach($news as $rows)
    <!-- list news -->
    <article>
		<div class="cat-post-desc">
			<h3><a href="{{ url('news/detail/'.$rows->id)}} ">{{ $rows->name}}</a></h3>
			<p><a href="{{ url('news/detail/'.$rows->id) }}"><img class="img_category" src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a> {{ $rows->description }}</p>
		</div>
		<div class="clear"></div>
		<div class="line_category"></div>
	</article>                       
    <!-- end list news -->
     @endforeach                                 
                            
</div>
<div class="clear"></div>
<div class="post-navi">
   {{ $news->render() }}
</div>
                <!-- ========================================= -->    
@endsection