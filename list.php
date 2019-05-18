
<table class="table">
 

  <?php
if (! empty($result)) {
  echo ' <thead class="black white-text">
  <tr>
    <th scope="col">SPECIE NAME</th>
    <th scope="col">GENDER</th>
    <th scope="col">COLOR</th>
    <th scope="col">WEIGHT</th>
    <th scope="col">ACTION</th>
  </tr>
</thead>
<tbody>';

    foreach ($result as $key => $rows) {

   echo '<tr>
      <td>'.$rows['specie_name'].'</td>
      <td>'.$rows["gender"].'</td>
      <td>'.$rows["color"].'</td>
      <td>'.$rows["weight"].'</td>
      <td>
      <button class="btn btn-success btn-action bn-edit" id='.$rows["id"].'>Edit</button>
      <button class="btn btn-danger btn-action bn-delete" id='.$rows["id"].'>Delete</button>
      </td>
    </tr>'?>
    <?php
    }
}else{
  echo '<tr>
  <td style="text-align:center; font-size:1.6em;color:green"><strong>No Frog in your repository!</strong>, when you register a frog, it will appear here.</td>

</tr>';
}
?>
  </tbody>
</table>
