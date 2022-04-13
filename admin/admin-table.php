<tbody>
<?php
require "../connection.php";

if(isset($_GET['page_no']) && $_GET['page_no'] !=''){
    $page_no = $_GET['page_no'];
}else{
    $page_no = 1;
}

$total_records_per_page = 25;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `login`" );
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_number_of_page = ceil($total_records / $total_records_per_page);
$second_last = $total_number_of_page - 1;

$disabled = "";
$status1 = 'active';
$status0 = 'inactive';
$sql = "SELECT tb1.id, tb1.loginId, tb1.firstName, tb1.lastName, tb2.username, tb2.level, tb2.status, tb2.dateAdded, tb2.lastLoginDate, tb2.createdBy FROM login tb2 INNER JOIN profile tb1 ON tb1.loginId = tb2.loginId WHERE tb2.status='$status1' OR tb2.status='$status0' ORDER BY tb1.id DESC";

if($result = $conn->query($sql)){
    if($result->num_rows >= 1){
        while($row = $result->fetch_assoc()){  ?>
            <tr>   
                <td class="text-center">
                    <?php 
                        $currentUser = $_SESSION["username"];
                        if($currentUser == $row["username"]){ 
                            $disabled = "disabled";
                            ?>
                            <span class="border border-danger text-danger rounded-3 p-1">You</span>
                        <?php } 
                    
                    ?>
                </td>
                <td><?= $row["loginId"]?></td>
                <td style="display:none"><?= $row["firstName"]?></td>
                <td style="display:none"><?= $row["lastName"]?></td>
                <td style="display:none"><?= $row["username"]?></td>
                <td style="display:none"><?= levelCheck($row["level"]) ?></td>
                <td style="display:none"><?= $row["id"]?></td>
                <td style="display:none"><?= $row["dateAdded"]?></td>
                <td><?= $row["firstName"]?></td>
                <td><?= $row["lastName"]?></td>
                <td><?= $row["username"]?></td>
                <td>
                    <?php 
                        $level = $row["level"];
                        levelCheck($level);
                    ?>
                </td>
                <td>
                    <?php
                        $id = $row["loginId"];
                        if ($row["status"] == "active"){
                            echo "<button type='button' class='btn btn-success p-2 m-0 col-md-10 statusButton' $disabled><small>Active</small></button>";
                        }
                        else if($row["status"] == "inactive"){
                            echo "<button type='button' class='btn btn-danger p-2 m-0 col-md-10 statusButton' $disabled><small>Inactive</small></button>";
                        }
                    ?>
                </td>
                <td><?= date("F d, Y", strtotime($row["dateAdded"])) ?></td>
                <td>
                    <?php
                        $time = strtotime($row["lastLoginDate"]);
                        echo relativeTime($time);
                    ?>
                </td>
                <td>
                        <?= $row["createdBy"] ?>
                </td>
                <td class="text-center">
                    <button type="button" class="btn tooltip-test editBtn" title="EDIT" data-bs-toggle="modal" data-bs-target="#editAdmin" <?= $disabled ?>>
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn tooltip-test delBtn" title="DELETE" data-bs-toggle="modal" data-bs-placement="bottom" data-bs-target="#deleteUser" <?= $disabled ?>>
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
<?php
        $disabled = ""; }
    }
    else{
        echo "No result found.";
    }
}
?>
</tbody> 