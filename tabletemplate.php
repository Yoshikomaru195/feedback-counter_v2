<table>
    <thead>
        <th></th>
        <th>Отлично<br></th>
        <th>Удовлетворительно</th>
        <th>Плохо</th>
    </thead>
    <tbody>
        <tr>
            <td>Качество обслуживания</td>
            <td><?php echo $stats["servicequality"]["good"]; ?></td>
            <td><?php echo $stats["servicequality"]["normal"]; ?></td>
            <td><?php echo $stats["servicequality"]["bad"]; ?></td>
        </tr>
        <tr>
            <td>Качество блюд</td>
            <td><?php echo $stats["foodquality"]["good"]; ?></td>
            <td><?php echo $stats["foodquality"]["normal"]; ?></td>
            <td><?php echo $stats["foodquality"]["bad"]; ?></td>
        </tr>
        <tr>
            <td>Ассортимент блюд</td>
            <td><?php echo $stats["assortment"]["good"]; ?></td>
            <td><?php echo $stats["assortment"]["normal"]; ?></td>
            <td><?php echo $stats["assortment"]["bad"]; ?></td>
        </tr>
    </tbody>
</table>