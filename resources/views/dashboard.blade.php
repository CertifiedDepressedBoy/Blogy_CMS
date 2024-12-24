<x-app-layout>
@if(Auth::user()->role != 'admin')
<div>
    <!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">

                    @foreach($headCulture as $item)
                    <a href="{{url('posts/'.$item->id)}}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('{{ asset('assets/images/' . $item->image) }}');"></div>

						<div class="text">
							<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
							<h2>{{$item->title}}</h2>
						</div>
					</a>
                    @endforeach

				</div>
				<div class="col-md-4">
					@foreach($headPolitic as $item)
                    <a href="{{url('posts/'.$item->id)}}" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url('{{ asset('assets/images/' . $item->image) }}');"></div>

						<div class="text">
							<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
							<h2>{{$item->title}}</h2>
						</div>
					</a>
                    @endforeach
				</div>
				<div class="col-md-4">
					@foreach($headBusiness as $item)
                    <a href="{{url('posts/'.$item->id)}}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('{{ asset('assets/images/' . $item->image) }}');"></div>

						<div class="text">
							<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
							<h2>{{$item->title}}</h2>
						</div>
					</a>
                    @endforeach

				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{url('/category/business')}}" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
						@foreach($business as $item)
                        <div class="col-md-6">
							<div class="blog-entry">
									<img src="{{url('assets/images/'.$item->image)}}" alt="Image" class="img-fluid rounded">
								<span class="date mt-1">{{ $item->created_at->format('M. jS, Y') }}</span>
								<h2><a href="{{url('posts/'.$item->id)}}">{{$item->title}}</a></h2>
								<p>{{Str::limit($item->description,100,'...')}}</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary mt-1">Read More</a></p>
							</div>
						</div>
                        @endforeach

					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						@foreach($businessNoImg as $item)
                        <li>
							<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
							<h3>{{$item->title}}</h3>
							<p>{{Str::limit($item->description,100,'...')}}</p>
							<p><a href="{{url('/posts/'.$item->id)}}" class="read-more">Continue Reading</a></p>
						</li>
                        @endforeach

					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
				@foreach($businessall as $item)
                <div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
						<h2>{{$item->title}}</h2>
						<p>{{Str::limit($item->description,100,'...')}}</p>
						<p><a href="{{url('/posts/'.$item->id)}}" class="read-more">Continue Reading</a></p>
					</div>
				</div>
                @endforeach

			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{url('/category/culture')}}" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						@foreach($culture as $item)
                        <div class="col-md-6">
							<div class="blog-entry">
								<a href="{{url('posts/'.$item->id)}}" class="img-link">
									<img src="{{url('assets/images/'.$item->image)}}" alt="Image" class="img-fluid">
								</a>
								<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
								<h2>{{$item->title}}</h2>
								<p>{{Str::limit($item->description,100,'...')}}</p>
								<p><a href="{{url('/posts/'.$item->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>

                        @endforeach
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						@foreach($cultureNoImg as $item)
                        <li>
							<span class="date">{{ $item->created_at->format('M. jS, Y') }}</span>
							<h3>{{$item->title}}</h3>
							<p>{{Str::limit($item->description,100,'...')}}</p>
							<p><a href="{{url('/posts/'.$item->id)}}" class="read-more">Continue Reading</a></p>
						</li>
                        @endforeach

					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{url('/category/politics')}}" class="read-more">View All</a></div>
			</div>

			<div class="row">
				@foreach($politics as $item)
                <div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="{{url('posts/'.$item->id)}}" class="img-link"><img src="{{url('assets/images/'.$item->image)}}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2>{{$item->title}}</h2>
							<div class="post-meta align-items-center text-left clearfix">
								<span class="d-inline-block mt-1">By {{$item->user_name}}</span>
								<span>&nbsp;-&nbsp; {{ $item->created_at->format('M. jS, Y') }}</span>
							</div>

							<p>{{Str::limit($item->description,100,'...')}}</p>
							<p><a href="{{url('/posts/'.$item->id)}}" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
                @endforeach

			</div>

		</div>
	</section>

</div>
@else
<div class="container-fluid mt-5">

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body bg-primary rounded shadow-sm text-white">
            <h5 class="card-title">Posts</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
            <p class="card-text">Number of posts: {{$postsCount}}</p>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body bg-primary rounded shadow-sm text-white">
            <h5 class="card-title">Categories</h5>

            <p class="card-text">Number of categories: {{$categoryCount}} </p>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body bg-primary rounded shadow-sm text-white">
            <h5 class="card-title">Admins</h5>

            <p class="card-text">Number of admins: {{$adminsCount}} </p>

          </div>
        </div>
      </div>
    </div>
          </div>

@endif
</x-app-layout>
