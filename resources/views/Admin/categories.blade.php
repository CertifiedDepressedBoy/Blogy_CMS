<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4 d-inline fw-bold text-dark h3">Categories</h5>
                 <a  href="{{route('admin.categories.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody >
                        @foreach($categories as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td><a  href="{{route('admin.categories.update',$item->id)}}" class="btn btn-warning text-white text-center ">Update Categories</a></td>
                            <td><a href="{{route('admin.categories.delete',$item->id)}}" class="btn btn-danger  text-center ">Delete Categories</a></td>
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
