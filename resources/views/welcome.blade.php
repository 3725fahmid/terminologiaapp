<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Welcome to Enola </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        {{-- lightbox2 --}}
        <link rel="stylesheet" href="{{ asset('assets/libs/lightbox/css/lightbox.min.css') }}">
        {{-- colorbox  --}}
        <link rel="stylesheet" href="{{ asset('assets/libs/colorbox/colorbox.css') }}" />
        <!-- Custom Css-->
        <link href="{{ asset('assets/css/fh-custom.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="">
        {{-- Welcome page first View  --}}
        <section>
            <div class="w-front-view">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="w-inner-view">
                                <div class="w-cover" 
                                        style="background: url('assets/images/coverimg/cover9.jpg') no-repeat center center; 
                                        -webkit-background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        background-size: cover;">
                                    <div class="w-nav">
                                        <div class="w-logo">
                                            <img src="logo/bird_2.png" alt="logo" width="70px" height="50px">
                                        </div>
                                    </div>
                                    <div class="w-content p-2">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="welcome-space">
                                                    <h1>Welcome To Enola</h1>
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum eveniet quae maxime aperiam magni illum natus tempora nihil repellat repudiandae.</p>
    
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="w-img-box mb-3">
                                                </div>
                                                <div class="mb-2">
                                                    <a class="example-image-link" href="{{ asset('assets/images/coverimg/cover2.jpg') }}" data-lightbox="example-set"><button class="custom-btn btn-7"><span>Read Guidline</span></button></a>
                                                    {{-- <a class="example-image-link" href="{{ asset('assets/images/coverimg/cover2.jpg') }}" data-lightbox="example-set">1jfakdjfkaldjfkaf</a> --}}
                                                    {{-- <a class="example-image-link m-2" href="{{ asset('assets/images/coverimg/cover3.jpg') }}" data-lightbox="example-set" data-title="Optional caption."><img class="example-image" src="" alt="image-1"/></a> --}}
                                                </div>
    
                                                <div class="mb-2">
                                                    <a class='youtube' href="https://www.youtube.com/embed/RHGmTQJ0gZk?si=fA9_e5t6Y6fX00jR"><button class="custom-btn btn-7"><span>Watch Video Guidline </span></button></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-auth">
                                     @if (Route::has('login'))
                                            @auth
                                                <div class="w-dashboard">
                                                    <a href="{{ url('/home') }}"><span>Homepage</span></a>
                                                </div>
                                                {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                                            @else
                                                @if (Route::has('register'))
    
                                                    <div class="w-registration">
                                                        <a href="{{ route('register') }}"><span>Registration</span></a>
                                                    </div>
    
                                                    <div class="w-login">
                                                        <a href="{{ route('login') }}"><span>Login</span></a>
                                                    </div>
                                                    {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}
                                                
                                                    {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> --}}
                                                @endif
                                            @endauth
                                    @endif
                                    {{-- <div class="w-registration">
                                        <a href="{{ route('register') }}"><span>Registration</span></a>
                                    </div>
                                    <div class="w-login">
                                        <a href="{{ route('login') }}"><span>Login</span></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end container -->
            </div>
        </section>
        {{-- Welcome page first View  --}}
        <!-- end -->

        <section>
            <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi perferendis, voluptate qui eum quod ad dolores incidunt dolor quo suscipit sapiente, facere minima possimus nemo, dicta nisi cum. Dicta rem at distinctio assumenda deleniti in esse ipsa eveniet perferendis mollitia, libero inventore veritatis laborum non, quod harum est explicabo magnam quam! Aliquam architecto error, numquam quaerat, molestias repellat dolorum eos a laudantium, voluptas quas. Quaerat, qui hic! Laboriosam, quis totam a repellat soluta animi impedit quia provident, accusamus nobis eaque quos deleniti ipsa nulla sint ducimus. Velit id eveniet optio fugit cum, possimus quisquam accusamus deleniti deserunt veniam perferendis dicta natus voluptatem quam error rem eius corporis atque. Inventore praesentium itaque optio quis in deleniti illum quibusdam minus, voluptas quidem eveniet aperiam accusantium quo rerum mollitia aspernatur magnam voluptate quasi! Eius quam id possimus odit, laudantium et unde, asperiores dolore non ipsam molestiae doloremque officiis. Culpa exercitationem, odit officiis doloremque distinctio, impedit, harum omnis vitae veritatis fugiat fugit laborum neque? Laudantium adipisci ullam optio sed suscipit nobis laboriosam illo autem, voluptates enim, explicabo maiores mollitia ea odio temporibus dolorem quae? Ex exercitationem nesciunt nemo est quibusdam quam sit, voluptates voluptas porro earum libero reprehenderit nostrum dolore omnis eos quis vero repellat enim consequuntur adipisci. Minus, nostrum nihil! Quibusdam quia obcaecati adipisci, dolores deleniti ut molestias aperiam eaque officia deserunt commodi quos laudantium ipsa, a ullam sint consequuntur libero doloribus quidem vitae, dolor in. Dolorum rerum nesciunt illo, necessitatibus assumenda deleniti ducimus neque voluptatum sequi tenetur distinctio est provident quaerat itaque veritatis debitis saepe beatae porro. Ut ipsa modi magnam nihil a officia incidunt rem eius deserunt nam repellendus doloribus, et dolorum commodi atque fugiat ex mollitia excepturi sunt, debitis quae nisi. Qui at fugit voluptas repudiandae animi facere dolor modi quasi autem ratione eaque beatae eum, velit voluptate voluptatum soluta nihil molestias unde cum enim doloremque? Fuga ad incidunt ut aliquam beatae dolores ipsa nihil earum accusantium quaerat. Est voluptas aspernatur earum illo ex nemo deserunt quia ducimus debitis aliquam nostrum sequi consequuntur velit qui dolorem illum consequatur laudantium nesciunt esse, facere voluptate quo reiciendis. Maiores architecto harum molestiae officiis sit quis labore quidem? Voluptates, unde dolore nesciunt, a rerum dolores beatae quaerat provident in quae est inventore, veritatis voluptatem doloremque. Explicabo nobis alias illo laborum sed esse eum molestias, totam porro libero voluptate nostrum corporis eligendi possimus facilis tempore soluta quibusdam recusandae iste magnam labore rem consequuntur error sunt! Tempore, quidem optio perspiciatis tempora et nostrum enim iste vitae libero laborum totam nihil nemo minus laudantium rerum eum atque similique tenetur officiis quia quasi adipisci dolor qui eaque. Error dolore repellat quos suscipit corporis unde dolorem, aut inventore pariatur voluptate asperiores. Deleniti nesciunt, suscipit ea laudantium est beatae numquam deserunt quisquam. Minima delectus facere dignissimos blanditiis suscipit ducimus corporis, necessitatibus hic quam, asperiores eveniet, ut at? Dignissimos porro dicta nulla placeat voluptatibus est blanditiis repellendus aliquam suscipit, recusandae amet unde ullam laboriosam autem veritatis explicabo nesciunt magnam officia, atque iste. Obcaecati assumenda vero esse fuga ipsa architecto quas autem perspiciatis id inventore iste consectetur reiciendis alias et consequatur aliquid accusamus, molestias magni vel culpa. Accusamus tempora doloribus eaque omnis dolores harum asperiores. Provident, nemo possimus. Neque, perspiciatis quo incidunt rerum perferendis placeat ea error fuga tempore nesciunt, necessitatibus repellat dignissimos facilis consequuntur debitis! Soluta dolore maxime, in dolorum alias accusamus distinctio blanditiis corporis, aperiam cumque temporibus amet. Voluptatum iste, optio enim veniam nulla amet ea aperiam consectetur reiciendis aut voluptates, quod culpa perferendis consequatur, ipsum a cumque! Deleniti similique quo magnam impedit eligendi iure maxime ut illum aut. Vel eveniet eum facere neque assumenda, facilis optio. Impedit aliquam ducimus dolorum velit vero, assumenda dolores fugit placeat. Voluptatem facilis quidem sit ratione, possimus voluptatum laborum aliquid aliquam adipisci deserunt asperiores veniam voluptate dolorem earum eligendi natus architecto dolore a corrupti illo? Magnam temporibus molestiae aspernatur tenetur. Voluptas, minus omnis accusantium cum doloribus repudiandae quaerat tenetur rerum dicta, repellendus, nostrum iure delectus voluptates sed consequuntur odit hic. Dicta impedit delectus quisquam aperiam ea. Explicabo, quidem! Obcaecati sapiente voluptates qui repellendus consequuntur aut sit, quaerat dicta reprehenderit nesciunt perferendis impedit ut alias, nostrum blanditiis harum laborum numquam illum dolor commodi explicabo tenetur assumenda, id sed. Iure aperiam possimus facilis delectus voluptates exercitationem quis quo nemo dolorem ex, commodi asperiores in molestiae. Libero, explicabo beatae dignissimos accusantium tenetur ullam perspiciatis laborum, ea molestiae suscipit, veritatis quam. Eos facilis, rem nesciunt perspiciatis iusto tempore numquam. Ut harum facere quam, dolorum nostrum tempore. Ducimus quam fugiat totam commodi soluta. Cum ad commodi sequi iusto nostrum cumque delectus accusamus officiis, ea quam qui facere, omnis enim illo! At voluptas placeat dolorem sapiente nesciunt distinctio, illum culpa iste perferendis esse, natus provident quis sequi, omnis illo ipsam explicabo quos accusamus facere debitis. Harum eligendi vero corrupti esse eos corporis laudantium mollitia dicta nesciunt ipsa, perspiciatis hic officiis reprehenderit rem dignissimos a pariatur exercitationem dolore incidunt ex vel beatae! Amet, minus rem. Voluptas architecto ut, non incidunt magni doloremque dolores tempore consectetur fuga asperiores tenetur cupiditate aliquid nesciunt illo omnis perferendis veniam fugit. Alias, vero. Placeat vel quaerat autem quam perferendis, quis laborum commodi neque inventore eaque a molestias fugit repellat in cum saepe, eius veniam? Iusto magnam deleniti eligendi natus doloribus impedit est recusandae, quisquam in unde inventore odit eos? Blanditiis quia accusamus assumenda eaque cumque sint doloremque dicta laboriosam velit sunt, impedit odit nobis tenetur molestiae fuga quas. Eveniet, ipsum mollitia deserunt facere perspiciatis sint delectus officiis aspernatur voluptatem tempore sit enim sed ab doloremque ut animi atque nihil? Aliquam quidem tenetur voluptatem corrupti distinctio reiciendis voluptates pariatur autem vel voluptatibus voluptatum animi minima, modi maiores beatae quod eveniet provident maxime cum voluptate! Quam, accusantium vero! Tempore sit nobis excepturi unde quidem commodi ullam animi repudiandae, nisi, voluptatibus mollitia ab eaque a ducimus quas iure? Qui suscipit earum eius a, quis totam ex quas? Soluta molestias sit et provident voluptatum numquam reiciendis eligendi dolor perferendis aspernatur atque beatae, harum ea totam praesentium ipsa similique culpa consequuntur facilis repellat veritatis cumque sequi. Optio consequuntur in voluptatem pariatur.</p>
            </div>
        </section>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        {{-- Lightbox  --}}
        <script src="{{ asset('assets/libs/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>
        {{-- Colorbox  --}}
        <script src="{{ asset('assets/libs/colorbox/jquery.colorbox.js') }}"></script>
        
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
			$(document).ready(function(){
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
    </body>
</html>
