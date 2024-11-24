<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">   
                <h1 class="text-secondary">Manage Admin</h1>
                <div class="mt-2">
                    <button type="button" class="btn btn-success p-2 " data-bs-toggle="modal" data-bs-target="#formModal">  Add New Admin +  </button>
                </div>
      

                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title text-secondary" id="formModalLabel">Add New Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                                <form id="phoneForm" action="/admin/addadmin" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="firstName">First Name</label>
                                                <input type="text" name="name" id="firstName" autofocus class="form-control form-control-lg"  required />
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="lastName">Last Name</label>
                                                <input type="text" id="lastName" name="last_name" class="form-control form-control-lg"  required />
                                                
                                                @error('last_name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-3 pb-2">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="emailAddress">Email</label>
                                                <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg"  />
                                            
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
                                                <input type="password" name="password" id="password" autofocus class="form-control form-control-lg"  required />
                                                @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="cpassword">Confirm Password</label>
                                                <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg"  required />
                                                
                                                @error('cpassword')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="Address">Address</label>
                                                <input type="text" name="address" id="Address" required class="form-control form-control-lg">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="role">Super Admin</label>
                                               <input type="radio" name="role" value="super admin"  class="form-check-input" > 
                                               <label for="status">Inactive</label>
                                               <input type="radio" name="role" value="admin"  class="form-check-input"> 
                                            </div>    
                                        </div>
                                      </div>
                                    
                                    </div>

                                        <div class="row ">
                                                <div class="col-md-6 mb-3 pb-2">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <div class="form-group">
                                                            <label for="img">upload images</label>
                                                            <input id="img" type="file"  name="img" class="form-control" >
                                                            
                                                        </div>
                                                        @error('img')
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            

                                        
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div data-mdb-input-init class="form-outline">
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number:</label>
                                                        <input id="phone" type="tel" name="phone_number" class="form-control" >
                                                    </div>
                                                    @error('phone_number')
                                                        <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    
                                    
                                    
                                    

                                    

                                    <div class="mt-3 pt-2 text-center">
                                        <button class="btn btn-primary btn-lg w-100" type="submit">Add Admin</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>       
        </div>
    </nav>
<hr>





    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Name</th>
                    <th scope="col" class="text-secondary">Email</th>
                    <th scope="col" class="text-secondary">Role </th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admins as $admin) 
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                   
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold   ">{{$admin->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                               <a class="text-decoration-none text-secondary" href="mailto:{{$admin->email}}">{{$admin->email}}</a>  
                            </td>

                            <td class="align-middle">
                                <p class="text-secondary">{{$admin->role}}</p>
                            </td>

                            <td class="align-middle gap-2" >
                                @if($admin->role==='admin')
    <!-- View Icon -->
                                <a href="{{url('admin/'.$admin->id.'/adminprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                                <!-- Delete Button -->
                                <form action="/admin/admin/{{$admin->id}}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-transparent border-0 p-0">
                                        <i class="bi bi-trash3 text-danger me-2"></i>
                                    </button>
                                </form>
                                @else
                                    <a href="{{url('admin/'.$admin->id.'/adminprofile')}}" class="text-decoration-none">
                                        <i class="bi bi-eye me-2"></i>
                                    </a>
                             @endif
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    


</div>   

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    // Initialize the intl-tel-input plugin
    // Initialize the intl-tel-input plugin
const phoneInput = document.querySelector("#phone");
const iti = intlTelInput(phoneInput, {
  initialCountry: "auto", // Automatically detect the user's country
  geoIpLookup: function (callback) {
    fetch("https://ipapi.co/json/")
      .then((res) => res.json())
      .then((data) => callback(data.country_code))
      .catch(() => callback("US"));
  },
  utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js", // For formatting and validation
});

// Handle form submission
document.querySelector("#phoneForm").addEventListener("submit", function (event) {
  const phoneNumber = iti.getNumber(); // Get the full phone number with the country code
  const isValid = iti.isValidNumber(); // Check if the phone number is valid

  if (!isValid) {
    alert("Please enter a valid phone number.");
    event.preventDefault(); // Stop form submission
  } else {
    // Add the phone number to a hidden input field
    const hiddenPhoneInput = document.createElement("input");
    hiddenPhoneInput.type = "hidden";
    hiddenPhoneInput.name = "phone"; // Use the desired name for the backend
    hiddenPhoneInput.value = phoneNumber;

    // Append the hidden input to the form
    document.querySelector("#phoneForm").appendChild(hiddenPhoneInput);
  }
});
</script>

</x-layout>