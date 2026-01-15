@extends('layouts.app') @section('content')
    <div class="section">
        <h2 style="text-align:center; margin-bottom:30px;">Daftar Provinsi</h2>
        <div class="grid"> <a href="/provinces/bali" class="card-link">
                <div class="card"> <img src="/images/bali.jpg" alt="Bali">
                    <div class="card-body">
                        <h4>Bali</h4>
                        <p>Pulau Dewata</p>
                    </div>
                </div>
            </a> <a href="/provinces/ntb" class="card-link">
                <div class="card"> <img src="/images/ntb.jpg" alt="NTB">
                    <div class="card-body">
                        <h4>Nusa Tenggara Barat</h4>
                        <p>Nusa Tenggara Barat</p>
                    </div>
                </div>
            </a> <a href="/provinces/jawa-barat" class="card-link">
                <div class="card"> <img src="/images/jawa-barat.jpg" alt="Jawa Barat">
                    <div class="card-body">
                        <h4>Jawa Barat</h4>
                        <p>Provinsi dengan budaya Sunda yang kental</p>
                    </div>
                </div>
            </a> <a href="/provinces/jawa-timur" class="card-link">
                <div class="card"> <img src="/images/jawa-timur.jpg" alt="Jawa Timur">
                    <div class="card-body">
                        <h4>Jawa Timur</h4>
                        <p>Provinsi di ujung timur Pulau Jawa</p>
                    </div>
                </div>
            </a> </div>
    </div>
@endsection
