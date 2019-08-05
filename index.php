<?php
  $dados = array();
  //
  if($_POST){
    if(isset($_POST['txt_cep'])){
      if(!empty($_POST['txt_cep'])){
        $url = "https://www.ipage.com.br/ws/v1/cep/";
        $url .= $_POST['txt_cep'] . "/json/";
        $url .= "Solicite a chave de acesso ao Web Service.";
        //
        $response = file_get_contents($url);
        $dados = (array)json_decode($response);
      }else{
        $dados = array('error'=>true, 'msg'=>'Ipage Webservice: Invalid CEP. Please contact technical support through our web site: www.ipage.com.br');
      }
    }
  }
?>
<!doctype html>
<html>
  <base href=""/>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- DEFINICAO META TAG //-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="automacao,comercial,desenvolvimento,sites,software,ocx,dll,visual basic,php,aplicacap web, manutencao,produtos">
    <meta name="description" content="Empresa lider em desenvolvimento de software. Oferece as melhores solucoes em produtos e servicos para o mercado">
    <meta name="author" content="Diogenes Dias de Souza Junior & IPAGE Informatica">
    <meta name="replyTo" content="atendimento@ipagesoftware.com.br">
    <!-- FIM DEFINICAO META TAG //-->
		<title>
			Ipage WebService CEP &reg; PHP
		</title>
    <style>
        ._fancybar{margin-top:50p !important;z-index: 5}
        /* ROTINA CEP */
        .ipage-result-cep{
          border: 1px solid #b6c5e4 !important;/*4d90fe*/
          background-color: #b6c5e4 !important;
          color: navy !important;
        }
    </style>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- OPEN GRAPH //-->
    <meta property="locale" content="pr_BR">
    <meta property="url" content="https://www.ipage.com.br">
    <meta property="title" content="LavoroX - sua aplica��o em nuvem.">
    <meta property="description" content="Empresa lider em desenvolvimento de software. Oferece as melhores solucoes em produtos e servicos para o mercado">
    <meta property="type" content="website">
    <meta property="og:image:" content="https://www.ipage.com.br/newipage/personal/images/recibo.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="612">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website">
    <!-- FIM OPEN GRAPH //-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="assets/css/bootsnipp.min.css"/>
    <link rel="stylesheet" href="ipage/css/loader.css"/>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
		<![endif]-->
	</head>
	<body>
  <div id="loader">
      <div class="loader-container">
        <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
  </div>
		<nav class="navbar navbar-fixed-top navbar-bootsnipp animate" role="navigation" style="z-index: 9999999">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">
							Toggle navigation
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
					</button>
					<div class="animbrand">
						<a class="navbar-brand animate" href="https://www.ipagesoftware.com.br/license_key/www/examples/">Ipage WebService CEP &reg; PHP</a>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					<ul class="nav navbar-nav navbar-right">
						<li class="">
							<a href="https://github.com/ipagesoftware" class="" target="_blank">Exemplos Github</a>
						</li>
						<li class="">
							<a href="https://www.ipagesoftware.com.br/license_key/www/examples/" class="" target="_blank">Projeto LavoroX</a>
						</li>
						<li>
							<a href="https://www.ipage.com.br" class="" target="_blank">Visite a Ipage &reg;</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
    <!-- //-->
		<div class="container" style="margin-top: auto; padding-top: 20px;">
<?php
    if(isset($dados['error'])){
      if($dados['error']){
        $msg  = '<div class="alert alert-danger">';
        $msg .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">';
        $msg .= '</button>';
        $msg .= $dados['msg'];
        $msg .= '</div>';
        echo($msg);
        $dados['cep'] = $_POST['txt_cep'];
      }
    }


