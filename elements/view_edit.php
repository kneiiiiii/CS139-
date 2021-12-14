<div class="modal fade" id="edit_element<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Element</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="elements/edit_element.php?id=<?php echo $row['id']; ?>" method="post">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="atomic_no" name="atomic_no" value="<?php echo $row['atomic_no']; ?>">
            <label for="floatingInput">Atomic number</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="element_group" name="element_group" value="<?php echo $row['group_id']; ?>" aria-label="Floating label select example">
                <?php
                  foreach($group_dict as $ele_key => $ele_name){
                    echo "<option " . ($ele_key == $row['group_id'] ? "selected" : "") . " value='" . $ele_key . "'>" . $ele_name . "</option>";
                  }
                ?>
            </select>
            <label for="floatingSelect">Group</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" step=any class="form-control" id="atomic_weight" name="atomic_weight" value="<?php echo $row['atomic_weight']; ?>">
            <label for="floatingInput">Atomic weight</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>">
            <label for="floatingInput">Description</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='edit' class="btn button-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>