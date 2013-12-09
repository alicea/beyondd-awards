<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/bootstrap-theme.min.css'); }}
    {{ HTML::style('css/styles.css'); }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        <div class="container">
            @yield('content')
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/jquery.validate.min.js'); }}

    {{ HTML::script('js/typeahead.min.js'); }}
    {{ HTML::script('js/script.js'); }}

    <?php $i = 1; ?>
    <?php $length = count($names); ?>
      <script type="text/javascript">
        $(window).load(function(){  
            $('.item .typeahead').typeahead({                                
              name: 'names',                                                          
              local: [
                @foreach($names as $key => $name)
                '{{ $name->name }}'@if ($i != $length), @endif
                <?php $i++; ?>
                @endforeach
              ],                                         
              limit: 10                                                                   
            });

            $('.list-group-item').on('click', function(e){
                e.preventDefault();
                var name = $(this).data('value');
                $('.item.active').find('.name').val(name);
            });

        });

      </script>
    </body>
</html>