?>
  		<form class="form-horizontal" action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
  			<fieldset>
  				<!-- Form Name -->
  				<legend>Formul�rio</legend>
  				<!--// //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="appendedtext">CEP:</label>
  					<div class="col-md-3">
  						<div class="input-group">
               <input id="txt_cep" name="txt_cep" class="form-control" type="text" value="<?php echo(isset($dados['cep'])? $dados['cep']:null) ?>" maxlength="9" data-type="mask" data-inputmask="cep" data-inputmask-inputformat="#####-###" data-inputmask-defaultvalue="" />
                <!-- Button -->
                <div class="input-group-addon" style="padding: 0; border: none;">
                    <button type="submit" class="btn"><i class="icon-search"></i> Pesquisar</button>
                </div>
  						</div>
  					</div>
  				</div>
          <hr />
  				<!--// TIPO LOGRADOURO //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Tipo Logradouro</label>
  					<div class="col-md-2">
  						<input id="tp_logradouro" type="text" class="form-control input-md" value="<?php echo(isset($dados['tp_logradouro'])? $dados['tp_logradouro']:null) ?>"/>
  					</div>
  				</div>
  				<!--// LOGRADOURO //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Logradouro:</label>
  					<div class="col-md-8">
  						<input id="logradouro" type="text" class="form-control input-md" value="<?php echo(isset($dados['logradouro'])? $dados['logradouro']:null) ?>"/>
  					</div>
  				</div>
  				<!--// LOGRADOURO2 //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Logradouro Completo:</label>
  					<div class="col-md-8">
  						<input id="logradouro2" type="text" class="form-control input-md" value="<?php echo(isset($dados['logradouro2'])? $dados['logradouro2']:null) ?>"/>
  					</div>
  				</div>
  				<!--// COMPLEMENTO //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Complemento:</label>
  					<div class="col-md-8">
  						<input id="complemento" type="text" class="form-control input-md" value="<?php echo(isset($dados['complemento'])? $dados['complemento']:null) ?>"/>
  					</div>
  				</div>
  				<!--// IBGE //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">IBGE:</label>
  					<div class="col-md-2">
  						<input id="ibge" type="text" class="form-control input-md" value="<?php echo(isset($dados['ibge'])? $dados['ibge']:null) ?>"/>
  					</div>
  				</div>
  				<!--// GIA //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">GIA:</label>
  					<div class="col-md-2">
  						<input id="gia" type="text" class="form-control input-md" value="<?php echo(isset($dados['gia'])? $dados['gia']:null) ?>"/>
  					</div>
  				</div>
  				<!--// BAIRRO //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Bairro:</label>
  					<div class="col-md-4">
  						<input id="bairro" type="text" class="form-control input-md" value="<?php echo(isset($dados['bairro'])? $dados['bairro']:null) ?>"/>
  					</div>
  				</div>
  				<!--// CIDADE //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Cidade:</label>
  					<div class="col-md-6">
  						<input id="cidade" type="text" class="form-control input-md" value="<?php echo(isset($dados['cidade'])? $dados['cidade']:null) ?>"/>
  					</div>
  				</div>
  				<!--// UF //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">UF:</label>
  					<div class="col-md-2">
  						<input id="uf" type="text" class="form-control input-md" value="<?php echo(isset($dados['uf'])? $dados['uf']:null) ?>"/>
  					</div>
  				</div>
  				<!--// DDD //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">DDD:</label>
  					<div class="col-md-2">
  						<input id="ddd" type="text" class="form-control input-md" value="<?php echo(isset($dados['ddd'])? $dados['ddd']:null) ?>"/>
  					</div>
  				</div>
  				<!--// DIST�NCIA DA CAPITAL //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">DDD:</label>
  					<div class="col-md-2">
  						<input id="distancia_da_capital" type="text" class="form-control input-md" value="<?php echo(isset($dados['distancia_da_capital'])? $dados['distancia_da_capital']:null) ?>"/>
  					</div>
  				</div>
  				<!--// FAIXA DE CEP //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Faixa de CEP:</label>
  					<div class="col-md-3">
  						<input id="faixa_de_cep" type="text" class="form-control input-md" value="<?php echo(isset($dados['faixa_de_cep'])? $dados['faixa_de_cep']:null) ?>"/>
  					</div>
  				</div>
  				<!--// FAIXA DE CEP //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Gentilico:</label>
  					<div class="col-md-4">
  						<input id="gentilico" type="text" class="form-control input-md" value="<?php echo(isset($dados['gentilico'])? $dados['gentilico']:null) ?>"/>
  					</div>
  				</div>
  				<!--// DIST�NCIA DA CAPITAL //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Latitude:</label>
  					<div class="col-md-2">
  						<input id="latitude" type="text" class="form-control input-md" value="<?php echo(isset($dados['latitude'])? $dados['latitude']:null) ?>"/>
  					</div>
  				</div>
  				<!--// DIST�NCIA DA CAPITAL //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Longitude:</label>
  					<div class="col-md-2">
  						<input id="longitude" type="text" class="form-control input-md" value="<?php echo(isset($dados['longitude'])? $dados['longitude']:null) ?>"/>
  					</div>
  				</div>
  				<!--// REGI�O //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Regi�o:</label>
  					<div class="col-md-4">
  						<input id="regiao" type="text" class="form-control input-md" value="<?php echo(isset($dados['regiao'])? $dados['regiao']:null) ?>"/>
  					</div>
  				</div>
  				<!--// MESOR REGI�O //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Mesor Regi�o:</label>
  					<div class="col-md-4">
  						<input id="mesorregiao" type="text" class="form-control input-md" value="<?php echo(isset($dados['mesorregiao'])? $dados['mesorregiao']:null) ?>"/>
  					</div>
  				</div>
  				<!--// MICROR REGI�O //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Micror Regi�o:</label>
  					<div class="col-md-4">
  						<input id="microrregiao" type="text" class="form-control input-md" value="<?php echo(isset($dados['microrregiao'])? $dados['microrregiao']:null) ?>"/>
  					</div>
  				</div>
  				<!--// MICROR REGI�O //-->
  				<div class="form-group">
  					<label class="col-md-2 control-label" for="textinput">Tempo Percurso Ve�culo:</label>
  					<div class="col-md-4">
  						<input id="tempo_percurso_veiculo" type="text" class="form-control input-md" value="<?php echo(isset($dados['tempo_percurso_veiculo'])? $dados['tempo_percurso_veiculo']:null) ?>"/>
  					</div>
  				</div>
          <!-- //-->

  			</fieldset>
  		</form>
    </div>
    <!-- //-->
		<footer class="bs-footer" role="contentinfo">
			<div class="container">
				<div class="bs-social">
					<ul class="bs-social-buttons">
						<li class="follow-btn">
							<a id="js-twitter-follow" href="https://twitter.com/ipage_software" class="twitter-follow-button" data-show-count="false">Seguir @ipage_software</a>
						</li>
						<li class="tweet-btn">
							<a id="js-twitter-tweet" href="https://twitter.com/share" class="twitter-share-button" data-url="https://twitter.com/ipage_software" data-text="Ag�ncia de Desenvolvimento Web #LavoroX framework HTML/CSS/JS"
							data-via="lavoroX" data-related="LavoroX">Tweet</a>
						</li>
					</ul>
				</div>
				<p>
					Copyright Di�genes Dias &copy; <?php echo date("Y"); ?>
					<a href="http://www.ipage.com.br" target="_blank">Ipage Software</a>
				</p>
			</div>
		</footer>
		<script src="assets/js/jquery-1.11.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/scripts.min.js"></script>
    <!-- start: PACOTE JAVASCRIPT IPAGE WEBSERVICE CEP //-->
    <script src="ipage/js/ipage-wscep.js"></script>
    <script type="text/javascript" src="ipage/js/jquery-mask/jquery.mask.min.js"></script>
    <script src="ipage/js/index.js"></script>
    <!-- end: PACOTE JAVASCRIPT IPAGE WEBSERVICE CEP //-->
	</body>
</html>