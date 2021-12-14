<div class="modal fade" id="add_elements" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Elements</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="elements/add_elements.php" method="post">
        <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="atomic_no" name="atomic_no" placeholder="Atomic Number">
              <label for="floatingInput">Atomic Number</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="element_group" name="element_group" aria-label="Floating label select example">
                <?php
                  foreach($group_dict as $ele_key => $ele_name){
                    echo "<option value='" . $ele_key . "'>" . $ele_name . "</option>";
                  }
                ?>
              </select>
              <label for="floatingSelect">Element Type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="atomic_weight" name="atomic_weight" placeholder="Atomic Weight">
                <label for="floatingInput">Atomic Weight</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="element_descrip" name="element_descrip" placeholder="Description">
                <label for="floatingInput">Description</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>