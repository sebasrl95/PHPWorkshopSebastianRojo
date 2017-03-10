 <section>
        <div class="td-container" id="td-single-article">
            <div class="row">
                <div class="td-container-app">
                    <?php echo form_open_multipart('article/update', array('id' => 'form_save')) ?>
                     <div id="td-loading" class="hidden">
                        <div class="td-loading-container">
                            <img src="<?php echo $base_url ?>assets/img/hourglass.svg" class="img-responsive">
                            <h1>Articles APP</h1>
                            <p>Loading...</p>
                        </div>
                    </div> 
                    <div class="td-header">
                        <div class="col-xs-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-lg-6">
                                    <a href="{{base_url}}" class="pull-left">Go back</a>    
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <div class="pull-right">
                                        <?php echo form_submit('Update') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-12">
                        <a onclick="tresd.deleteArticle('{{id_article}}')" class="td-article-close pull-right" >Delete</a>
                        <div class="form-group">
                            <img id="td-image-article" src="{{base_url}}assets/img/{{image_name}}" name="td-image-article" class="img-responsive" class="img-responsive thumbnail">
                        </div>
                        <?php echo form_input_text('id_article', '', array('value' => $article[0]->id_article, 'style' => 'display:none;')); ?>
                        <?php echo form_input_text('image_file', '', array( 'style' => 'display:none;')); ?>
                        <div class="form-group">
                            <input id="userfile" type="file" name="userfile">
                        </div>
                        
                        <?php echo form_input_text('title', 'Title', array('value' => $article[0]->title)) ?>
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
        $("#form_save").attr('novalidate', 'true');
        var article = <?php echo json_encode($article); ?>;
            
        var articlecontext = {
            id_article: article[0].id_article,
            title: article[0].title,
            image_name: article[0].image_name,
            description: article[0].description,
            base_url: '<?php echo $base_url; ?>',
        }
            
        tresd.compileTemplate("#td-single-article", articlecontext);
        $("#description").val(article[0].description);

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

            $("#image_file").val(file.name);
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