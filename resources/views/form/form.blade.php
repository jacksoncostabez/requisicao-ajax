<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Requisição Ajax - Form</title>
</head>
<body>

    {{-- https://www.youtube.com/watch?v=BK52Rf_o-iY&t=1050s&ab_channel=RobsonV.Leite --}}

    <div class="container" style="margin-top: 100px;">
        {{--method="POST" action="{{ route('form.store') }}" --}}
        <form name="formLogin" style="max-width: 50%;">
            @csrf

            {{-- exibe as msgs de erros. --}}
            <div class="alert alert-danger d-none messageBox" role="alert"></div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="teste@teste.com">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" value="12345">
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    {{-- https://github.com/jquery-form/form --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('form[name="formLogin"]').submit(function (event) {
                event.preventDefault(); //tira o carregamento da página.

                // var email = $(this).find('input#email').val();
                $.ajax({
                    url: "{{ route('form.store') }}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            window.location.href = "{{ route('form.success') }}"
                            $('.messageBox').removeClass('d-none').removeClass('alert-danger').addClass('alert-success').html(response.message)
                        } else {
                            $('.messageBox').removeClass('d-none').removeClass('alert-success').addClass('alert-danger').html(response.message)
                        }
                        console.log(response);
                    }
                });
            });
        });
    </script>
</body>
</html>