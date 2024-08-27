<?php
require_once 'Meses.php';
abstract class Febrero extends Meses
{
    public final function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
?>