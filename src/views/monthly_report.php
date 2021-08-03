<main class="content">
    <?php
renderTitle('Relatorio Mensal', 'Veja seus dados de batimento mensais',
    'icofont-ui-calendar')
?>
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Dia</th>
                <th>Entrada</th>
                <th>Entrada Almoço</th>
                <th>Saida Almoço</th>
                <th>Saida</th>
            </thead>
            <tbody>
                <?php foreach ($report as $registry): ?>
                    <tr>
                        <td><?= formatDateWithLocale($registry->work_date, "%A, %d de %B de %Y")?></td>
                        <td><?=$registry->time1?></td>
                        <td><?=$registry->time2?></td>
                        <td><?=$registry->time3?></td>
                        <td><?=$registry->time4?></td>
                    </tr>
                <?php endforeach?>
              <tr class="bg-primary text-white">
                <td>Horas trabalhadas: </td>
                  <td colspan="2"><?=$sumOfWorkedTime?></td>
                  <td>Saldo: </td>
                <td><?= $balance ?></td>
              </tr>
            </tbody>
        </table>
    </div>
</main>