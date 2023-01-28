<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href={{route('home')}}> <img src="{{asset('uploads/'.$profil->logo)}}" width="197px" height="76px" alt="logo"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse main-menu-item justify-content-end"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href={{route('home')}}>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil-guru">Profil Guru</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Our Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('sd')}}">SD</a>
                                <a class="dropdown-item" href="{{route('smp')}}">SMP</a>
                                <a class="dropdown-item" href="{{route('sma')}}">SMA</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('discount')}}">Discount</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('whyus')}}">Why Us?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tryout')}}">Try Out</a>
                        </li>
                        <li class="d-none d-lg-block">
                            <a class="btn_1" href="{{route('daftar.index')}}">Daftar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
