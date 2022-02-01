<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="my-5"></div>
        <div class=" py-5" style="background: #FFE7E3">
            <div class="d-flex justify-content-center mb-5">
                <img src="{{ asset('/images/Logo.jpg') }}" style="height: 20em; width: 20em;  border-radius: 10%" />
            </div>
            <h5 class="d-flex justify-content-center">Thank for Subscribing and Welcome to</h5>
            <h1 class="d-flex justify-content-center text-primary"> Malasakit One Opti Family</h1>
            <p class="d-flex justify-content-center mb-0">We are very excited to share with you this rare Business</p>
            <p class="d-flex justify-content-center mb-0">and an Oppurtunity to help the people you care alleviate</p>
            <p class="d-flex justify-content-center">their sickness towards a healthy and happy life.</p>
            <div class="d-flex justify-content-center">
                <a class="btn btn-lg btn-success" href="https://malasakitoneopti.netlify.app">Visit Our WebSite</a>
            </div>
        </div>
        <div class="py-5" style="background: #E89E9A">
            <h5 class="d-flex justify-content-center text-dark-50">Get started and browse through our Products</h5>
            <p class="d-flex justify-content-center mb-0">A powerful herbal products that can help reduce risks of many diseases</p>
            <p class="d-flex justify-content-center mb-0">A product that utilizes and handcrafted ingredients</p>
            <p class="d-flex justify-content-center">from all-natural produce design to wholistically improve your health.</p>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('/images/ProductDesc.jpg') }}" style="height: 20em; width: 25em;  border-radius: 10%" />
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-lg btn-success" href="https://malasakitoneopti.netlify.app/products">More About Products</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-center py-5">
                <div class="card" style="width: 30rem;">
                    <img src="{{ asset('/images/Membership.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Membership</h5>
                      <p class="card-text">This is where the real fun starts!. We have assembled our fan-favorite, curated products in three high-value options. and physical well-being</p>
                      <a href="https://malasakitoneopti.netlify.app/membership" class="btn btn-lg btn-success">Find Out More</a>
                    </div>
                  </div>
            </div>
            <div class="col-6 d-flex justify-content-center py-5">
                <div class="card" style="width: 30rem;">
                    <img src="{{ asset('/images/Heal.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Health Benefits and Testimony</h5>
                      <p class="card-text">Our products have numerous benefits and hundreds of testimony to validate these.</p>
                      <a href="https://malasakitoneopti.netlify.app/blogs" class="btn btn-lg btn-success">Read More</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
