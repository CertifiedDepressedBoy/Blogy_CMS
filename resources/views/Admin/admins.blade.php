<x-app-layout>

    <div class="container mt-3 ">
        <div class="text-end mt-2">
            <a href="{{route('admin.add')}}"><Button class="btn btn-danger rounded shadow-sm mb-3 px-4">Add New Admin</Button></a>
        </div>
        <table class="table rounded">
            <thead class="bg-primary text-white text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody class="text-dark text-center">
              @foreach($admins as $item)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                @if($item->email !== 'superadmin@gmail.com')
                <td><a href="{{route('admin.remove',$item->id)}}" class="btn btn-sm py-2 btn-danger  text-center ">Remove</a></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>

</x-app-layout>
