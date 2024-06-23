@extends('layouts.app')

@section('dashboard')
    <style>
        .card {
            height: 100%;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <p class="card-text display-4 text-center">{{ $totalEmployees }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active Employees</h5>
                        <p class="card-text display-4 text-center">{{ $activeEmployees }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inactive Employees</h5>
                        <p class="card-text display-4 text-center">{{ $deactiveEmployees }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Time</h5>
                            <p id="time" class="card-text display-4 text-center"></p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function updateTime() {
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric',
                        second: 'numeric',
                        timeZone: 'Asia/Jakarta'
                    };

                    const now = new Date();
                    const formattedTime = now.toLocaleDateString('en-US', options);
                    document.getElementById('time').textContent = formattedTime;
                }

                updateTime();
                setInterval(updateTime, 1000); // Update time every second
            </script>
        </div>

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Agung Nugroho</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
