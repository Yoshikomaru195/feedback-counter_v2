<table>
    <thead>
        <th></th>
        <th>Хорошо<br></th>
        <th>Нормально</th>
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
            <td>Качество пищи</td>
            <td><?php echo $stats["foodquality"]["good"]; ?></td>
            <td><?php echo $stats["foodquality"]["normal"]; ?></td>
            <td><?php echo $stats["foodquality"]["bad"]; ?></td>
        </tr>
        <tr>
            <td>Ассортимент</td>
            <td><?php echo $stats["assortment"]["good"]; ?></td>
            <td><?php echo $stats["assortment"]["normal"]; ?></td>
            <td><?php echo $stats["assortment"]["bad"]; ?></td>
        </tr>
    </tbody>
</table>