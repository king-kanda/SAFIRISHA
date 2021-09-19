<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>clients</title>
</head>
<body>
<section class="p-3 aside">
    <div class="container">
        <h2 class="fw-bold text-center"><i class="fa fa-truck"></i>  safirisha.</h2>
        <hr>
         <div class="list-group list-group-flash bg-dark">
            <a class="list-group-item list-group-item-action-disabled" href="#"> <i class="fa fa-home"></i> Dashboard</a>
            <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-cog"></i> Manage site</a>
            <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-user"></i> clients</a>
            <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-pen-alt"></i> Press</a>
            <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-eye"></i> public</a>
         </div>
    </div>
</section>
<section class="navigation mb-5 p-1">
    <div class="container">
         <nav class="nav navbar d-flex fixed-top bg-light align-items-center justify-content-end mb-2" style="margin-left: 20%;">
             <div class="alerts p-2">
                 <a href="#" class="fa fa-envelope"></a><span class="badge rounded-pill bg-danger">3</span>
                 <a href="#" class="fa fa-bell"></a><span class="badge rounded-pill bg-danger">7</span>
             </div>
             <div class="dropdown dropstart">
                 <img src="../../img/alexander-krivitskiy-RgoJtqRDuGA-unsplash-min.jpg" alt="pro-pic" class="pic dropdown-toggle" 
                 id="dropdownimage" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
 
                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownimage">
                         <li>
                             <a href="" class="dropdown-item"><i class="fa fa-cog fa-spin"></i> Account Settings</a>
                         </li>
                         <li>
                             <a href="" class="dropdown-item" >purpose not found</a>
                         </li>
                         <li><hr class="dropdown-divider"></li>
                         <li class="text-center"><a href="logout.php" class="dropdown-item">Log out</a></li>
                 </ul>
 
             </div>
         </nav>
    </div>
 </section>
 <section class="main">
     <div class="container">
         <div class="display p-4 ">
            <div class="row">
                <div class="col-sm-4">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-item-center justify-content-start">
                                    <i class="fa fa-user p-3"></i>
                                    <div class="label px-3">
                                        <p class="text-muted">Clients</p>
                                        <p class="fw-bold">456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">view all</a>
                            </div>
                       </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-item-center justify-content-start">
                                    <i class="fa fa-plus p-3"></i>
                                    <div class="label px-3">
                                        <p class="text-muted">New Clients</p>
                                        <p class="fw-bold">176</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">view all</a>
                            </div>
                       </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-item-center justify-content-start">
                                    <i class="fa fa-crown p-3"></i>
                                    <div class="label px-3">
                                        <p class="text-muted">Loyal Clients</p>
                                        <p class="fw-bold">81</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">view all</a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
         </div>
     </div>


        <!-- display new orders and clients -->
        <!-- clients new -->
        <section class="p-3 new-clients">
            <div class="d-flex align-items-center justify-content-between p-2">
                <h4 class="fw-bold px-2">New Clients</h4>
                 <div class="filter">
                     <form action="#" class="form-group">
                         <div class="input-group" style="width: 100%;">
                           <button class="btn btn-primary" disabled>
                            <i class="fa fa-user"></i>
                           </button>
                            <select name="filter" id="filter" class="form-control" placeholder="filter rows" >
                                <option value=""></option>
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                            </select>
                         </div>
                     </form>
                 </div>
           </div>
            <div class="blogs py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="container">
                        <table class="table table-stripped  ">
                            <thead class="text-muted"  style="background-color: #00000008; padding:20px;">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" >email verified</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Refferal Id</th>
                            <th scope="col">orders</th>
                            <th scope="col" class=""><i class="fa fa-gift"></i></th>
                            <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <td>Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>
                                        <span class="alert-success p-2 badge badge-rounded-pill">
                                            verified  <i class="p-1 fa fa-exclamation"></i>
                                        </span>
                                    </td>
                                    <td>075962887</td>
                                    <td>AS0546JD2sn</td>
                                    <td>3</td>
                                    <td>Free delivery</td>
                                    <td><i class="far fa-comment-dots"></i></td>
                                </tr>

                                <tr>
                                    <th scope="col">#</th>
                                    <td>Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>
                                        <span class="alert-warning p-2 badge badge-rounded-pill">
                                            pending  <i class="p-1 fa fa-exclamation"></i>
                                        </span>
                                    </td>
                                    <td>075962887</td>
                                    <td>AS0546JD2sn</td>
                                    <td>3</td>
                                    <td>Free delivery</td>
                                    <td><i class="far fa-comment-dots"></i></td>
                                </tr>

                                <tr>
                                    <th scope="col">#</th>
                                    <td>Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>
                                        <span class="alert-danger p-2 badge badge-rounded-pill">
                                            Not verified  <i class="p-1 fa fa-exclamation"></i>
                                        </span>
                                    </td>
                                    <td>075962887</td>
                                    <td>AS0546JD2sn</td>
                                    <td>3</td>
                                    <td>Free delivery</td>
                                    <td><i class="far fa-comment-dots"></i></td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

         <!-- clients new -->
        <section class="p-3 new-orders">
           <div class="d-flex align-items-center justify-content-between p-2">
                <h4 class="fw-bold px-2">Recent Orders</h4>
                 <div class="filter">
                     <form action="#" class="form-group">
                         <div class="input-group" style="width: 100%;">
                           <button class="btn btn-primary" disabled>
                            <i class="fa fa-user"></i>
                           </button>
                            <select name="filter" id="filter" class="form-control" placeholder="filter rows" >
                                <option value=""></option>
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                            </select>
                         </div>
                     </form>
                 </div>
           </div>
            <div class="blogs py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="container">
                        <table class="table" >
                            <thead class="text-muted" style="background-color: #f1f1f1;">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Order NO.</th>
                                <th scope="col">Product No.</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Drop Zone</th>
                                <th scope="col">Delivered ?</th>
                                <th scope="col">Received ?</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <td>
                                        Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>78965-2021-3</td>
                                    <td>fu594bz</td>
                                    <td>Yoga pants</td>
                                    <td>kisumu 
                                        <br>
                                        <span class="text-muted">Mega city</span>
                                    </td>
                                    <td>
                                        David Kol
                                        <br>
                                        <span class=" p-2 alert-success badge badge-rounded-pill">
                                            delivered
                                        </span>
                                    </td>
                                    <td>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="far fa-star"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col">#</th>
                                    <td>
                                        Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>78965-2021-3</td>
                                    <td>fu594bz</td>
                                    <td>Yoga pants</td>
                                    <td>kisumu 
                                        <br>
                                        <span class="text-muted">Mega city</span>
                                    </td>
                                    <td>
                                        David Kol
                                        <br>
                                        <span class=" p-2 alert-success badge badge-rounded-pill">
                                            delivered
                                        </span>
                                    </td>
                                    <td>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="fa fa-star" style="color: gold;"></i>
                                        <i class="far fa-star" ></i>
                                        <i class="far fa-star"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col">#</th>
                                    <td>
                                        Steven James
                                        <br>
                                        <span class="text-muted"> stevenokanda@gmail.com</span>
                                    </td>
                                    <td>78965-2021-3</td>
                                    <td>fu594bz</td>
                                    <td>Yoga pants</td>
                                    <td>kisumu 
                                        <br>
                                        <span class="text-muted">Mega city</span>
                                    </td>
                                    <td>
                                        morosho molo
                                        <br>
                                        <span class=" p-2 alert-warning badge badge-rounded-pill">
                                            On transist
                                        </span>
                                    </td>
                                    <td>
                                        <i class="far fa-star"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>            
    </section>

</body>
<script src="../../vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
</html>