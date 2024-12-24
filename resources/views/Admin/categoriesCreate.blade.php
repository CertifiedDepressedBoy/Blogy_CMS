<x-app-layout>

    <div class="container mt-5">
        <div class="row">
         <div class="col">
           <div class="card">
             <div class="card-body">
               <h5 class="card-title mb-5 d-inline">Create Categories</h5>
           <form method="POST" action="{{route('admin.categories.create')}}">
            @csrf
                 <div class="form-outline mb-4 mt-4">
                   <input type="text" name="name" id="form2Example1" class="form-control @error('name') is-invalid @enderror" placeholder="name" />
                    @error('name')
                    <small class="text-danger invalid-feedback">{{$message}}</small>
                    @enderror
                 </div>
                 <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


               </form>

             </div>
           </div>
         </div>
       </div>
   </div>

</x-app-layout>
