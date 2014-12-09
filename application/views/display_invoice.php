<h1>Client's Invoice</h1>
    <div style="text-align:center">
        <table class="table  table-bordered"  style="text-align:center">
          <tr>
            <td><strong>COMPLETED<stong></td>
            <td><strong>TASK<strong></td>
            <td><strong>AMOUNT<strong></td>
          </tr>
          <?php
          $total = 0;
          if(!isset($invoice)){
                echo "<tr>";
                echo "<td>None</td>";
                echo "<td>None</td>";
                echo "<td>None</td>";
                echo "</tr>";
          }else {
            foreach ($invoice as $rows) {
              echo "<tr>";
              echo "<td>". $rows->completed_date ."</td>";
              echo "<td>". $rows->task . "</td>";
              echo "<td>$". $rows->amount ."</td>";
              echo "</tr>";
              $total+=$rows->amount;
            }    
          }
          ?>
        </table>

        <label class="container">Total Invoice: $ <?php echo $total?> </label>
       

    </div>