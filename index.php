<?php require './model/db.php'; ?>
<?php include_once 'C:/xampp/htdocs/toDoList/view/head/header.php' ?>





<main class="container">
  <div class="row  p-1 mt-4">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header ">
          Add a new task to do
        </div>
        <div class="card-body"></div>
        <form action="./controller/addTask.php" method="POST" class="p-2">
          <div class="form-group mb-2">
            <label for="form-label" class="form-label ">Task</label>
            <input type="text" name="task" class="form-control" placeholder="Task title" autofocus>
          </div>
          <div class="form-group mb-2">
            <label for="form-label" class="form-label">Expected time to finish</label>
            <div class="cs-form mb-3">
              <input type="time" class="form-control" name="eTime" value="12:00 AM" />
            </div>
          </div>
          <input class="btn btn-success btn-block mt-3" type="submit" value="Add task" name="task_added">
        </form>
      </div>

      <!-- MESSAGES -->
      <?php if (isset($_SESSION['failed'])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Warning!!</strong> Pls fill all the fields.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset();
      } ?>

      <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SUCCESS</strong> Your task were added.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset();
      } ?>
      <!-- END MESSAGES -->

    </div>
    <?php
    $sentencia = $bd->query("SELECT *  from todolist");
    $tasks = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($tasks);
    ?>


    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Task</th>
            <th>Created At</th>
            <th>Expected finish At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tasks as $data) {
          ?>
            <tr>
              <th scope="row"><?php echo $data->title ?></th>
              <td><?php echo $data->created ?></td>
              <td><?php echo $data->expec ?></td>
              <td><a href="./view/item/edit.php?identifier=<?php echo $data->id ?>">Edit</a> | <a href="./controller/delete.php?identifier=<?php echo $data->id ?>">Done</a></td>
            </tr>
          <?php
          }
          ?>
      </table>
    </div>
  </div>
</main>

media-query



<?php include './view/head/footer.php' ?>