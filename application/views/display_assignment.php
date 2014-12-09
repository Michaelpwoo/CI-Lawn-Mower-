<h1 style="text-align:center"><?php echo $name[0]->tech_firstname;?>'s Weekly Assignments</h1>
    <div style="text-align:center">
      <form method="POST" action="<?php echo base_url()?>technician/displayUpdate">
        <table class="table table-bordered"  style="text-align:center">
          <tr>
            <td><strong>CLIENT<strong></td>
            <td><strong>LOCATION<strong></td>
            <td><strong>DATE<strong></td>
            <td><strong>COMPLETED<strong></td>
          </tr>
          <?php
          if(!isset($assignment)){
                echo "<tr>";
                echo "<td>None</td>";
                echo "<td>None</td>";
                echo "<td>None</td>";
                echo "<td>None</td>";
                echo "</tr>";
          }else {
            foreach ($assignment as $rows) {
              echo "<tr>";
              echo "<td>". $rows->firstname . " " . $rows->lastname . "</td>";
              echo "<td>". "abc street" . "</td>";
              echo "<td>". $rows->creation_date ."</td>";
              echo "<td><input type='checkbox' name='checked[]' value=".$rows->AID."></td>";
              echo "</tr>";
            }
            echo "<input type='hidden' name='techlist' value=".$rows->TID.">";
          }
          ?>
        </table>
        <input class = "btn" type="submit" value="Submit">  
      </form>
    </div>
