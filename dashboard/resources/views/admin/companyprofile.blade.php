<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
    <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Company Profile</h1>
            
            <div class="mt-2">
                <button type="button" class="btn btn-success p-2 " data-bs-toggle="modal" data-bs-target="#formModal">  Edit Company  </button>
            </div>

            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Edit Company</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>




                        <div class="modal-body">
                            <form  action="/admin/addcompany" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $company->id }}">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="name">Company Name</label>
                                            <input type="text" name="name" id="name" autofocus class="form-control form-control-lg" value="{{ $company->name }}" required />
                    
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
                                                <option value="IT" {{ $company->category == 'IT' ? 'selected' : ''}}>IT</option>
                                                <option value="Finance" {{ $company->category == 'Finance' ? 'selected' : ''}} >Finance</option>
                                                <option value="Healthcare" {{ $company->category == 'Healthcare' ? 'selected' : ''}}>Healthcare</option>
                                                <option value="Education" {{ $company->category == 'Education' ? 'selected' : ''}} >Education</option>
                                                <option value="Retail" {{ $company->category == 'Retail' ? 'selected' : ''}}>Retail</option>
                                                <option value="Manufacturing" {{ $company->category == 'Manufacturing' ? 'selected' : ''}} >Manufacturing</option>
                                                <option value="Construction" {{ $company->category == 'Construction' ? 'selected' : ''}}>Construction</option>
                                                <option value="Real Estate" {{ $company->category == 'Real Estate' ? 'selected' : ''}}>Real Estate</option>
                                                <option value="Transportation" {{$company->category == 'Transportation' ? 'selected' : ''}} >Transportation</option>
                                                <option value="Hospitality" {{ $company->category == 'Hospitality' ? 'selected' : ''}} >Hospitality</option>
                                                <option value="Agriculture" {{ $company->category == 'Agriculture' ? 'selected' : ''}} >Agriculture</option>
                                                <option value="Energy" {{ $company->category == 'Energy' ? 'selected' : ''}} >Energy</option>
                                                <option value="Telecommunications" {{ $company->category == 'Telecommunications' ? 'selected' : ''}} >Telecommunications</option>
                                                <option value="Media" {{ $company->category == 'Media' ? 'selected' : ''}} >Media</option>
                                                <option value="Entertainment" {{ $company->category == 'Entertainment' ? 'selected' : ''}} >Entertainment</option>
                                                <option value="Legal" {{ $company->category == 'Legal' ? 'selected' : ''}} >Legal</option>
                                                <option value="Consulting" {{ $company->category == 'Consulting' ? 'selected' : ''}} >Consulting</option>
                                                <option value="Nonprofit" {{ $company->category == 'Nonprofit' ? 'selected' : ''}} >Nonprofit</option>
                                                <option value="Government" {{ $company->category == 'Government' ? 'selected' : ''}}>Government</option>
                                                <option value="Automotive"{{ $company->category == 'Automotive' ? 'selected' : ''}} >Automotive</option>
                                                <option value="Aerospace" {{ $company->category == 'Aerospace' ? 'selected' : ''}}  >Aerospace</option>
                                                <option value="Fashion"     {{ $company->category == 'Fashion' ? 'selected' : ''}} >Fashion</option>
                                                <option value="Food and Beverage" {{ $company->category == 'Food and Beverage' ? 'selected' : ''}} >Food and Beverage</option>
                                                <option value="Pharmaceuticals" {{ $company->category == 'Pharmaceuticals' ? 'selected' : ''}} >Pharmaceuticals</option>
                                                <option value="Insurance" {{    $company->category == 'Insurance' ? 'selected' : ''}} >Insurance</option>
                                                <option value="Other" {{ $company->category == 'Other' ? 'selected' : ''}} >Other</option>                                    
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
                                            <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg" value="{{ $company->email }}" />
                                            
                                            @error('email')
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
                                            <input type="text" name="address" id="adress" required class="form-control form-control-lg" value="{{ $company->address }}">
                                         
                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="license">license</label>
                                            <input type="text" name="business_license" id="license" required class="form-control form-control-lg" value="{{ $company->business_license }}">
                                            
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="mt-4 pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Edit Company</button>
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
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset($company->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$company->name}}</h5>
            <p class="text-muted mb-1">{{$company->category}}</p>
            <p class="text-muted mb-2">Address: {{$company->address}}</p>
        </div>
    </div>

   

    
      </div>

      <div class="col-lg-8">
         <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Company Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$company->email}}" class="text-decoration-none">{{$company->email}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">License</p>
              </div>
              <div class="col-sm-9">
                <a href="{{$company->business_license}}"class=" mb-0 text-decoration-none text-primary">{{$company->name." license"}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Subscription</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->subscription_status}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Expiry</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->subscription_expiry}}</p>
              </div>
            </div>
           <hr>
           <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                @if($company->is_active === 'active')
                   <p class="text-success mb-0">{{$company->is_active}}</p>
                @else
                   <p class="text-danger mb-0">{{$company->is_active}}</p>  
                @endif
              </div>
            </div>
          
            
            
          </div>
         </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <h3 class="text-muted">about</h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <p class="text-muted ">{{$company->bio}}</p>
                        </div>
                    </div>
                </div>
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





