<?php
include('../ketnoi.php');
$sql = "SELECT id, name, email, message, submitted_at FROM lienhe ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách liên hệ</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tin nhắn</th>
            <th>Thời gian</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td>" . $row["submitted_at"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No submissions found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
<?php
include ("thoigian.php");
?>
</html>