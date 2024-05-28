
<div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
      @foreach($news as $item)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="{{$item->link}}" class="post-thumb">
                <img src="/newsimage/{{$item->image}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{$item->link}}"><u>{{$item->title}}</u></a></h5>
              <div class="site-info">
                <div class="avatar mr-2" height="30px">
                  <span>{{$item->description}}</span>
                </div>
                <span class="mai-time"></span>Recently......
              </div>
            </div>
          </div>
         
        </div>
        @endforeach

      </div>
    </div>
  </div> <!-- .page-section -->