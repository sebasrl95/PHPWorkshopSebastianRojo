 <section>
        <div class="td-container" id="td-new-article">
            <div class="row">
                <div class="td-container-app">
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
                                    <a href="{{base_url}}article/newarticle" class="pull-right"><strong>Save</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-12">
                        <img id="td-image-article" src="http://lorempixel.com/1200/900/sports" alt="" class="img-responsive thumbnail">
                        <?php echo form_open_multipart('article/insert') ?>
                        <?php echo form_input_file('Selecciona imagen') ?>
                        <?php echo form_input_text('title', 'Title') ?>
                        <?php echo form_input_textarea('description', 'Description') ?>
                        <?php echo form_close(); ?>
                        <p id="td-message" class="text-center"></p>
                    </div>
                     
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/handlebars-v4.0.5.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Compile article content
        var articlecontext = {
            title: '<?php echo $title; ?>',
            url_back: '<?php echo $base_url; ?>'
        }
        tresd.compileTemplate("#td-new-article", articlecontext);
    });
</script>