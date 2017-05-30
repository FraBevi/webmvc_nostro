<!DOCTYPE html>
<html>
<head>
    <title>Listing, paginating, sorting and searching</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
{Controller:examples\cms\NavigationBar}
<div class="container">
    <h1>{RES:title}</h1>

    {Searcher:ricerca}
    <a href="part_record/add/new" class="btn btn-info"><span class="glyphicon glyphicon-plus-sign"></span> {RES:add_part}</a>
    <div class="table table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>

                <th>{SorterBootstrap:good_movement_id}</th>
                <th>{SorterBootstrap:movement_date}</th>
                <th>{SorterBootstrap:part_code}</th>
                <th>{SorterBootstrap:store_code}</th>
                <th>{SorterBootstrap:operation_type}</th>
                <th>{SorterBootstrap:quantity}</th>



            </tr>
            </thead>
            <tbody>
            <!-- BEGIN Parts -->
            <tr>
                <td><a href="part_record/open/{good_movement_id}">{good_movement_id}</a></td>
                <td>{movement_date}</td>
                <td>{part_code}</td>
                <td>{store_code}</td>
                <td>{operation_type}</td>
                <td>{quantity}</td>




            </tr>
            <!-- END Parts -->
            </tbody>
            <tfoot>
            <tr>
                <td class = "text-center" colspan="9">{PaginatorBootstrap:Bottom}</td>
            </tr>
            </tfoot>
        </table>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>