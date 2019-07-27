
<html lang="en">
	<head>
    <meta charset="utf-8">
    <title>Bootstrap 3 Form Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets3/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets3/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
      .conteudo{
        height: 400px;
        overflow-y: auto;
        overflow-x:hidden;
        margin-top: 15px;
      }
    </style>
  </head>
<body>
    <div class="container">
      <div class="row clearfix">
	          <!-- Components -->
        <div class="col-md-6">
          <h2>Arraste e Solte os componentes</h2>
          <hr>
          <div class="tabbable">
            <ul class="nav nav-tabs" id="formtabs">
              <!-- Tab nav -->
            </ul>
            <form class="form-horizontal" id="components" role="form">
              <fieldset>
                <div class="tab-content conteudo">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <!-- / Components -->
        <!-- Building Form. -->
        <div class="col-md-6">
          <div class="clearfix">
            <h2>Seu Formulário</h2>
            <hr>
            <div id="build">
              <form id="target" class="form-horizontal" style="padding-top: 100px;"></form>
            </div>
          </div>
        </div>
        <!-- / Building Form. -->
      </div>
    </div> <!-- /container -->
    <script data-main="assets3/js/main-built.js" src="assets3/js/lib/require.js"></script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
  </body>
</html>