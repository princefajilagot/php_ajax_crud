<?php
require_once '../php/init.php';
$validate = insert();
?>
<div id="addEmployee">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none fw-semibold" onclick="backToHome()" style="cursor: pointer;">Dashboard</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Add New Employee</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-center">
            <h4>Add New Employee</h4>
        </div>
        <form>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['fNameInput'] ?? '' ?>" type="text" name="firstname" value="<?php echo @($_POST['firstname']); ?>" placeholder="Firstname">
                        <div class="<?php echo $validate['fNameText'] ?? '' ?>">
                            <?php echo $validate['firstname'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['lNameInput'] ?? '' ?>" type="text" name="lastname" value="<?php echo @($_POST['lastname']); ?>" placeholder="Lastname">
                        <div class="<?php echo $validate['lNameText'] ?? '' ?>">
                            <?php echo $validate['lastname'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['aInput'] ?? '' ?>" type="text" name="address" value="<?php echo @($_POST['address']); ?>" placeholder="Address">
                        <div class="<?php echo $validate['addressText'] ?? '' ?>">
                            <?php echo $validate['address'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['bInput'] ?? '' ?>" type="date" name="birthday" value="<?php echo @($_POST['birthday']); ?>" placeholder="Birthday">
                        <div class="<?php echo $validate['bText'] ?? '' ?>">
                            <?php echo $validate['birthday'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['deptInput'] ?? '' ?>" type="text" name="department" value="<?php echo @($_POST['department']); ?>" placeholder="Department">
                        <div class="<?php echo $validate['deptText'] ?? '' ?>">
                            <?php echo $validate['department'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control form_data <?php echo $validate['posInput'] ?? '' ?>" type="text" name="position" value="<?php echo @($_POST['position']); ?>" placeholder="Position">
                        <div class="<?php echo $validate['posText'] ?? '' ?>">
                            <?php echo $validate['position'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <select class="form-control form_data <?php echo $validate['statInput'] ?? '' ?>" name="status" id="">
                            <option value="">Choose status</option>
                            <option value="Project Based"
                                <?php
                                if(@$_POST['status'] == "Project Based"){
                                    echo "selected";
                                }
                                ?>>
                                Project Based
                            </option>
                            <option value="Contractual"
                                <?php
                                    if(@$_POST['status'] == "Contractual"){
                                        echo "selected";
                                    }
                                ?>>
                                Contractual
                            </option>
                            <option value="Regular"
                                <?php
                                    if(@$_POST['status'] == "Regular"){
                                        echo "selected";
                                    }
                                ?>>
                                Regular
                            </option>
                        </select>
                        <div class="<?php echo $validate['statText'] ?? '' ?>">
                            <?php echo $validate['status'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control form_data <?php echo $validate['salaryInput'] ?? '' ?>" type="text" name="salary" value="<?php echo @($_POST['salary']); ?>" placeholder="Salary">
                        <div class="<?php echo $validate['salaryText'] ?? '' ?>">
                            <?php echo $validate['salary'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="form_data btn btn-success w-25" id="submit" type="submit" name="submit" onclick="insertEmpData(); return false;">Submit</button>
            </div>
        </form>
    </div>
</div>