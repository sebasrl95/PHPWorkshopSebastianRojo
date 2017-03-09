<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/td-main.css">
</head>
<body>
    <section>
        <div class="td-container">
            <div class="row">
                <div class="td-container-app">
                    <!--<div id="td-loading">
                        <div class="td-loading-container">
                            <img src="http://lorempixel.com/1200/900/sports/" class="img-responsive thumbnail">
                            <p>Loading...</p>
                        </div>
                    </div>-->
                    <div class="td-header">
                        <div class="col-xs-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-lg-6">
                                    <h1>All Articles</h1>    
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <a href="#" class="pull-right"><strong>New article</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">

                            <div class="td-article-container">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <div class="td-article-image">
                                            <img src="http://lorempixel.com/1200/900/sports/" alt="" class="img-responsive">
                                        </div>    
                                    </div>
                                    <div class="col-xs-8 col-lg-8">
                                        <div class="td-article-content">
                                            <h2>Title</h2>
                                            <p>Description</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="td-article-container">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <div class="td-article-image">
                                            <img src="http://lorempixel.com/1200/900/sports/" alt="" class="img-responsive">
                                        </div>    
                                    </div>
                                    <div class="col-xs-8 col-lg-8">
                                        <div class="td-article-content">
                                            <h2>Title</h2>
                                            <p>Description</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/handlebars-v4.0.5.js"></script>
</body>
</html>