<html>

<head>
    <meta charset="utf-8">
    <title>Status complaints</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laporan.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Balinese&family=Noto+Serif+SC:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.cs') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="body">
    <div class="container">
        <div class="centered-element">
            <div id="dialog" class="dialog-page">
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list-modal">
                                    <div class="row">
                                        @if (session('success'))
                                            <div id="lives">
                                                <div class="check-alert">
                                                    <i class="far fa-check-circle color-alert"></i> &nbsp; &nbsp;
                                                    <span>Well Done! {{ session('success') }}</span>
                                                </div>
                                            </div>
                                        @elseif ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div id="lives">
                                                    <div class="danger-alert">
                                                        <i class="far fa-times-circle shine-alert"></i>
                                                        &nbsp; &nbsp;
                                                        <span>Wrong! {{ $error }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="container-fluid">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col">

                                                    </div>
                                                    <div class="col">
                                                        <h5 class="mb-3"
                                                            style="text-align: center; color:black; margin:15px 0px; font-family: Noto Serif Balinese;font-weight:bold">
                                                            Check Status
                                                        </h5>
                                                    </div>
                                                    <div class="col" style="text-align:right">
                                                        <a href="{{ route('index-announs') }}"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <form action="{{ route('search') }}" method="GET">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td style="width: 95%"><input class="form-control"
                                                                    type="text" name="q"
                                                                    placeholder="your ticket ?"></td>
                                                            <td style="width:5%"><button type="submit"
                                                                    class="btn btn-primary"><i
                                                                        class="fa-solid fa-magnifying-glass"
                                                                        style="font-size: 16px; padding:4px"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group m-1 mt-3">
                                                        <div style="font-size: 11px; color:blue"><i>Confirm you are a
                                                                real
                                                                human*</i>
                                                        </div>
                                                        <div class="g-recaptcha" data-type="image"
                                                            data-sitekey="6LeHdREpAAAAABrbVmCXcDxyls1Pgj7t1qtT5oPF">
                                                        </div>
                                                    </div>
                                                </form>
                                                @if (isset($query))
                                                    <p>Search results for tickets: {{ $query }}</p>
                                                @endif

                                                @if (isset($data))
                                                    @foreach ($data as $item)
                                                        <table class="table table-striped table-bordered"
                                                            style="font-family: math; font-size:16px">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Ticket</th>
                                                                    <td>{{ $item->ticket }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{ $item->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Site</th>
                                                                    <td>{{ $item->site }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Complaint</th>
                                                                    <td>{{ $item->complaints }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Expectation</th>
                                                                    <td>{{ $item->expectation }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Status</th>
                                                                    @if ($item->status == '0')
                                                                        <td>Unprocessed</td>
                                                                    @elseif ($item->status == '1')
                                                                        <td>Data is being transferred</td>
                                                                    @elseif ($item->status == '2')
                                                                        <td>Data being worked on</td>
                                                                    @elseif ($item->status == '3')
                                                                        <td>The complaint has been resolved</td>
                                                                    @endif
                                                                </tr>
                                                                <tr>
                                                                    <th>Created_at</th>
                                                                    <td>{{ $item->created_at }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Updated_at</th>
                                                                    <td>{{ $item->updated_at }}</td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <p style="text-align: center" class="mt-2">Want to submit a complaint ? <a
                                                    href="{{ route('index-laporan') }}"> Report</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper" id="icon-menu">
        <input type="checkbox" />
        <div class="fab"></div>
        <div class="fac">
            <div class="new"><a href="{{ route('index-announs') }}" class=""><i
                        class="fa-solid fa-bell"></i></a>
                <span style="margin: 50px" class="new-text">Announcements</span>
            </div>

            <div class="new"><a href="{{ route('index-status') }}"><i class="fa-solid fa-inbox"></i></a>
                <span style="margin: 50px" class="new-text">Check status</span>
            </div>
            <div class="new"><a href="{{ route('index-laporan') }}"><i
                        class="fa-solid fa-envelope-open-text"></i></a>
                <span style="margin: 50px" class="new-text">Report complaint</span>
            </div>
            <div class="new"><a href="{{ route('login') }}" class=""><i class="fa-solid fa-house"></i></a>
                <span style="margin: 50px" class="new-text">Home</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>