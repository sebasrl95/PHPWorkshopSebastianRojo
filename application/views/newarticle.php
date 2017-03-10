 <section>
        <div class="td-container" id="td-new-article">
            <div class="row">
                <div class="td-container-app">
                    <?php echo form_open_multipart('article/insert', array('id' => 'form_save')) ?>
                     <div id="td-loading" class="hidden">
                        <div class="td-loading-container">
                            <img src="http://lorempixel.com/1200/900/sports/" class="img-responsive thumbnail">
                            <p>Loading...</p>
                        </div>
                    </div> 
                    <div class="td-header">
                        <div class="col-xs-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-lg-6">
                                    <a href="{{url_back}}" class="pull-left">Go back</a>    
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <div class="pull-right">
                                        <?php echo form_submit('Save') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-12">
                        <div class="form-group">
                            <img id="td-image-article" src="{{url_back}}assets/img/default-thumbnail.jpg" name="td-image-article" class="img-responsive" class="img-responsive thumbnail">
                        </div>
                        
                        <?php echo form_input_file('Choose image') ?>
                        <?php echo form_input_text('title', 'Title') ?>
                        <?php echo form_input_textarea('description', 'Description') ?>
                        <p id="td-message" class="text-center"></p>
                    </div>
                     <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/handlebars-v4.0.5.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Compile article content
        var articlecontext = {
            title: '<?php echo $title; ?>',
            url_back: '<?php echo $base_url; ?>'
        }
        tresd.compileTemplate("#td-new-article", articlecontext);

        $('#userfile').change(function () {
            var file = $("#userfile")[0].files[0];
            var reader = new FileReader();
            
            if (file) {
                reader.readAsDataURL(file);
                reader.onloadend = function () {
                    $('#td-image-article').attr('src', reader.result);
                }
            } else {
                $('#td-image-article').attr('src', '<?php echo $base_url ?>assets/img/default-thumbnail.jpg');
            }
        });

         
    });

    $("#form_save").submit( function (event) {
            var formdata = new FormData($(this)[0]);
            var formdataserialized = $(this).serialize();
             $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                url: $(this).attr('action'),
                data: formdata,
                beforeSend: function () {
                    $("#td-loading").removeClass("hidden");
                },
                success: function(jsonData)
                {
                    $("#td-loading").addClass("hidden");
                },
                error: function(jsonData)
                {
                    $("#td-loading").addClass("hidden");
                    console.log(jsonData);
                }
            });

            event.preventDefault();
        });
</script>