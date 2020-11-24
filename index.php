<?php
  require_once('functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/docapi.css">

    <title>iTarefa - Documentação</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-3 col-left p-3 ">
              <div class="menu-left text-center">
                <img class="img-logo" src="img/iassign-logo.png">
                <h3 class="name-app">iTarefa</h3>
                <span class="desc-app">Atividade Interativa no Moodle</span>

                <div class="form-group has-search">
                  <span class="fa fa-search form-control-feedback">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                  </span>
                  <input type="search" class="search-input" placeholder="Pesquisar" onkeyup="search(event)" />
                  <nav>
                    <ul class="list-group">
                      <?php
                        $topicos = get_topics();
                        if ($topicos) {
                          foreach($topicos as $topico) {
                            echo "\n\t\t\t\t\t\t<a href='#$topico[0]'"
                                    . " data-file='$topico[1]'"
                                    . " onclick='open_topic(\"source/$topico[1]\", event)'"
                                    . " class='list-group-item list-group-item-action'>"
                                    . $topico[0]
                                  . "</a>";
                          }
                        } else {
                          echo "<span class='not-found'>$ICON_WARNING Nenhum tópico encontrado</span>";
                        }
                      ?>
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <div class="col col-center w-75">

                <!-- Lightweight client-side loader that feature-detects and load polyfills only when necessary -->
                <script src="js/webcomponents-loader.min.js"></script>

                <!-- Load the element definition -->
                <script type="module" src="js/zero-md.min.js"></script>

                <!-- Simply set the `src` attribute to your MD file and win -->
                <zero-md src="" id="zero-md"></zero-md>

              
            </div>
        </div>
    </div>

    <script src="js/showdown.min.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>