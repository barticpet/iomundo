<?php 
    include_once "header.php";
?>

        <p class="lead">Look what you've done!.</p>
        <?php if (count($recordsList)){ ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Data</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($recordsList as $value){
                    echo "<tr>
                    <td><img src='".BASE_URL_UPLOAD.$value['records_file']."' width=100 /></td>
                    <td><a data-toggle='tooltip' title=\"\">{$value['records_name']}</a></td>
                    <td>{$value['records_email']}</td>
                    <td>".custom_date($value['records_date'])."
                    </td>
                </tr>";
                }
            ?>
            </tbody>
        </table>
        <?php 
        } else {
            echo '<p>No records</p>';
        }
        
        ?>


       


<?php
	include_once "footer.php";
?>
