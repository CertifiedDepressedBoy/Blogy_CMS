<x-app-layout>

    <div class="container mt-5">
        <div class="row">
         <div class="col-6 offset-3">
           <div class="card p-5 border-primary">
             <div class="card-body">
               <h5 class="card-title mb-5 d-inline">Create Admins</h5>
           <form method="POST" action="{{route('admin.create')}}">
                @csrf
                 <div class="form-outline rounded mb-4 mt-4">
                   <input type="email" name="email" id="form2Example1" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                    @error('email')
                    <small class="text-danger invalid-feedback">{{$message}}</small>
                    @enderror
                 </div>

                 <div class="form-outline rounded mb-4">
                   <input type="text" name="username" id="form2Example1" class="form-control @error('username') is-invalid @enderror" placeholder="Username" />
                   @error('username')
                    <small class="text-danger invalid-feedback">{{$message}}</small>
                    @enderror
                 </div>

                 <div class="form-outline rounded mb-4">
                   <input type="password" name="password" id="form2Example1" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                   @error('password')
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
