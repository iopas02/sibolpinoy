<tbody>
<?php
require "../connection.php";
$disabled = "";
$sql = "SELECT adminlog.actionBy,adminlog.action, login.lastLoginDate, login.dateAdded, profile.id, login.loginId, profile.firstName, profile.lastName, login.username, login.level, login.status FROM login INNER JOIN profile ON login.loginId = profile.loginId INNER JOIN adminlog ON login.loginId = adminlog.loginId WHERE adminlog.action = 'create' ORDER BY login.loginId";
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
                            echo "<button type='button' class='btn btn-success p-2 m-0 col-md-8 statusButton' $disabled><small>Active</small></button>";
                        }
                        else if($row["status"] == "inactive"){
                            echo "<button type='button' class='btn btn-danger p-2 m-0 col-md-8 statusButton' $disabled><small>Inactive</small></button>";
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
                        <?= $row["actionBy"] ?>
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