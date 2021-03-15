<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<table>
                <tr>
                    <td>
                    "photo 1"
                    </td>
                    <td>
                    "photo 2"
                    </td>
                    <td>
                    "photo 3"
                    </td>
                </tr>
                <tr>
                    <td>
                    "photo 4"
                    </td>
                    <td>
                    "photo 5"
                    </td>
                    <td>
                    "photo 6"
                    </td>
                </tr>
</table>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>