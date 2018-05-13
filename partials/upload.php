<div class="row col-md-8 col-md-offset-2 text-center">
    <?php if (isset($message)){ echo $message; }?>
    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?=htmlentities($_SERVER['PHP_SELF']); ?>">

        <div class="form-group">
            <label for="file" class="col-sm-2 control-label ">JPG Upload</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="uploaded_file">
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Image title</label>
            <div class="col-sm-10">
                <input class="form-control" id="title" placeholder="required field" name="title">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input class="form-control" id="description" name="description">
            </div>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Upload It"/>
    </form>
</div>
