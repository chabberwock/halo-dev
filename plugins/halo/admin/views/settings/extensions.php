<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
    $this->title = 'Extensions';
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Version</th>
            <th>Alias</th>
            <th>Directory</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extensions as $extension): ?>
            <?php foreach ($extension['alias'] as $alias=>$path): ?>
                <tr>
                    <td><?= $extension['name'] ?></td>
                    <td><?= $extension['version'] ?></td>
                    <td><?= $alias ?></td>
                    <td><?= $path ?></td>
                </tr>
            <?php endforeach ?>        
        <?php endforeach ?>
    </tbody>
</table>