
@include('admin.layouts.header')





<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
           <!-- Page-header start -->

           {{-- Alert  --}}
           @if ($errors->any())
           @foreach ($errors->all() as $error)
           <div class="row align-items-end">
            <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    </div>
            @endforeach

           @endif

            @if(\Session::has('success'))
                <div class="row align-items-end">
                    <div class="col-lg-12">
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{\Session::get('success')}}
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    </div>
              </div>
            @endif

            {{-- End alert --}}
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Yangi tavarlani qo'shish</h4>
                                    <span>yangi tavarlani qo'shish uchun ustunlarni to'ldiring</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Market</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Tavarlarni qo'shish</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tavar haqida ma'lumot kiritish</h5>
                                    <span>Tavarlar haqida to'liq malumotlarni kiriting</span>
                                    <div class="card-header-right"><i
                                        class="icofont icofont-spinner-alt-5"></i></div>

                                        <div class="card-header-right">
                                            <i class="icofont icofont-spinner-alt-5"></i>
                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <h4 class="sub-title"></h4>
                                        <form action="{{route('admin.shop.store')}}" method="POST" enctype="multipart/form-data" >
                                            @csrf

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tavar nomi.</label>
                                                <div class="col-sm-10">
                                                    <input name="name" type="text" class="form-control"
                                                    placeholder="Tavar nomini kiriting" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tavar turi</label>
                                                <div class="col-sm-10">
                                                    <input name="category" type="text" class="form-control"
                                                    placeholder="Type your title in Placeholder" >
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Rasm</label>
                                                            <div class="col-sm-10">
                                                                <input name="img" type="file" class="form-control" placeholder="rasm yuklang">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tavar haqida to'liq ma'lumot</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" cols="5" id="task-textarea" class="form-control"
                                                                placeholder="Tavar haqida to'liq ma'lumot yozing" name="about" required></textarea>
                                                            </div>
                                                        </div>


                                                                <button class="btn btn-out btn-primary btn-square"> ma'lumotlarni saqlash</button>




                                                    </form>


                                                </div>
                                            </div>
                                            <!-- Basic Form Inputs card end -->


                                                            <!-- Input Alignment card start -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Page body end -->
                                                </div>
                                            </div>
                                            <!-- Main-body end -->

                                        </div>
                                    </div>
@section('scripts')

<script>
    $(document).ready(function() {
        $("#task-textarea").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endsection

@include('admin.layouts.footer')
