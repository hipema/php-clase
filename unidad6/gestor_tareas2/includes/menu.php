
    <div id="barra-menu">
        <a href="#" class="bt-menu"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
    </div>
    <nav id="menu">
        <ul>
        <?php
            foreach ($listaModulos as $modulo) { ?>
                <li><a href="modulo.php?id=<?php echo $modulo['id'];?>"><?php echo $modulo['nombreModulo'];?></a></li>
            <?php } ?>
            <li><a href="#">Login</a></li>
    </ul></nav>
    <main>