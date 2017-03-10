<div id="main-content">
    <section>
        <div class="td-container">
            <div class="row">
                <div class="td-container-app">
                     <div id="td-loading">
                        <div class="td-loading-container">
                            <img src="<?php echo $base_url ?>assets/img/hourglass.svg" class="img-responsive">
                            <h1>Articles APP</h1>
                            <p>Loading...</p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/handlebars-v4.0.5.js"></script>

<script id="template-content" type="text/x-handlebars-template">
    <section>
        <div class="td-container">
            <div class="row">
                <div class="td-container-app">
                    <div id="td-loading" class="hidden">
                        <div class="td-loading-container">
                            <img src="<?php echo $base_url ?>assets/img/hourglass.svg" class="img-responsive">
                            <p>Loading...</p>
                        </div>
                    </div>
                    <div class="td-header">
                        <div class="col-xs-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-lg-6">
                                    <h1>{{title}}</h1>    
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <a href="{{base_url}}article/newarticle" class="pull-right"><strong>New article</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                        <p id="td-message" class="text-center"></p>
                        {{#each articles}}
                            <a href="{{base_url}}article/post/{{id_article}}">
                                <div class="td-article-container">
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-4">
                                            <div class="td-article-image">
                                                <img src="{{base_url}}assets/img/{{image_name}}" class="img-responsive">
                                            </div>    
                                        </div>
                                        <div class="col-xs-8 col-lg-8">
                                            <div class="td-article-content">
                                                <h2>{{title}}</h2>
                                                <p>{{description}}</p>
                                            </div>
                                        </div>
                                        <a onclick="tresd.deleteArticle('{{id_article}}')" class="td-article-close" >Delete</a>
                                    </div>
                                </div>
                            </a>
                        {{/each}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var existarticle = false;

        setTimeout(function(){ 
            // Compile main content
            var maincontext = {
                title: '<?php echo $title; ?>', 
                articles: <?php echo json_encode($articles); ?>,
                base_url: '<?php echo $base_url; ?>'
            }
            if (maincontext.articles.length < 1) {
                existarticle = true;
            }
            Handlebars.registerHelper('base_url', function() {
                return new Handlebars.SafeString('<?php echo $base_url; ?>');
            });

            tresd.compileTemplate("#template-content", maincontext); 

            $("#main-content").html($("#template-content").html());

            if (existarticle) {
                $("#td-message").append('No articles at the moment');
            }
        }, 5000);

    });
</script>