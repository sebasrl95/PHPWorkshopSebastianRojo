<script type="text/javascript">

    var tresd = {
        compileTemplate: function (idcontent, context) {
            var content = $(idcontent).html();
            var template = Handlebars.compile(content);
            var html = template(context);
            $(idcontent).html(html);
        }
    }
</script>
</body>
</html>