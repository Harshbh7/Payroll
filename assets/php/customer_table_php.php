<?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='product{$row['id']}'>";
                        echo "<th scope='row'>{$row['id']}</th>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['mobile_no']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['pincode']}</td>";
                        echo "<td>
                                <div class='row'>
                                    <div class='col-4'>
                                        <button class='btn btn-primary' onclick=\"scrollToElement('product{$row['id']}Details')\">View</button>
                                    </div>
                                    <div class='col-4'>
                                        <button class='btn btn-warning' onclick=\"editUser('{$row['id']}')\">Edit</button>
                                    </div>
                                    <div class='col-4'>
                                        <button class='btn btn-danger' onclick='deleteUser({$row['id']})'>Delete</button>
                                    </div>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No users found</td></tr>";
                }
                $conn->close();
                ?>