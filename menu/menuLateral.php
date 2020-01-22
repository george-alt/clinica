<?php
        $URL_ATUAL= substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], '/')+1);
        
        $pattern = "/clinica/";
        $subject = $URL_ATUAL;
        $matches = array();
        
        # Executa nossa expressão
        $resultado = preg_match($pattern, $subject, $matches);
        
        if($resultado > 0)
        {
               $newUrl = explode("/",$URL_ATUAL);
               $URL_ATUAL = $newUrl[1];
        }
        

?>
<script>
        
</script>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">titulo para o menu</li>
                        <li>
                                <a href="index.php"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
                        </li>
                        <li>
                                <a href="paciente.php"><i class="fa fa-wheelchair"></i> <span>Paciente</span></a>
                        </li>
                        <li>
                                <a href="colaboradores.php"><i class="fa fa-user-md"></i> <span>Colaboradores</span></a>
                        </li>
                        <li>
                                <a href="servico_cirurgico.php"><i class="fa fa-hospital-o"></i> <span>Serviço Cirurgico</span></a>
                        </li>
                        
                        <!--<li class="submenu">
                                <a href="#"><i class="fa fa-server"></i> <span> Serviço Cirgurgico </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                        <li><a href="cirurgia.php">Cirurgia</a></li>
                                        <li class="submenu">
                                                <a href="#"><i class="fa fa-server"></i> <span> Pré-Operatório </span> <span class="menu-arrow"></span></a>
                                                <ul style="display: none;">
                                                        <li><a href="consulta.php">Consulta</a></li>
                                                        <li><a href="checkList.php">Check-List</a></li>
                                                        <li><a href="evolucao.php">Evolução</a></li>
                                                </ul>
                                        </li>
                                        <li class="submenu">
                                                <a href="#"><i class="fa fa-server"></i> <span>Trans-Operatório </span> <span class="menu-arrow"></span></a>
                                                <ul style="display: none;">
                                                        <li class="submenu">
                                                                <a class="" href="#"><i class="fa fa-server"></i> <span> CheckList 1 </span> <span class="menu-arrow"></span></a>
                                                                <ul style="display: none;">
                                                                        <li><a class="trans1" href="trans1.php">CheckList 1.1</a></li>
                                                                        <li><a class="trans1.1" href="trans1.1.php">Check-List 1.2</a></li>
                                                                        <li><a class="trans1.2" href="trans1.2.php">CheckList 1.3</a></li>
                                                                </ul>
                                                        </li>
                                                        <li><a href="#">CheckList Trans 2</a></li>
                                                        <li><a href="#">CheckList Trans 3</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="#">Pós-Operatório</a></li>
                                </ul>
                        </li>-->
			
                    </ul>
                </div>
            </div>
        </div>