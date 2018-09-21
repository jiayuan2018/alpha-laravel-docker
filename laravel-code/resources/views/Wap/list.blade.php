<form method="post" action="/wap/index">

    {{csrf_field()}}

    <div class="form-group">

        <div class="col-sm-10">
            <input type="number" name="cash" class="form-control" placeholder="cash">
        </div>

        <div class="col-sm-10">
            <input type="text" name="trade_password" class="form-control" placeholder="trade_password">
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-primary" type="submit" >采用此方案</button>
        </div>
    </div>

</form>