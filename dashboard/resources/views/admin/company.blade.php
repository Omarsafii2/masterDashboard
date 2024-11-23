<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Companies</h1>
            <div class="mt-2">
                <button type="button" class="btn btn-success p-2 " data-bs-toggle="modal" data-bs-target="#formModal"> Add New Company + </button>
            </div>

            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>



                        <div class="modal-body">
                            <form  action="/admin/addcompany" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="name">Company Name</label>
                                            <input type="text" name="name" id="name" autofocus class="form-control form-control-lg" required />
                    
                                            @error('name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                            <label for="category" class="form-label">company category</label>
                                            <select class="form-select" id="category" name="category" required>
                                                <option  value="" disabled selected>company category</option>
                                                <option value="IT">IT</option>
                                                <option value="Finance" >Finance</option>
                                                <option value="Healthcare" >Healthcare</option>
                                                <option value="Education" >Education</option>
                                                <option value="Retail" >Retail</option>
                                                <option value="Manufacturing" >Manufacturing</option>
                                                <option value="Construction" >Construction</option>
                                                <option value="Real Estate" >Real Estate</option>
                                                <option value="Transportation" >Transportation</option>
                                                <option value="Hospitality" >Hospitality</option>
                                                <option value="Agriculture" >Agriculture</option>
                                                <option value="Energy" >Energy</option>
                                                <option value="Telecommunications" >Telecommunications</option>
                                                <option value="Media" >Media</option>
                                                <option value="Entertainment" >Entertainment</option>
                                                <option value="Legal" >Legal</option>
                                                <option value="Consulting">Consulting</option>
                                                <option value="Nonprofit" >Nonprofit</option>
                                                <option value="Government" >Government</option>
                                                <option value="Automotive">Automotive</option>
                                                <option value="Aerospace" >Aerospace</option>
                                                <option value="Fashion" >Fashion</option>
                                                <option value="Food and Beverage" >Food and Beverage</option>
                                                <option value="Pharmaceuticals" >Pharmaceuticals</option>
                                                <option value="Insurance" >Insurance</option>
                                                <option value="Other" >Other</option>                                    
                                            </select>
                                    </div>    
                                    <div>
                                            @error('category')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg" />
                                            
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" required class="form-control form-control-lg">
                                         
                                            @error('password')
                                                <script>alert("{{ $message }}");</script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="c-password">Confirm Password</label>
                                            <input type="password" name="cpassword" id="c-password" required class="form-control form-control-lg">
                                            
                                            @error('cpassword')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-8 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="img">upload images</label>
                                                <input id="img" type="file"  name="img" class="form-control">
                                            </div>
                                            @error('img')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-4 mt-4 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                            <p>jpg,png.jpeg</p>    
                                            </div>    
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="Address">Address</label>
                                            <input type="text" name="address" id="adress" required class="form-control form-control-lg">
                                         
                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="license">license</label>
                                            <input type="text" name="business_license" id="license" required class="form-control form-control-lg">
                                            
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="mt-4 pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add Company</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
             </div>

           

        </div>
    </nav>
    <hr>    
    <!-- ************************************************* -->

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Company</th>
                    <th scope="col" class="text-secondary">Email</th>
                    <th scope="col" class="text-secondary">Status </th>
                    <th scope="col" class="text-secondary">Subscription</th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($companies as $company )
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                    <img src="{{ asset($company->img) }}" alt="company Image" width="50px" height="50px" loading="lazy"  class="me-2 rounded-5">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold   ">{{$company['name']}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                  <a href="mailto:{{$company['email']}}" class="text-xs text-decoration-none text-secondary mb-0">{{$company['email']}}</>
                            </td>

                            <td class="align-middle">
                                @if ($company['is_active']==='active')
                                      <h6 class="text-success">active</h6>
                                 @else
                                      <h6 class="text-danger">inactive</h6>
                                @endif
                            </td>

                            <td class="align-middle ">
                                @if ($company['subscription_status']==='premium')
                                      <h6 class="text-success">premium</h6>
                                 @else
                                      <h6 class="text-danger">free</h6>
                                @endif
                            </td>

                            <td class="align-middle gap-2" >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$company->id.'/companyprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                                <!-- Delete Button -->
                                <form action="/admin/{{$company->id}}/companyprofile" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-transparent border-0 p-0">
                                        <i class="bi bi-trash3 text-danger me-2"></i>
                                    </button>
                                </form>

                             
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
    </div>

</x-layout>