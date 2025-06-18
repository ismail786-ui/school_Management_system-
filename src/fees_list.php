<table class="table table-bordered table-striped">
  <thead class="table-secondary text-center">
    <tr>
      <th>ID</th>
      <th>Name</th>
      ...
      <th>Actions</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        ...
        <td>
          <a class="btn btn-success" href="stu_ufees.php?sfedit=<?= $row['sf_id']; ?>">Edit</a>
          <a class="btn btn-danger" href="stu_dfees.php?sfdelete=<?= $row['sf_id']; ?>">Delete</a>
          <a class="btn btn-secondary btn-sm" href="invoice.php?sf_id=<?= $row['sf_id']; ?>" target="_blank">Invoice</a>
          <a class="btn btn-warning btn-sm" href="send_invoice.php?sf_id=<?= $row['sf_id']; ?>">Send Email</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
