<?php 
	include_once "header.php";
?>


        <p class="lead">Should be an admin and have an image to work!.</p>

        <!-- We're going to place the form here in the next step -->
        <form id="add-form"  role="form">
            <input type="hidden" name="act" value="1">
            <div class="messages"></div>
            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Your name: </label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email </label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email " >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_image">Image *: </label>
                            <input id="form_image" type="file" name="image" class="form-control" placeholder="Please upload an image" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" required="required" id="form_isadmin" name="isadmin">
                                <label class="form-check-label" id="form-check-label" for="form_isadmin" >
                                    Is admin? *
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>*</strong> These fields are required.</p>
                    </div>
                    <div class="col-md-12">
                        <input type="button" class="btn btn-success btn-send" id="add_btn" value="Add">
                    </div>
                </div>
            </div>

        </form>


<?php
	include_once "footer.php";
?>
