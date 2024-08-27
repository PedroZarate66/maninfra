<?php
require 'Meses.php';
abstract class Junio extends Meses
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