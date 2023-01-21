<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Business Frontpage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="webtheme/assets/favicon.ico" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="webtheme/css/styles.css" rel="stylesheet" />
    <!-- font awesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body>
    <div id="vue-container">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container py-1">                
                <a class="navbar-brand" href="#">
                    <img src="/storage/images/logo.png" alt="error" height="50" width="150" />
                </a>                                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>

                        <li class="nav-item"><a class="nav-link welcome" href="#!" v-if=user.name>Welcome
                                {{ user.name }}</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="checkout"
                                v-if=user.name>
                                <i class="bi bi-cart4">{{ cart.length }}</i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/admin/logout"
                                v-if=user.name>Log out</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Present your business in a whole new way
                            </h1>
                            <!-- <div class="text-center">
                                <img src="https://scontent.fmnl8-2.fna.fbcdn.net/v/t39.30808-6/278668570_1864937593716044_8002696076047076020_n.png?_nc_cat=103&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeHdliHCbTvKIMntyyxrZHd_azH7cLZU4mBrMftwtlTiYKJGZgimfVi4BLTy4MptpUA&_nc_ohc=ykmg6tB7g20AX8fFyPi&_nc_ht=scontent.fmnl8-2.fna&oh=00_AfCSlq9Ghau1YZ5A3AOkwy5dCp42myv_OqdbzOMIj5vrow&oe=63C662D4" alt="error" width="100%">
                            </div> -->

                            
                            <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first
                                sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="login" v-if=!user.name>Sign in</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="register" v-if=!user.name>Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Pricing section-->
        <section class="bg-light py-5 border-bottom" v-if=user.name>
            <div class="container px-5 my-5">
                <div class="text-center mb-5">

                    <h2 class="fw-bolder">Shop Now</h2>
                    <!-- <p class="lead mb-0">With our no hassle pricing plans</p> -->
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Pricing card free-->
                    <div v-for="appliance in appliances" class="col-lg-6 col-xl-4">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Free</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">P{{ appliance.price }}</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <strong>{{ appliance.product_model }}</strong>
                                    </li>

                                    <li class="text-muted">
                                        <strong>{{ appliance.description }}</strong>
                                    </li>
                                </ul>
                                <div class="d-grid mb-3"><a @click.prevent.stop="addToCart(appliance.id)"
                                        class="btn btn-outline-primary" href="#!">Add To Cart</a></div>
                                <div class="d-grid"><a @click.prevent.stop="removeFromCart(appliance.id)"
                                        v-if="checkIfInCart(appliance.id)" class="btn btn-outline-primary"
                                        href="#!">Remove</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features section-->
        <!-- <section class="py-5 border-bottom" id="features">
                <div class="container px-5 my-5">                    
                    <h3>Cart Items: {{ cart.length }}</h3>
                    <a href="/checkout">View Cart Items</a>
                </div>
            </section> -->
        <!-- Testimonials section-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Customer testimonials</h2>
                    <p class="lead mb-0">Our customers love working with us</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Testimonial 1-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i
                                            class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">Thank you for putting together such a great product. We loved
                                            working with you and the whole team, and we will be recommending you to
                                            others!</p>
                                        <div class="small text-muted">- Client Name, Location</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i
                                            class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">The whole team was a huge help with putting things together for
                                            our company and brand. We will be hiring them again in the near future for
                                            additional work!</p>
                                        <div class="small text-muted">- Client Name, Location</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                    </div>
                    <h2 class="fw-bolder">Get in touch</h2>
                    <p class="lead mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                    data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                    data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                </div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
                                    data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                    required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text"
                                    placeholder="Enter your message here..." style="height: 10rem"
                                    data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                                </div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton"
                                    type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="webtheme/js/api_url.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>


    <script>
        new Vue({
            el: '#vue-container',
            //data contains variables...
            data: {
                user: {},
                cart: [],
                appliances: [],
                request: {
                    product_id: undefined,
                },
            },

            // on mount
            mounted() {

                axios.get(api_url + 'customer')
                    .then((data) => {
                        console.log(data);
                        this.user = data.data;
                        for (i in data.data.cart)
                            this.cart.push(data.data.cart[i].product_id);
                    })

                axios.get(api_url + 'appliances')
                    .then((data) => {
                        this.appliances = data.data.data;
                    })

                    .catch((error) => {
                        console.log(error);
                    })

            },

            methods: {
                addToCart: function (id) {
                    this.cart.push(id);
                    console.log(this.cart);
                    this.request.product_id = id;
                    axios.post(api_url + 'add-to-cart', this.request)
                        .then((data) => {
                            console.log(data.data);
                        })
                },
                removeFromCart: function (id) {
                    this.cart.splice(this.cart.indexOf(id), 1);

                    this.request.product_id = id;
                    axios.post(api_url + 'remove-from-cart', this.request)
                        .then((data) => {
                            console.log(data.data);
                        })
                },
                checkIfInCart: function (id) {
                    if (this.cart.includes(id))
                        return true;
                    else
                        return false;
                },
                checkIfLoggedIn: function () {
                    if (!this.user.name == null)
                        console.log('logged in');
                    else
                        console.log('not logged in');
                }
            }



        })
    </script>
</body>

</html>