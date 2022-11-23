<!-- load file Layout.blade.php vào đây -->
@extends("frontend.Layout")
@section("fill-du-lieu-vao-layout")
<?php
    $categories = DB::table("categories")->orderBy("id","desc")->get();
?>
@foreach($categories as $rows_categories)
<!-- chỉ hiển thị các danh mục có tin ở bên trong -->
<?php
    $check_category = DB::table("news")->where("category_id","=",$rows_categories->id)->Count();
?>
@if($check_category > 0)
 <!-- list category tin tuc -->
 <div class="row-fluid">
    <div class="marked-title">
        <h3><a href="{{ url('news/category/'.$rows_categories->id) }}" style="color:white">{{ $rows_categories->name }}</a></h3>
    </div>
</div>                    
<div class="row-fluid">
    <div class="span2">
        <?php
            //lấy tin đầu tiên
        //->offset(0) tu ban ghi thu 0
        //->take(1) lay 1 ban ghi
        //->get() lay tat ca ket qua tra ve
        $first_news = DB::table("news")->where("category_id","=",$rows_categories->id)->orderBy("id","desc")->first();
        ?>
        <!-- first news -->
        <article>
            <div class="post-thumb">
                <a href="{{ url('news/detail/'.$first_news->id) }}"><img src="{{ asset('upload/news/'.$first_news->photo) }}" alt=""></a>
            </div>
            <div class="cat-post-desc">
                <h3><a href="{{ url('news/detail/'.$first_news->id) }}">{{ $first_news->name }}</a></h3>
                <p>{!! $first_news->description !!}</p>
            </div>
        </article>
        <!-- end first news -->
    </div>
    <div class="span2">

    	<?php 
    		//lay cac ban tin tiep theo sau ban tin sau tien da hien thi o tren
    	$other_news = DB::table("news")->where("category_id","=",$rows_categories->id)->orderBy("id","desc")->offset(1)->take(4)->get();
        
    	 ?>
    	 @foreach($other_news as $rows)
        <!-- list news -->
        <article class="twoboxes">
            <div class="right-desc">
                <h3><a href="{{ url('news/detail/'.$rows->id)}}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a><a href="{{ url('news/detail/'.$rows->id)}}">{{ $rows->name}}</a></h3>  
                <div class="clear"></div>    
            </div>
            <div class="clear"></div>
        </article>
        <!-- end list news -->
        @endforeach
        <!-- list news -->
        <article class="twoboxes">
            <div class="right-desc">
                <h3><a href="#"><img src="img/footer-img-1.jpg" alt=""></a><a href="#">(Dân trí) - Mặc dù Ngân hàng Nhà nước chưa cho phép nhưng nhiều doanh nghiệp vẫn dùng "tiền ảo" bitcoin để thanh toán các dịch vụ của mình.</a></h3>  
                <div class="clear"></div>    
            </div>
            <div class="clear"></div>
        </article>
        <!-- end list news -->
        <!-- list news -->
        <article class="twoboxes">
            <div class="right-desc">
                <h3><a href="#"><img src="img/footer-img-1.jpg" alt=""></a><a href="#">(Dân trí) - Mặc dù Ngân hàng Nhà nước chưa cho phép nhưng nhiều doanh nghiệp vẫn dùng "tiền ảo" bitcoin để thanh toán các dịch vụ của mình.</a></h3>
                <div class="clear"></div>    
            </div>
            <div class="clear"></div>
        </article>
        <!-- end list news --> 
    </div>
</div>
<div class="clear"></div>
<!-- end list category tin tuc -->
@endif
@endforeach
@endsection
