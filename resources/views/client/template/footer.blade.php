<!-- ========== FOOTER ========== -->
<footer>
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-6">
                        <a href="#" class="d-inline-block"></a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <a href="tel:+80080018588" class="font-size-20 text-gray-90">Dương Thiều Gia Bảo</a>
                                <br>
                                <a href="tel:+80080018588" class="font-size-20 text-gray-90">B1704597</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold">Thông tin liên hệ</h6>
                        <address class="">
                            Cần Thơ
                        </address>
                    </div> --}}
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-github btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            {{-- <h6 class="mb-3 font-weight-bold">Danh mục sản phẩm</h6> --}}
                            <!-- List Group -->
                            {{-- <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach ($theLoaiView as $item)
                                    <li><a class="list-group-item list-group-item-action" href="{{ route('client.get-product-by-cat', ['idCate'=>$item->tl_tenkhongdau]) }}">{{ $item->tl_ten }}</a></li>
                                @endforeach
                            </ul> --}}
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <!-- List Group -->
                            {{-- <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent mt-md-6">
                                <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Printers & Ink</a></li>
                                <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Software</a></li>
                                <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Office Supplies</a></li>
                                <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Computer Components</a></li>
                                <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Accesories</a></li>
                            </ul> --}}
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Danh mục sản phẩm</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach ($theLoaiView as $item)
                                <li><a class="list-group-item list-group-item-action" href="{{ route('client.get-product-by-cat', ['idCate'=>$item->tl_tenkhongdau]) }}">{{ $item->tl_ten }}</a></li>
                            @endforeach
                            </ul>
                            <!-- End List Group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
</footer>
<!-- ========== END FOOTER ========== -->
