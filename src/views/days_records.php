<main class="content">
         <?php
         renderTitle('Registro de ponto', 'Matenha seu ponto em dia', 'icofont-check-alt');
          include(TEMPLATE_PATH . "/messages.php");
         ?>
        <div class="card">

            <div class="card-header">
                 <h3><?= $today ?></h3>
                 <p class="mb-0"> Pontos efetuados hoje</p>
            </div>

            <div class="card-body">
               <div class="d-flex mb-5 justify-content-around">
                   <span> Entrada 1: -----</span>
                   <span> Saida 1: -------</span>
               </div>
               <div class="d-flex mb-5 justify-content-around">
                   <span> Entrada 2: -----</span>
                   <span> Saida 2: -------</span>
               </div>

            </div>

        <div class="card-footer d-flex justify-content-center">
            <a href="http://" class="btn btn-success btn-lg">
               <i class="icofont-check mr-1"></i>
               Bater ponto
           </a>
        </div>

</main>