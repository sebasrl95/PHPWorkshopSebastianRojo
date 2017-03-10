<script type="text/javascript">

    var tresd = {
        compileTemplate: function (idcontent, context) {
            var content = $(idcontent).html();
            var template = Handlebars.compile(content);
            var html = template(context);
            $(idcontent).html(html);
        },
        deleteArticle: function (id) {
            var cont = confirm('Are you sure?');

            if (cont) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url ?>article/delete/'+id,
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
            }
        }
    }
</script>
</body>
</html>