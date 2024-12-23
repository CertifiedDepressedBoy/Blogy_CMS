<x-app-layout>
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2 card p-3 shadow-sm rounded">

                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="mb-3 text-center">
                                <img class="img-profile mb-1 w-50 rounded" id="output">
                                <input type="file" name="image" id="" accept="image/*" class="form-input w-100 rounded mt-1 @error('image') is-invalid @enderror" onchange="loadFile(event)">
                                @error('image')
                                <small class="text-danger invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control rounded  @error('title') is-invalid @enderror"
                                            placeholder="Enter Title...">
                                            @error('title')
                                            <small class="text-danger invalid-feedback">{{$message}}</small>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control rounded  @error('description') is-invalid @enderror"
                                        placeholder="Enter Description...">{{old('description')}}</textarea>
                                        @error('description')
                                        <small class="text-danger invalid-feedback">{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <select name="category_id" id="" class="form-control rounded  @error('categoryId') is-invalid @enderror">
                                            <option value="">Choose Category...</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}" >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('categoryId')
                                <small class="text-danger invalid-feedback">{{$message}}</small>
                                @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="Create Product" class=" btn btn-primary w-100 rounded shadow-sm">
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
                <script>
                    function loadFile(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output')
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0])
                    }
                </script>
</x-app-layout>
