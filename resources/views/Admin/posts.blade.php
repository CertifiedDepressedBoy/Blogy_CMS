<x-app-layout>

    <div class="container mt-5">

        <div class="row">
      <div class="col">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title mb-4 d-inline">Posts</h5>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Author</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->user_name}}</td>
                     <td><a href="{{route('admin.posts.delete',$item->id)}}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



</div>

</x-app-layout>
