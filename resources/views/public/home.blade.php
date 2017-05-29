@extends('layouts.app')

@section('title')
    Beranda
@endsection

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form id="search-tron" action="{{ route('cari') }}" method="get">
                    <div class="input-group" id="main-search">
                        <input type="text" name="location" id="location" placeholder="Ketikkan sebuah lokasi ..."
                               required autocomplete="off" autofocus/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn-submit">
                                <svg focusable="false" width="20" height="20" viewBox="0 0 10 10">
                                <path fill="#000" d="M7.73732912,6.67985439 C7.75204857,6.69246326 7.76639529,
                                6.70573509 7.7803301,6.7196699 L9.65165045,8.59099025 C9.94454365,
                                8.8838835 9.94454365,9.3587572 9.65165045,9.65165045 C9.3587572,
                                9.94454365 8.8838835,9.94454365 8.59099025,9.65165045 L6.7196699,
                                7.7803301 C6.70573509,7.76639529 6.69246326,7.75204857 6.67985439,
                                7.73732912 C5.99121283,8.21804812 5.15353311,8.5 4.25,8.5 C1.90278981,
                                8.5 0,6.59721019 0,4.25 C0,1.90278981 1.90278981,0 4.25,0 C6.59721019,
                                0 8.5,1.90278981 8.5,4.25 C8.5,5.15353311 8.21804812,5.99121283
                                7.73732912,6.67985439 L7.73732912,6.67985439 Z M4.25,7.5 C6.04492544,
                                7.5 7.5,6.04492544 7.5,4.25 C7.5,2.45507456 6.04492544,1 4.25,1
                                C2.45507456,1 1,2.45507456 1,4.25 C1,6.04492544 2.45507456,7.5 4.25,
                                7.5 L4.25,7.5 Z"></path>
                            </svg>
                            </button>
                        </span>
                    </div>
                    <div class="separator">
                        <div class="filter-btn"><i class="fa fa-chevron-circle-up fa-2x"></i></div>
                    </div>
                    <div class="filter-tron">
                        <h4>Sesuaikan dengan keinginan anda</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Tempat Parkir</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" value="0" id="tempatparkir"
                                               name="tempatparkir"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Wifi</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="wifi" id="wifi"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Dapur</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="dapur" id="dapur"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Kamar Mandi Dalam</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="kmdalam" id="kmdalam"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Televisi</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="televisi" id="televisi"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Akses 24 Jam</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="jammalam" id="jammalam"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label col-lg-8">Lemari Es</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" class="check-input" name="lemaries" id="lemaries"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <input type="number" min="0" class="bukosan input-ui ui-primary" name="hargamin"
                                       placeholder="Harga Minimal"/>
                            </div>
                            <div class="col-lg-3">
                                <input type="number" min="0" class="bukosan input-ui ui-primary" name="hargamax"
                                       placeholder="Harga Maksimal"/>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
