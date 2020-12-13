<?php
/**
 * @author: manolohidalgo_
 * Ejercicio de Verbos Irregulares.
 */

 session_start();
 // Para reiniciar pantalla
 if ($_POST['reiniciar']){
    unset($_SESSION['configuracion']['dificultad']);
    unset($_SESSION['configuracion']['error']);
    unset($_SESSION['configuracion']['mostrar']);
    unset($_SESSION['verbosIrregulares']);
    unset($_SESSION['cantidadAResponder']);
    unset($_SESSION['respuestasCorrectas']);
    unset($_SESSION['respuestasIncorrectas']);
    unset($_SESSION['sinContestar']);
    unset($_SESSION['resolver']);

    session_destroy();
    session_start();
    session_regenerate_id(true);
 }
 // variables generales
    if (!isset($_SESSION['configuracion']['dificultad'])){
        $_SESSION['configuracion']['dificultad'] = "";
        $_SESSION['configuracion']['error']= "";
        $_SESSION['configuracion']['mostrar']= true;
        $_SESSION['verbosIrregulares'] = [];
        $_SESSION['cantidadAResponder']=0;
        $_SESSION['respuestasCorrectas']=0;
        $_SESSION['respuestasIncorrectas'] = 0;
        $_SESSION['sinContestar']=0;
        $_SESSION['resolver'] = false;
    }

 $titulo = "Verbos Irregulares";
 $descripcion = "En este ejercicio se realiza una aplicación para practicar los verbos irregulares en inglés y su traducción al castellano. Se puede seleccionar el nivel de dificultad y el número de verbos a realizar. Se debe mostrar al finalizar el resultado de la actividad, los errores y permitir volvera intentarlo.";
 $verbosIrregulares = [[["nombre" => "levantarse", "visible" => false, "aCorregir" => 0], ["nombre" => "arise", "visible" => false, "aCorregir" => 0], ["nombre" => "arose", "visible" => false, "aCorregir" => 0], ["nombre" => "arisen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "levantarse", "visible" => false, "aCorregir" => 0], ["nombre" => "arise", "visible" => false, "aCorregir" => 0], ["nombre" => "arose", "visible" => false, "aCorregir" => 0], ["nombre" => "arisen", "visible" => false, "aCorregir" => 0]],                                          
                       [["nombre"=> "ser", "visible" => false, "aCorregir" => 0], ["nombre" => "be", "visible" => false, "aCorregir" => 0], ["nombre" => "was", "visible" => false, "aCorregir" => 0], ["nombre" => "been", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "golpear", "visible" => false, "aCorregir" => 0], ["nombre" => "beat", "visible" => false, "aCorregir" => 0], ["nombre" => "beat", "visible" => false, "aCorregir" => 0], ["nombre" => "beaten", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "convertirse", "visible" => false, "aCorregir" => 0], ["nombre" => "become", "visible" => false, "aCorregir" => 0], ["nombre" => "became", "visible" => false, "aCorregir" => 0], ["nombre" => "become", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "comenzar", "visible" => false, "aCorregir" => 0], ["nombre" => "begin", "visible" => false, "aCorregir" => 0], ["nombre" => "began", "visible" => false, "aCorregir" => 0], ["nombre" => "begun", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "apostar", "visible" => false, "aCorregir" => 0], ["nombre" => "bet", "visible" => false, "aCorregir" => 0], ["nombre" => "bet", "visible" => false, "aCorregir" => 0], ["nombre" => "bet", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "morder", "visible" => false, "aCorregir" => 0], ["nombre" => "bite", "visible" => false, "aCorregir" => 0], ["nombre" => "bit", "visible" => false, "aCorregir" => 0], ["nombre" => "bitten", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "sangrar", "visible" => false, "aCorregir" => 0], ["nombre" => "bleed", "visible" => false, "aCorregir" => 0], ["nombre" => "bled", "visible" => false, "aCorregir" => 0], ["nombre" => "bled", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "soplar", "visible" => false, "aCorregir" => 0], ["nombre" => "blow", "visible" => false, "aCorregir" => 0], ["nombre" => "blew", "visible" => false, "aCorregir" => 0], ["nombre" => "blown", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "romper", "visible" => false, "aCorregir" => 0], ["nombre" => "break", "visible" => false, "aCorregir" => 0], ["nombre" => "broke", "visible" => false, "aCorregir" => 0], ["nombre" => "broken", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "traer", "visible" => false, "aCorregir" => 0], ["nombre" => "bring", "visible" => false, "aCorregir" => 0], ["nombre" => "brought", "visible" => false, "aCorregir" => 0], ["nombre" => "brought", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "construir", "visible" => false, "aCorregir" => 0], ["nombre" => "build", "visible" => false, "aCorregir" => 0], ["nombre" => "built", "visible" => false, "aCorregir" => 0], ["nombre" => "built", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "comprar", "visible" => false, "aCorregir" => 0], ["nombre" => "buy", "visible" => false, "aCorregir" => 0], ["nombre" => "bought", "visible" => false, "aCorregir" => 0], ["nombre" => "bought", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "atrapar", "visible" => false, "aCorregir" => 0], ["nombre" => "catch", "visible" => false, "aCorregir" => 0], ["nombre" => "caught", "visible" => false, "aCorregir" => 0], ["nombre" => "caught", "visible" => false, "aCorregir" => 0]],
                       [["nombre"=> "elegir", "visible" => false, "aCorregir" => 0], ["nombre" => "choose", "visible" => false, "aCorregir" => 0], ["nombre" => "chose", "visible" => false, "aCorregir" => 0], ["nombre" => "chosen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "venir", "visible" => false, "aCorregir" => 0], ["nombre" => "come", "visible" => false, "aCorregir" => 0], ["nombre" => "came", "visible" => false, "aCorregir" => 0], ["nombre" => "come", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "costar", "visible" => false, "aCorregir" => 0], ["nombre" => "cost", "visible" => false, "aCorregir" => 0], ["nombre" => "cost", "visible" => false, "aCorregir" => 0], ["nombre" => "cost", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "arrastrarse", "visible" => false, "aCorregir" => 0], ["nombre" => "creep", "visible" => false, "aCorregir" => 0], ["nombre" => "crept", "visible" => false, "aCorregir" => 0], ["nombre" => "crept", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "cortar", "visible" => false, "aCorregir" => 0], ["nombre" => "cut", "visible" => false, "aCorregir" => 0], ["nombre" => "cut", "visible" => false, "aCorregir" => 0], ["nombre" => "cut", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "negociar", "visible" => false, "aCorregir" => 0], ["nombre" => "deal", "visible" => false, "aCorregir" => 0], ["nombre" => "dealt", "visible" => false, "aCorregir" => 0], ["nombre" => "dealt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "hacer", "visible" => false, "aCorregir" => 0], ["nombre" => "do", "visible" => false, "aCorregir" => 0], ["nombre" => "did", "visible" => false, "aCorregir" => 0], ["nombre" => "done", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dibujar", "visible" => false, "aCorregir" => 0], ["nombre" => "draw", "visible" => false, "aCorregir" => 0], ["nombre" => "drew", "visible" => false, "aCorregir" => 0], ["nombre" => "drawn", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "soñar", "visible" => false, "aCorregir" => 0], ["nombre" => "dream", "visible" => false, "aCorregir" => 0], ["nombre" => "dreamt", "visible" => false, "aCorregir" => 0], ["nombre" => "dreamt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "beber", "visible" => false, "aCorregir" => 0], ["nombre" => "drink", "visible" => false, "aCorregir" => 0], ["nombre" => "drank", "visible" => false, "aCorregir" => 0], ["nombre" => "drunk", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "conducir", "visible" => false, "aCorregir" => 0], ["nombre" => "drive", "visible" => false, "aCorregir" => 0], ["nombre" => "drove", "visible" => false, "aCorregir" => 0], ["nombre" => "driven", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "comer", "visible" => false, "aCorregir" => 0], ["nombre" => "eat", "visible" => false, "aCorregir" => 0], ["nombre" => "ate", "visible" => false, "aCorregir" => 0], ["nombre" => "eaten", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "caer", "visible" => false, "aCorregir" => 0], ["nombre" => "fall", "visible" => false, "aCorregir" => 0], ["nombre" => "fell", "visible" => false, "aCorregir" => 0], ["nombre" => "fallen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "alimentar", "visible" => false, "aCorregir" => 0], ["nombre" => "feed", "visible" => false, "aCorregir" => 0], ["nombre" => "fed", "visible" => false, "aCorregir" => 0], ["nombre" => "fed", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "sentir", "visible" => false, "aCorregir" => 0], ["nombre" => "feel", "visible" => false, "aCorregir" => 0], ["nombre" => "felt", "visible" => false, "aCorregir" => 0], ["nombre" => "felt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "pelear", "visible" => false, "aCorregir" => 0], ["nombre" => "fight", "visible" => false, "aCorregir" => 0], ["nombre" => "fought", "visible" => false, "aCorregir" => 0], ["nombre" => "fought", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "encontrar", "visible" => false, "aCorregir" => 0], ["nombre" => "find", "visible" => false, "aCorregir" => 0], ["nombre" => "found", "visible" => false, "aCorregir" => 0], ["nombre" => "found", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "huir", "visible" => false, "aCorregir" => 0], ["nombre" => "flee", "visible" => false, "aCorregir" => 0], ["nombre" => "fled", "visible" => false, "aCorregir" => 0], ["nombre" => "fled", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "volar", "visible" => false, "aCorregir" => 0], ["nombre" => "fly", "visible" => false, "aCorregir" => 0], ["nombre" => "flew", "visible" => false, "aCorregir" => 0], ["nombre" => "flown", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "olvidar", "visible" => false, "aCorregir" => 0], ["nombre" => "forget", "visible" => false, "aCorregir" => 0], ["nombre" => "forgot", "visible" => false, "aCorregir" => 0], ["nombre" => "forgotten", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "perdonar", "visible" => false, "aCorregir" => 0], ["nombre" => "forgive", "visible" => false, "aCorregir" => 0], ["nombre" => "forgave", "visible" => false, "aCorregir" => 0], ["nombre" => "forgiven", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "abandonar", "visible" => false, "aCorregir" => 0], ["nombre" => "forsake", "visible" => false, "aCorregir" => 0], ["nombre" => "forsook", "visible" => false, "aCorregir" => 0], ["nombre" => "forsaken", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "congelar", "visible" => false, "aCorregir" => 0], ["nombre" => "freeze", "visible" => false, "aCorregir" => 0], ["nombre" => "froze", "visible" => false, "aCorregir" => 0], ["nombre" => "frozen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "tener", "visible" => false, "aCorregir" => 0], ["nombre" => "get", "visible" => false, "aCorregir" => 0], ["nombre" => "got", "visible" => false, "aCorregir" => 0], ["nombre" => "gotten", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dar", "visible" => false, "aCorregir" => 0], ["nombre" => "give", "visible" => false, "aCorregir" => 0], ["nombre" => "gave", "visible" => false, "aCorregir" => 0], ["nombre" => "given", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "ir", "visible" => false, "aCorregir" => 0], ["nombre" => "go", "visible" => false, "aCorregir" => 0], ["nombre" => "went", "visible" => false, "aCorregir" => 0], ["nombre" => "gone", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "moler", "visible" => false, "aCorregir" => 0], ["nombre" => "grind", "visible" => false, "aCorregir" => 0], ["nombre" => "ground", "visible" => false, "aCorregir" => 0], ["nombre" => "ground", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "crecer", "visible" => false, "aCorregir" => 0], ["nombre" => "grow", "visible" => false, "aCorregir" => 0], ["nombre" => "grew", "visible" => false, "aCorregir" => 0], ["nombre" => "grown", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "colgar", "visible" => false, "aCorregir" => 0], ["nombre" => "hang", "visible" => false, "aCorregir" => 0], ["nombre" => "hung", "visible" => false, "aCorregir" => 0], ["nombre" => "hung", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "tener", "visible" => false, "aCorregir" => 0], ["nombre" => "have", "visible" => false, "aCorregir" => 0], ["nombre" => "had", "visible" => false, "aCorregir" => 0], ["nombre" => "had", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "oír", "visible" => false, "aCorregir" => 0], ["nombre" => "hear", "visible" => false, "aCorregir" => 0], ["nombre" => "heard", "visible" => false, "aCorregir" => 0], ["nombre" => "heard", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "esconderse", "visible" => false, "aCorregir" => 0], ["nombre" => "hide", "visible" => false, "aCorregir" => 0], ["nombre" => "hid", "visible" => false, "aCorregir" => 0], ["nombre" => "hidden", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "golpear", "visible" => false, "aCorregir" => 0], ["nombre" => "hit", "visible" => false, "aCorregir" => 0], ["nombre" => "hit", "visible" => false, "aCorregir" => 0], ["nombre" => "hit", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "mantener", "visible" => false, "aCorregir" => 0], ["nombre" => "hold", "visible" => false, "aCorregir" => 0], ["nombre" => "held", "visible" => false, "aCorregir" => 0], ["nombre" => "held", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "herir", "visible" => false, "aCorregir" => 0], ["nombre" => "hurt", "visible" => false, "aCorregir" => 0], ["nombre" => "hurt", "visible" => false, "aCorregir" => 0], ["nombre" => "hurt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "guardar", "visible" => false, "aCorregir" => 0], ["nombre" => "keep", "visible" => false, "aCorregir" => 0], ["nombre" => "kept", "visible" => false, "aCorregir" => 0], ["nombre" => "kept", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "arrodillarse", "visible" => false, "aCorregir" => 0], ["nombre" => "kneel", "visible" => false, "aCorregir" => 0], ["nombre" => "knelt", "visible" => false, "aCorregir" => 0], ["nombre" => "knelt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "saber", "visible" => false, "aCorregir" => 0], ["nombre" => "know", "visible" => false, "aCorregir" => 0], ["nombre" => "knew", "visible" => false, "aCorregir" => 0], ["nombre" => "known", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "encabezar", "visible" => false, "aCorregir" => 0], ["nombre" => "lead", "visible" => false, "aCorregir" => 0], ["nombre" => "led", "visible" => false, "aCorregir" => 0], ["nombre" => "led", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "aprender", "visible" => false, "aCorregir" => 0], ["nombre" => "learn", "visible" => false, "aCorregir" => 0], ["nombre" => "learnt", "visible" => false, "aCorregir" => 0], ["nombre" => "learnt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dejar", "visible" => false, "aCorregir" => 0], ["nombre" => "leave", "visible" => false, "aCorregir" => 0], ["nombre" => "left", "visible" => false, "aCorregir" => 0], ["nombre" => "left", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "prestar", "visible" => false, "aCorregir" => 0], ["nombre" => "lend", "visible" => false, "aCorregir" => 0], ["nombre" => "lent", "visible" => false, "aCorregir" => 0], ["nombre" => "lent", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dejar", "visible" => false, "aCorregir" => 0], ["nombre" => "let", "visible" => false, "aCorregir" => 0], ["nombre" => "let", "visible" => false, "aCorregir" => 0], ["nombre" => "let", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "yacer", "visible" => false, "aCorregir" => 0], ["nombre" => "lie", "visible" => false, "aCorregir" => 0], ["nombre" => "lay", "visible" => false, "aCorregir" => 0], ["nombre" => "lain", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "perder", "visible" => false, "aCorregir" => 0], ["nombre" => "lose", "visible" => false, "aCorregir" => 0], ["nombre" => "lost", "visible" => false, "aCorregir" => 0], ["nombre" => "lost", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "hacer", "visible" => false, "aCorregir" => 0], ["nombre" => "make", "visible" => false, "aCorregir" => 0], ["nombre" => "made", "visible" => false, "aCorregir" => 0], ["nombre" => "made", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "significar", "visible" => false, "aCorregir" => 0], ["nombre" => "mean", "visible" => false, "aCorregir" => 0], ["nombre" => "meant", "visible" => false, "aCorregir" => 0], ["nombre" => "meant", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "conocer", "visible" => false, "aCorregir" => 0], ["nombre" => "meet", "visible" => false, "aCorregir" => 0], ["nombre" => "met", "visible" => false, "aCorregir" => 0], ["nombre" => "met", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "pagar", "visible" => false, "aCorregir" => 0], ["nombre" => "pay", "visible" => false, "aCorregir" => 0], ["nombre" => "paid", "visible" => false, "aCorregir" => 0], ["nombre" => "paid", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "poner", "visible" => false, "aCorregir" => 0], ["nombre" => "put", "visible" => false, "aCorregir" => 0], ["nombre" => "put", "visible" => false, "aCorregir" => 0], ["nombre" => "put", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "abandonar", "visible" => false, "aCorregir" => 0], ["nombre" => "quit", "visible" => false, "aCorregir" => 0], ["nombre" => "quit", "visible" => false, "aCorregir" => 0], ["nombre" => "quit", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "leer", "visible" => false, "aCorregir" => 0], ["nombre" => "read", "visible" => false, "aCorregir" => 0], ["nombre" => "read", "visible" => false, "aCorregir" => 0], ["nombre" => "read", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "montar", "visible" => false, "aCorregir" => 0], ["nombre" => "ride", "visible" => false, "aCorregir" => 0], ["nombre" => "rode", "visible" => false, "aCorregir" => 0], ["nombre" => "ridden", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "llamar", "visible" => false, "aCorregir" => 0], ["nombre" => "ring", "visible" => false, "aCorregir" => 0], ["nombre" => "rang", "visible" => false, "aCorregir" => 0], ["nombre" => "rung", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "elevar", "visible" => false, "aCorregir" => 0], ["nombre" => "rise", "visible" => false, "aCorregir" => 0], ["nombre" => "rose", "visible" => false, "aCorregir" => 0], ["nombre" => "risen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "correr", "visible" => false, "aCorregir" => 0], ["nombre" => "run", "visible" => false, "aCorregir" => 0], ["nombre" => "ran", "visible" => false, "aCorregir" => 0], ["nombre" => "run", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "decir", "visible" => false, "aCorregir" => 0], ["nombre" => "say", "visible" => false, "aCorregir" => 0], ["nombre" => "said", "visible" => false, "aCorregir" => 0], ["nombre" => "said", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "ver", "visible" => false, "aCorregir" => 0], ["nombre" => "see", "visible" => false, "aCorregir" => 0], ["nombre" => "saw", "visible" => false, "aCorregir" => 0], ["nombre" => "seen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "vender", "visible" => false, "aCorregir" => 0], ["nombre" => "sell", "visible" => false, "aCorregir" => 0], ["nombre" => "sold", "visible" => false, "aCorregir" => 0], ["nombre" => "sold", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "enviar", "visible" => false, "aCorregir" => 0], ["nombre" => "send", "visible" => false, "aCorregir" => 0], ["nombre" => "sent", "visible" => false, "aCorregir" => 0], ["nombre" => "sent", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "fijar", "visible" => false, "aCorregir" => 0], ["nombre" => "set", "visible" => false, "aCorregir" => 0], ["nombre" => "set", "visible" => false, "aCorregir" => 0], ["nombre" => "set", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "coser", "visible" => false, "aCorregir" => 0], ["nombre" => "sew", "visible" => false, "aCorregir" => 0], ["nombre" => "sewed", "visible" => false, "aCorregir" => 0], ["nombre" => "sewn", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "sacudir", "visible" => false, "aCorregir" => 0], ["nombre" => "shake", "visible" => false, "aCorregir" => 0], ["nombre" => "shook", "visible" => false, "aCorregir" => 0], ["nombre" => "shaken", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "brillar", "visible" => false, "aCorregir" => 0], ["nombre" => "shine", "visible" => false, "aCorregir" => 0], ["nombre" => "shone", "visible" => false, "aCorregir" => 0], ["nombre" => "shone", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "disparar", "visible" => false, "aCorregir" => 0], ["nombre" => "shoot", "visible" => false, "aCorregir" => 0], ["nombre" => "shot", "visible" => false, "aCorregir" => 0], ["nombre" => "shot", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "mostrar", "visible" => false, "aCorregir" => 0], ["nombre" => "show", "visible" => false, "aCorregir" => 0], ["nombre" => "showed", "visible" => false, "aCorregir" => 0], ["nombre" => "shown", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "encoger", "visible" => false, "aCorregir" => 0], ["nombre" => "shrink", "visible" => false, "aCorregir" => 0], ["nombre" => "shrank", "visible" => false, "aCorregir" => 0], ["nombre" => "shrunk", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "cerrar", "visible" => false, "aCorregir" => 0], ["nombre" => "shut", "visible" => false, "aCorregir" => 0], ["nombre" => "shut", "visible" => false, "aCorregir" => 0], ["nombre" => "shut", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "cantar", "visible" => false, "aCorregir" => 0], ["nombre" => "sing", "visible" => false, "aCorregir" => 0], ["nombre" => "sang", "visible" => false, "aCorregir" => 0], ["nombre" => "sung", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "hundir", "visible" => false, "aCorregir" => 0], ["nombre" => "sink", "visible" => false, "aCorregir" => 0], ["nombre" => "sank", "visible" => false, "aCorregir" => 0], ["nombre" => "sunk", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "sentarse", "visible" => false, "aCorregir" => 0], ["nombre" => "sit", "visible" => false, "aCorregir" => 0], ["nombre" => "sat", "visible" => false, "aCorregir" => 0], ["nombre" => "sat", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dormir", "visible" => false, "aCorregir" => 0], ["nombre" => "sleep", "visible" => false, "aCorregir" => 0], ["nombre" => "slept", "visible" => false, "aCorregir" => 0], ["nombre" => "slept", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "deslizar", "visible" => false, "aCorregir" => 0], ["nombre" => "slide", "visible" => false, "aCorregir" => 0], ["nombre" => "slid", "visible" => false, "aCorregir" => 0], ["nombre" => "slid", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "sembrar", "visible" => false, "aCorregir" => 0], ["nombre" => "sow", "visible" => false, "aCorregir" => 0], ["nombre" => "sowed", "visible" => false, "aCorregir" => 0], ["nombre" => "sown", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "hablar", "visible" => false, "aCorregir" => 0], ["nombre" => "speak", "visible" => false, "aCorregir" => 0], ["nombre" => "spoke", "visible" => false, "aCorregir" => 0], ["nombre" => "spoken", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "deletrear", "visible" => false, "aCorregir" => 0], ["nombre" => "spel", "visible" => false, "aCorregir" => 0], ["nombre" => "spelt", "visible" => false, "aCorregir" => 0], ["nombre" => "spelt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "gastar", "visible" => false, "aCorregir" => 0], ["nombre" => "spend", "visible" => false, "aCorregir" => 0], ["nombre" => "spent", "visible" => false, "aCorregir" => 0], ["nombre" => "spent", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "derramar", "visible" => false, "aCorregir" => 0], ["nombre" => "spill", "visible" => false, "aCorregir" => 0], ["nombre" => "spilt", "visible" => false, "aCorregir" => 0], ["nombre" => "spilt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "dividir", "visible" => false, "aCorregir" => 0], ["nombre" => "split", "visible" => false, "aCorregir" => 0], ["nombre" => "split", "visible" => false, "aCorregir" => 0], ["nombre" => "split", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "estropear", "visible" => false, "aCorregir" => 0], ["nombre" => "spoil", "visible" => false, "aCorregir" => 0], ["nombre" => "spoilt", "visible" => false, "aCorregir" => 0], ["nombre" => "spoilt", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "extenderse", "visible" => false, "aCorregir" => 0], ["nombre" => "spread", "visible" => false, "aCorregir" => 0], ["nombre" => "spread", "visible" => false, "aCorregir" => 0], ["nombre" => "spread", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "estar de pie", "visible" => false, "aCorregir" => 0], ["nombre" => "stand", "visible" => false, "aCorregir" => 0], ["nombre" => "stood", "visible" => false, "aCorregir" => 0], ["nombre" => "stood", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "robar", "visible" => false, "aCorregir" => 0], ["nombre" => "steal", "visible" => false, "aCorregir" => 0], ["nombre" => "stole", "visible" => false, "aCorregir" => 0], ["nombre" => "stolen", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "picar", "visible" => false, "aCorregir" => 0], ["nombre" => "sting", "visible" => false, "aCorregir" => 0], ["nombre" => "stung", "visible" => false, "aCorregir" => 0], ["nombre" => "stung", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "apestar", "visible" => false, "aCorregir" => 0], ["nombre" => "stink", "visible" => false, "aCorregir" => 0], ["nombre" => "stank", "visible" => false, "aCorregir" => 0], ["nombre" => "stunk", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "golpear", "visible" => false, "aCorregir" => 0], ["nombre" => "strike", "visible" => false, "aCorregir" => 0], ["nombre" => "struck", "visible" => false, "aCorregir" => 0], ["nombre" => "struck", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "jurar", "visible" => false, "aCorregir" => 0], ["nombre" => "swear", "visible" => false, "aCorregir" => 0], ["nombre" => "swore", "visible" => false, "aCorregir" => 0], ["nombre" => "sworn", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "barrer", "visible" => false, "aCorregir" => 0], ["nombre" => "sweep", "visible" => false, "aCorregir" => 0], ["nombre" => "swept", "visible" => false, "aCorregir" => 0], ["nombre" => "swept", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "nadar", "visible" => false, "aCorregir" => 0], ["nombre" => "swim", "visible" => false, "aCorregir" => 0], ["nombre" => "swam", "visible" => false, "aCorregir" => 0], ["nombre" => "swum", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "tomar", "visible" => false, "aCorregir" => 0], ["nombre" => "take", "visible" => false, "aCorregir" => 0], ["nombre" => "took", "visible" => false, "aCorregir" => 0], ["nombre" => "taken", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "enseñar", "visible" => false, "aCorregir" => 0], ["nombre" => "teach", "visible" => false, "aCorregir" => 0], ["nombre" => "taught", "visible" => false, "aCorregir" => 0], ["nombre" => "taught", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "romper", "visible" => false, "aCorregir" => 0], ["nombre" => "tear", "visible" => false, "aCorregir" => 0], ["nombre" => "tore", "visible" => false, "aCorregir" => 0], ["nombre" => "torn", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "decir", "visible" => false, "aCorregir" => 0], ["nombre" => "tell", "visible" => false, "aCorregir" => 0], ["nombre" => "told", "visible" => false, "aCorregir" => 0], ["nombre" => "told", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "pensar", "visible" => false, "aCorregir" => 0], ["nombre" => "think", "visible" => false, "aCorregir" => 0], ["nombre" => "thought", "visible" => false, "aCorregir" => 0], ["nombre" => "thought", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "lanzar", "visible" => false, "aCorregir" => 0], ["nombre" => "throw", "visible" => false, "aCorregir" => 0], ["nombre" => "threw", "visible" => false, "aCorregir" => 0], ["nombre" => "thrown", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "pisar", "visible" => false, "aCorregir" => 0], ["nombre" => "tread", "visible" => false, "aCorregir" => 0], ["nombre" => "trode", "visible" => false, "aCorregir" => 0], ["nombre" => "trodden", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "despertarse", "visible" => false, "aCorregir" => 0], ["nombre" => "wake", "visible" => false, "aCorregir" => 0], ["nombre" => "woke", "visible" => false, "aCorregir" => 0], ["nombre" => "woken", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "llevar puesto", "visible" => false, "aCorregir" => 0], ["nombre" => "wear", "visible" => false, "aCorregir" => 0], ["nombre" => "wore", "visible" => false, "aCorregir" => 0], ["nombre" => "worn", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "tejer", "visible" => false, "aCorregir" => 0], ["nombre" => "weave", "visible" => false, "aCorregir" => 0], ["nombre" => "wove", "visible" => false, "aCorregir" => 0], ["nombre" => "woven", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "llorar", "visible" => false, "aCorregir" => 0], ["nombre" => "weep", "visible" => false, "aCorregir" => 0], ["nombre" => "wept", "visible" => false, "aCorregir" => 0], ["nombre" => "wept", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "ganar", "visible" => false, "aCorregir" => 0], ["nombre" => "win", "visible" => false, "aCorregir" => 0], ["nombre" => "won", "visible" => false, "aCorregir" => 0], ["nombre" => "won", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "retorcer", "visible" => false, "aCorregir" => 0], ["nombre" => "wring", "visible" => false, "aCorregir" => 0], ["nombre" => "wrung", "visible" => false, "aCorregir" => 0], ["nombre" => "wrung", "visible" => false, "aCorregir" => 0]],
                       [["nombre" => "escribir", "visible" => false, "aCorregir" => 0], ["nombre" => "write", "visible" => false, "aCorregir" => 0], ["nombre" => "wrote", "visible" => false, "aCorregir" => 0], ["nombre" => "written", "visible" => false, "aCorregir" => 0]]
                       ];

    // Datos formulario configuración
    $_SESSION['configuracion']['dificultad'] = $_SESSION['configuracion']['error'] = "";
    $_SESSION['configuracion']['mostrar'];
             
    if (isset($_POST['resolver'])){
        $_SESSION['resolver'] = true;
    }
    // Validación formulario configuración
    if (isset($_POST['envioDificultad'])){
        $_SESSION['configuracion']['dificultad']=clearData($_POST['dificultad']);
        $_SESSION['configuracion']['mostrar'] = false;
        if ((empty ($_SESSION['configuracion']['dificultad']))){
            $_SESSION['configuracion']['mostrar'] = true;
            $_SESSION['configuracion']['error'] = "difError";
        } else if (!($_SESSION['configuracion']['dificultad'] >= 1 && $_SESSION['configuracion']['dificultad'] <= 5)){
            $_SESSION['configuracion']['mostrar'] = true;
            $_SESSION['configuracion']['error'] = "difError";
        }
        if (!$_SESSION['configuracion']['mostrar']){
            // generamos Array con los verbos que vamos a mostrar
            $verbosAMostrar;
            $_SESSION['verbosIrregulares'] = [];
            switch ($_SESSION['configuracion']['dificultad']) {
                case 1:
                    $verbosAMostrar = 1;
                    $casillasMostrar = 3;
                    $_SESSION['cantidadAResponder'] = 1;
                    break;
                case 2:
                    $verbosAMostrar = 10;
                    $casillasMostrar = 3;
                    $_SESSION['cantidadAResponder'] = 10;
                    break;
                case 3:
                    $verbosAMostrar = 15;
                    $casillasMostrar = 2;
                    $_SESSION['cantidadAResponder'] = 30;
                    break;
                case 4:
                    $verbosAMostrar = 20;
                    $casillasMostrar = 2;
                    $_SESSION['cantidadAResponder'] = 40;
                    break;
                case 5: 
                    $verbosAMostrar = 25;
                    $casillasMostrar = 1;
                    $_SESSION['cantidadAResponder'] = 75;
                    break;
            }
            $contador = 0;
            do {
                $valor = random_int(0, sizeof($verbosIrregulares)-1);
                if (!in_array($verbosIrregulares[$valor], $_SESSION['verbosIrregulares'])){
                    array_push($_SESSION['verbosIrregulares'], $verbosIrregulares[$valor]);
                    $contador++;
                }
            } while ($contador < $verbosAMostrar);
            mostrarValores($casillasMostrar);
        }
    } 

    // Petición para corregir respuestas
    if ($_POST['corregir']){
        $_SESSION['respuestasCorrectas'] = 0;
        $_SESSION['respuestasIncorrectas'] = 0;
        $_SESSION['sinContestar'] = 0;
        $posicion = 0;
        for ($i = 0; $i < sizeof($_SESSION['verbosIrregulares']); $i++){
            $verbo = $_SESSION['verbosIrregulares'][$i];
            $nombre = $_POST[$verbo[0]['nombre']];
            for ($j = 0; $j < 4; $j++){
                if ($nombre[$j] == $verbo[$j]['nombre'] && $verbo[$j]['visible'] == false){
                    // acierto (2)
                    $_SESSION['verbosIrregulares'][$i][$j]['aCorregir'] = 2;
                    $_SESSION['respuestasCorrectas']++;
                } else if (empty($nombre[$j]) && $verbo[$j]['visible'] == false) {
                    $_SESSION['sinContestar']++;
                } else if ($nombre[$j] != $verbo[$j]['nombre'] && $verbo[$j]['visible'] == false){
                    // error (1)
                    $_SESSION['verbosIrregulares'][$i][$j]['aCorregir'] = 1;
                    $_SESSION['respuestasIncorrectas']++;
                }
            }
            $posicion++;
        }

    }
 

 function clearData($cadena){
     $cadena_limpia = trim($cadena);
     $cadena_limpia = htmlspecialchars($cadena_limpia);
     $cadena_limpia = stripslashes($cadena_limpia);
     return $cadena_limpia;
 }

 function mostrarFormularioConfiguracion(){
    if ($_SESSION['configuracion']['mostrar']){
        echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
        echo 'Dificultad (1-5): <input type="text" name="dificultad" placeholder="1-5" value="'.$_SESSION['configuracion']['dificultad'].'" id="dificultad" class="'.$_SESSION['configuracion']['error'].'"/> ';
        echo "<input type=\"submit\" name=\"envioDificultad\" placeholder=\"Send\" value=\"Enviar\"/></form><br/>";
        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
        echo '<input type="submit" name="reiniciar" value="Reiniciar"></form>'; 
    } else {
        echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
        echo 'Dificultad (1-5): <input type="text" name="dificultad" value="'.$_SESSION['configuracion']['dificultad'].'" id="dificultad" disabled/> ';
        echo "<input type=\"submit\" name=\"dificultad\" placeholder=\"Send\" value=\"Enviar\" disabled/></form><br/>";
        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
        echo '<input type="submit" name="reiniciar" value="Reiniciar"></form>'; 
    }
 }

 function mostrarResultados(){
     if ($_SESSION['cantidadAResponder'] == 0){
         echo "Aún no hay resultados que mostrar";
     } else {
        echo "Total a responder: ".$_SESSION['cantidadAResponder'].'<br/>';
        echo "Respuestas correctas: ".$_SESSION['respuestasCorrectas'].'<br/>';
        echo "Respuestas incorrectas: ".$_SESSION['respuestasIncorrectas'].'<br/>';
        echo "No contestadas: ".$_SESSION['sinContestar'].'<br/>';
     }
 }

 function mostrarValores($casillasMostrar){
    for ($i = 0; $i < sizeof($_SESSION['verbosIrregulares']); $i++){
        $contador = 0; 
        do {
            $aleatorio = random_int(0, 3);
            if ($_SESSION['verbosIrregulares'][$i][$aleatorio]['visible'] == false ){
                $_SESSION['verbosIrregulares'][$i][$aleatorio]['visible'] = true;
                $contador++;
            }
        } while ($contador < $casillasMostrar);
    }
 }

 function mostrarPantallaPrincipal(){
    if (empty($_SESSION['verbosIrregulares'])){
        echo "Configura el nivel de dificultad en el Panel de Control";
    } else if ($_SESSION['resolver']){
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
        echo '<table><tr><th>Castellano</th><th>Presente</th><th>Pasado Simple</th><th>Participio</th></tr>';
        foreach ($_SESSION['verbosIrregulares'] as $verbo) {
            echo '<tr>';
            $posicion = 0;
            foreach ($verbo as $formaVerbal){
                $nombre = $verbo[0]['nombre'];
                if ($formaVerbal['visible']){
                    echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" readonly/></td>';
                } else {
                    if ($formaVerbal['aCorregir'] == 0){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" class="resolver" readonly/></td>';
                    } else if ($formaVerbal['aCorregir'] == 1){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" class="resolver respIncorrecta" readonly/></td>';
                    } else if ($formaVerbal['aCorregir'] == 2){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" class="resolver respCorrecta" readonly/></td>';
                    }
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<p><input type="submit" name="corregir" value="Corregir" disabled></p></form>';
    } else {
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
        echo '<table><tr><th>Castellano</th><th>Presente</th><th>Pasado Simple</th><th>Participio</th></tr>';
        foreach ($_SESSION['verbosIrregulares'] as $verbo) {
            echo '<tr>';
            $posicion = 0;
            foreach ($verbo as $formaVerbal){
                $nombre = $verbo[0]['nombre'];
                if ($formaVerbal['visible']){
                    echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" readonly/></td>';
                } else {
                    if ($formaVerbal['aCorregir'] == 0){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="" class="sinContestar"/></td>';
                    } else if ($formaVerbal['aCorregir'] == 1){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="'.$_POST[$nombre][$posicion].'" class="respIncorrecta"/></td>';
                    } else if ($formaVerbal['aCorregir'] == 2){
                        echo '<td><input type="text" name="'.$nombre.'[]" value="'.$formaVerbal['nombre'].'" class="respCorrecta" readonly/></td>';
                    }
                }
                $posicion++;
            }
            echo '</tr>';
        }
        echo '</table>';
        if ($_SESSION['cantidadAResponder'] == $_SESSION['respuestasCorrectas']){
            echo '<p><input type="submit" name="corregir" value="Corregir" disabled></p></form>'; 
        } else {
            echo '<p><input type="submit" name="corregir" value="Corregir"></p></form>'; 
        }
    }
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <script src="https://use.fontawesome.com/0fbf2b9dd0.js"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <header><img src="./img/logo-manolohidalgo.png" alt=""></header>
    <nav><h2><?php echo $titulo; ?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion; ?>
        </p>
    </div>
    <div class="contenedor">
        <div class="principal">
            <h3>Pantalla principal</h3>
            <?php mostrarPantallaPrincipal(); ?>
        </div>
        <div class="lateral">
            <h3>Panel de control</h3>
            <?php mostrarFormularioConfiguracion()?>
            <h3>Resultados</h3>
            <?php mostrarResultados();
            echo '<p></p>';
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
            if (($_SESSION['cantidadAResponder'] == $_SESSION['respuestasCorrectas']) || $_SESSION['resolver']){
                echo '<input type="submit" name="resolver" value="Resolver" disabled></form>'; 
            } else {
                echo '<input type="submit" name="resolver" value="Resolver"></form>'; 
            }
            ?>

        </div>
    </div>
    <footer>
        <div class="redes">
        <div><a href="http://www.twitter.com/manolohidalgo_" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="redesNombre">Twitter</span</a></div>
        <div><a href="https://www.linkedin.com/in/manuelhidalgoperez/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span class="redesNombre">Linkedin</span</a></div>
        <div><a href="https://github.com/hipema" target="_blank"><i class="fa fa-github" aria-hidden="true"></i><span class="redesNombre">Github</span</a></div>
        <div><a href="http://www.manolohidalgo.com" target="_blank"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="redesNombre">Web Personal</span</a></div>
        </div>
    </footer>
</body>
</html>