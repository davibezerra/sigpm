<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <meta http-equiv="content-language" content="pt-br" />
        <meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo @$system->nome; ?>: <?php echo @$system->descricao; ?>">
           
	<meta name="viewport" content="width=device-width" />

        <title><?php echo @$system->nome; ?></title>
        
	<link rel="stylesheet" href="css/jquery.mobile-1.3.1.min.css" />
	<link rel="stylesheet" href="css/handheld.css" />
        
        <script type="text/javascript" src="js/lib/jquery.latest.min.js"></script>
        <script src="js/lib/jquery.mobile-1.3.1.min.js"></script>
        
        <script>
            $(document).on("swipeleft", function(event, ui) {
            $("#menu").panel("close");
            });
            $(document).on("swiperight", function(event, ui) {
            $("#menu").panel("open");
            });
        </script>

    </head>
    <body>
        <div data-role="page">
            <div data-role="panel" id="menu" data-display="push" data-dismissible="false">
        <ul data-role="listview">
        	<li data-icon="delete" data-theme="b"><a href="#" data-rel="close">Menu Principal</a></li>
        	<li><a href="#">Funções acessadas</a></li>
        	<li><a href="#">Menu Principal</a></li>
        </ul>

          <div data-role="collapsible-set" data-inset="false" data-iconpos="right" data-content-theme="d">

            <div data-role="collapsible">

              <h3>Ocorrências</h3>

              <ul data-role="listview">
                <li data-mini="true"><a href="#" data-iconpos="notext">Ocorrências</a></li>
                <li data-mini="true"><a href="#">Estatísticas</a></li>
              </ul>

            </div>

            <div data-role="collapsible">

              <h3>Ações Policiais</h3>

              <ul data-role="listview">
                <li data-mini="true"><a href="#">Estatísticas</a></li>
                <li data-mini="true"><a href="#">Relatório de Guarnição</a></li>
              </ul>

            </div>

            <div data-role="collapsible">

              <h3>Escalas</h3>

              <ul data-role="listview">
                <li data-mini="true"><a href="#">Permutas</a></li>
                <li data-mini="true"><a href="#">Comunicações</a></li>
                <li data-mini="true"><a href="#">Efetivo de Serviço</a></li>
              </ul>

            </div>

		  </div>

        </div>
<div data-role="header" data-theme="b">
    <a href="#menu" data-icon="bars" data-theme="b" data-iconpos="notext">Menu</a>
    <h1>SIGPM</h1>
    <a href="/sessoes/sair" data-icon="delete" data-theme="b" data-iconpos="right">Sair</a>
</div>     
        <div data-role="content" id="conteudo">