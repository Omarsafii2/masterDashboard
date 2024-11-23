<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    

    <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>

                        <form action="/loginpost" method="post">
                        @csrf   

                        <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input type="email" class="form-control" id="email"class="form-control form-control-lg" name="email" placeholder="Enter email">
                            </div>

                          <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>
                                <input type="password" class="form-control" id="password" name="password" class="form-control form-control-lg" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>  
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>

   