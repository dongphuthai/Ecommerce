<div class="row">
    <div class="our-slider col-md-8 mt-2" >
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach($sliders as $slider)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active':''  }}"></li>
              @endforeach
            </ol>
            <div class="carousel-inner pointer">           
                @foreach($sliders as $slider)
                  <div class="carousel-item {{ $loop->index == 0 ? 'active':''  }}">
                    <a href="{{ $slider->button_link }}">
                    <img class="d-block w-100" src="public/images/sliders/{{ $slider->image }}" alt="{{ $slider->title }}" style="height:auto; width: 100%" onclick="Redirect();">
                    </a>                
                  </div>
                @endforeach             
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    <div class="col-md-4 mt-2" >
      <div class="row pointer">
        <div class=" col-6 col-sm-6 col-md-12 pb-1">
          <img  src="public/images/right-sidebar/pr1.png" style="height:auto; width: 100%;padding-bottom: 0.175em;">
        </div>
        <div class="col-6 col-sm-6 col-md-12">
          <img  src="public/images/right-sidebar/pr2.png" style="height:auto; width: 100%">
        </div>
      </div>
    </div>
  </div>