<!DOCTYPE html>
<html>
<head>



    <title>{RES:ProjectName}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


    <!--  Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>
{Controller:examples\cms\NavigationBar}

<div class="container">
    <h1>{RES:Movimentazione}</h1>
    <form name="part_record_form" id="part_record_form" method="post" class="form-horizontal">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h1 class="panel-title">{FormTitle}</h1>
            </div>

            <div class="panel-body">

                <!-- BEGIN ValidationErrors -->
                <div class="form-group col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="alert alert-danger alert-dismissible col-sm-10" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>{RES:errormsg}
                        <br/>
                        <span id="campione_record_inccampioneErrorBlock">{Error}</span>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <!-- END ValidationErrors -->

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:ID_movement}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="good_movement_id" value="{good_movement_id}" placeholder="ID" required {readonly}>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:data}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>


                        <div class="form-row show-inputbtns">
                            <input type="date" name="movement_date" value="{movement_date}"/>
                        </div>


                    </div>
                </div>


                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:part_code}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="part_code" value="{part_code}" placeholder="part code" required>
                    </div>
                </div>


                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:get_from}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>

                        <input type="text" class="form-control" name="store_name_out" value="{store_name_out}" placeholder="Magazzino prelievo" required>

                        <!--  <select class="form-control" name="store_name_out" value= "{store_name_out}" id="store_type_code" required>
                            <!--     <option value="">{RES:name_type}</option>
                            <!-- BEGIN part_type_code_list -->
                        <!-- <option value="{store}">{name}</option>
                            <!-- END part_type_code_list -->
                        <!-- </select> -->
                    </div>
                </div>



                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:move_to}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="store_name_in" value="{store_name_in}" placeholder="Magazzino deposito" required>

                        <!--  <select class="form-control" name="store_name_in" value= "{store_name_in}" id="store_type_code" required>
                            <!--    <option value="">{RES:name_type}</option>
                            <!-- BEGIN part_type_code_list -->
                        <!--  <option value="{store}">{name}</option>
                            <!-- END part_type_code_list -->
                        <!--  </select> -->
                    </div>
                </div>


                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:quantity}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="quantity" value= "" placeholder="quantity to move" required>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="form-group text-center">
                    <label class="col-sm-1 control-label"></label>
                    <div class="col-sm-10">
                        {Record:PartManagerRecord}
                    </div>
                </div>
            </div>

        </div>
        <a href="http://localhost/webmvc_nostro/Proj/move_c" type="btn btn-primary">Go back</a>

    </form>

</div>
<script type="text/javascript">
    // Sets all form selects option value

    /** Method 1
     var element = document.getElementById('part_type_code');
     element.value = '{part_type_code}';
     */

    // Method 2 - Better (do not change values when reset button is pressed)
    // $("#source option[value={source}]").attr('selected','selected');

    $('input[name=source][value="{source}"]').prop('checked', true);

    var store_type_code = '{store_type_code}';
    if (store_type_code != '')
        $("#store_type_code option[value={store_type_code}]").attr('selected','selected');

</script>
</body>
</html>