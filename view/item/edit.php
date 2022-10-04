<?php include_once '../head/header.php' ?>
<?php

require '../../model/db.php';

$taskcode = $_GET['identifier'];

$queryedit = $bd->prepare("SELECT * from todolist where id = ?");

$queryedit->execute([$taskcode]);

$task = $queryedit->fetch(PDO::FETCH_OBJ);

?>

<div class="container">
    <div class="row justify content center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header ">
                    Edit a task to do
                </div>
                <div class="card-body"></div>
                <form action="../../controller/updateTask.php" method="POST" class="p-2">
                    <div class="form-group mb-2">
                        <label for="form-label" class="form-label">Edit Task</label>
                        <input type="text" name="task" class="form-control" value="<?php echo $task->title; ?>" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="form-label" class="form-label">Expected time to finish</label>
                        <div class="cs-form mb-3">
                            <input type="time" class="form-control" name="eTime" value="<?php echo $task->expec; ?>" />
                        </div>
                    </div>
                    <input type="hidden" name="identifier" value="<?php echo $task->id; ?>">
                    <input class="btn btn-success btn-block mt-3" type="submit" value="Edit task" name="task_added">
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
        </div>
    </div>
</div>

<?php include 'C:/xampp/htdocs/toDoList/view/head/footer.php' ?>