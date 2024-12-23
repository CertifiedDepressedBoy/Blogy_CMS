<x-app-layout>
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('assets/images/' . $post->image) }}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By {{$post->user_name}}</span>
              <span>&nbsp;-&nbsp; {{ $post->created_at ? $post->created_at->format('M. jS, Y') : null }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="row blog-entries element-animate">



        <div class="col-md-12 col-lg-8 main-content">
          <div class="post-content-body">
            <p>{{$post->description}}</p>
          </div>


          <div class="pt-5">
            <p>Categories:   <a href="#" class="fw-bold text-dark">{{$post->category_name}}</a> </p>
          </div>

            @if($post->user_id == Auth::id())
                <div class="d-flex justify-content-end">
                    <form action="{{route('posts.delete',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete Post" class="btn btn-danger mx-2 text-center">
                    </form>
                    <form action="{{route('posts.edit',$post->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <input type="submit" value="Edit Post" class="btn btn-primary mx-2 text-center">
                    </form>
                </div>
            @endif

          <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading">{{$comments->count()}} Comments</h3>
            <ul class="comment-list">

                @foreach($comments as $item)
                <li class="comment">
                    <div class="vcard">
                      <img src="{{url('assets/images/person_1.jpg')}}" >
                    </div>
                    <div class="comment-body">
                      <h3>{{$item->user_name}}</h3>
                      <div class="meta">{{ $item->created_at->format('F j, Y \a\t g:ia') }}</div>
                      <p>{{$item->comment}}</p>
                      <div class="d-flex justify-content-end align-items-center">
                        <p><a href="" class="py-2 px-2 rounded mx-2 btn btn-sm btn-secondary mt-1">Reply</a></p>
                        @if($item->user_id == Auth::id() || $post->user_id == Auth::id())
                        <form action="{{ route('posts.comment.delete',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="py-2 px-2 rounded mx-2 btn btn-sm btn-danger mt-1" value="Delete">
                        </form>
                        @endif
                      </div>
                    </div>
                  </li>
                @endforeach

            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5 ">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="{{url('posts/comment/'.$post->id)}}" method="POST" class="p-5 bg-light">
                @csrf
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="comment" id="message" cols="30" rows="10" class="form-control rounded @error('comment') is-invalid @enderror"></textarea>
                  @error('comment')
                  <small class="text-danger invalid-feedback mb-1">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">

          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center ">
              <img src="{{url('assets/images/person_4.jpg')}}" alt="Image Placeholder" class="mb-3">
              <div class="bio-body">
                <h2>Hannah Anderson</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my bio</a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box p-3 rounded">
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
                <li><a href="{{url('/category/culture')}}">Culture <span>({{ $countCulture }})</span></a></li>
                <li><a href="{{url('/category/bussiness')}}">Business <span>({{$countBusiness}})</span></a></li>
                <li><a href="{{url('/category/politics')}}">Politics <span>({{$countPolitics}})</span></a></li>
            </ul>
        </div>
          <!-- END sidebar-box -->


        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

</x-app-layout>
