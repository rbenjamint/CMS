<div class="hbox hbox-auto-xs hbox-auto-sm">
  <div class="col">
    <div style="background:url(img/c4.jpg) center center; background-size:cover">
      <div class="wrapper-lg bg-white-opacity">
        <div class="row m-t">
          <div class="col-sm-7">
            <div class="clear m-b">
              <div class="m-b m-t-sm">
                <span class="h3 text-black">{{$page->title}}</span>
              </div>
              <p class="m-b">
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-twitter"></i></a>
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-facebook"></i></a>
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-google-plus"></i></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layout.blocks.nav')
	<div class="wrapper-md">
		<div class="col-sm-9">
			<div class="blog-post">                   
	        <div class="panel">
	          <div class="wrapper">
	            <div>
						<p>
	      				{{ $page->text }}
	      			</p>
	            </div>
	            <div class="line line-lg b-b b-light"></div>
	            <div class="text-muted">
	              <i class="fa fa-user text-muted"></i> by <a href class="m-r-sm">Admin</a>
	              <i class="fa fa-clock-o text-muted"></i> Sep 21, 2014
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-sm-3">
	      <h5 class="font-bold">Categories</h5>
	      <ul class="list-group">
	        <li class="list-group-item">
	          <a href>
	            <span class="badge pull-right">15</span>
	            Photograph
	          </a>
	        </li>
	        <li class="list-group-item">
	          <a href>
	            <span class="badge pull-right">30</span>
	            Life style
	          </a>
	        </li>
	        <li class="list-group-item">
	          <a href>
	            <span class="badge pull-right">9</span>
	            Food
	          </a>
	        </li>
	        <li class="list-group-item">
	          <a href>
	            <span class="badge pull-right">4</span>
	            Travel world
	          </a>
	        </li>
	      </ul>
		</div>
	</div>
</div>