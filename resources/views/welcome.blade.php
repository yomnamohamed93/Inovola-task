<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .card-title ,.main-title , .card-footer .text-muted{
                color: royalblue  !important;
            }
            .card-text{
                color: orangered !important;
            }
            small.text-muted{
                color: #6c757dd1 !important;
                font-weight: 500 !important;
                font-size: 75% !important;
            }
         </style>
    </head>
    <body>
        <div class="py-5">
                <div class="container">
                    <div class="d-flex pb-5 justify-content-between">
                        <h1 class="text-center main-title">Daily News</h1>
                        <select class="form-control" style="width:30% !important" id="sorting">
                            <option value="">Sort by</option>
                            <option value="rating-asc">rating asc</option>
                            <option value="rating-desc">rating desc</option>
                            <option value="datetime-asc">date asc</option>
                            <option value="datetime-desc">date desc</option>
                        </select>
                    </div>

                    <div class="row pt-4" id="news-wrapper">
                        @foreach ($news_data as $item)
                            <div class="col-4 py-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pb-4">
                                            <h4 class="card-title mb-0">{{$item["title"]}}</h4>
                                            <small class="card-subtitle text-muted">{{$item["datetime"]}}</small>
                                        </div>
                                        <p class="card-text">{{$item["Content"]}}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div class="text-muted">Rating: {{$item["rating"]}}</div>
                                        <div class="text-muted">Source: {{$item["source"]}}</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                     </div>
                </div>
            </div>
            <input type="hidden"  id="token" name="_token" value="{{ csrf_token() }}" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
             let BASE_URL="{{url('/') }}";
        </script>
        <script src="{{asset('assets/main.js')}}"></script>
    </body>
</html>
