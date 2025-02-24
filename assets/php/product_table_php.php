<?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr id='product" . $row["id"] . "'>";
            echo "<th scope='row'>" . $row["id"] . "</th>";
            echo "<td>" . htmlspecialchars($row["productName"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["productDescription"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["productAmount"]) . "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='col-4'><button class='btn btn-primary' onclick='viewProduct(" . $row["id"] . ")'>View</button></div>";
            echo "<div class='col-4'><button class='btn btn-warning' onclick='editProduct(" . $row["id"] . ")'>Edit</button></div>";
            echo "<div class='col-4'><button class='btn btn-danger' onclick='deleteProduct(" . $row["id"] . ")'>Delete</button></div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No products found</td></tr>";
    }
    $conn->close();
?>