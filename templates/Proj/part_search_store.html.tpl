<div id="search-panel" class="panel panel-primary collapse in" aria-expanded="true">
    <div class="panel-heading">
        <h3 class="panel-title">{RES:title}</h3>

    </div>

    <form class="form-horizontal" method="post" name="{search_form}">
        <div class="panel-body">


            <div class="form-group row">
                <label class="col-sm-2 control-label text-right"><label>{RES:part}</label></label>
                <div class="col-sm-10">
                    <input type="text"  value="{s_part_code}" name="s_part_code" id="s_part_code" placeholder="{RES:part_code}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label text-right"><label>{RES:store}</label></label>
                <div class="col-sm-10">
                    <input type="text" value="{s_store_code}" name="s_store_code" id="s_store_code" placeholder="{RES:store_code}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label text-right"><label>{RES:store_name}</label></label>
                <div class="col-sm-10">
                    <input type="text" value="{s_name}" name="s_name" id="s_name" placeholder="Nome Magazzino" class="form-control">
                </div>
            </div>


</div>
        <div class="panel-footer">
            <div class="form-group row">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input class = "btn btn-primary"  type="submit" name="{search_submit}" value="{RES:search}"> &nbsp;
                    <input class = "btn btn-success"  type="submit" name="{search_reset}"  value="{RES:reset}">
                </div>
            </div>
        </div>



    </form>
</div>
<script type="text/javascript">
    var element = document.getElementById('s_quantity');
    element.value = '{s_quantity}';


</script>