<?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                      <th scope='row'>{$row['sr_no']}</th>
                      <td>{$row['user_id']}</td>
                      <td>{$row['user_name']}</td>
                      <td>{$row['user_mobile']}</td>
                      <td>{$row['date_of_purchasing']}</td>
                      <td>{$row['time_of_purchasing']}</td>
                      <td>{$row['total_amount']}</td>
                      <td>
                        <div class='row'>
                          <div class='col-4'>
                            <button class='btn btn-primary' onclick=\"scrollToElement('productDetails')\">View</button>
                          </div>
                          <div class='col-4'>
                            <button class='btn btn-warning' onclick=\"scrollToElement('productEdit')\">Edit</button>
                          </div>
                          <div class='col-4'>
                            <button class='btn btn-danger' onclick=\"deleteProduct({$row['sr_no']})\">Delete</button>
                          </div>
                        </div>
                      </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No orders found</td></tr>";
        }
        $conn->close();
        ?>