<x-app-layout>

    <div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading"><span class="text-muted">Category:</span> {{ $data[0]->category_name ?? 'Nothing Found...' }}</div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-7">

                    @foreach($data as $item)
                    <div class="blog-entry d-flex blog-entry-search-item">
						@if($item->image)
                        <a href="{{url('posts/'.$item->id)}}" class="img-link me-4">
							<img src="{{url('assets/images/'.$item->image)}}" alt="Image" class="img-fluid">
						</a>
                        @endif
						<div>
							@if($item->created_at)
                            <span class="date">{{$item->created_at->format('M. jS, Y')}} &bullet; <a href="#">Business</a></span>
							<h2><a href="{{url('posts/'.$item->id)}}">{{$item->title}}</a></h2>
							<p>{{Str::limit($item->description,100,'...')}}</p>
							<p><a href="{{url('posts/'.$item->id)}}" class="btn btn-sm btn-outline-primary mt-1">Read More</a></p>
                            @endif
						</div>
					</div>
                    @endforeach

				</div>

				<div class="col-lg-5 sidebar">


					<!-- END sidebar-box -->
					<div class="sidebar-box p-5 rounded">
						<h3 class="heading">Popular Posts</h3>
						<div class="post-entry-sidebar">
							<ul>
								@foreach($popular as $item)
                                <li>
									<a href="{{url('posts/'.$item->id)}}">
										<img src="{{url('assets/images/'.$item->image)}}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>{{$item->title}}</h4>
											<div class="post-meta">
												<span class="mr-2">{{ $item->created_at->format('M. jS, Y') }}</span>
											</div>
										</div>
									</a>
								</li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box p-5 rounded">
						<h3 class="heading">Categories</h3>
						<ul class="categories">
							<li><a href="#">Culture <span>({{ $countCulture }})</span></a></li>
							<li><a href="#">Business <span>({{$countBusiness}})</span></a></li>
							<li><a href="#">Politics <span>({{$countPolitics}})</span></a></li>
						</ul>
					</div>
					<!-- END sidebar-box -->




				</div>
			</div>
		</div>
	</div>

</x-app-layout>
