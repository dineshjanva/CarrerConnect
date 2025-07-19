<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orders with Delete</title>
</head>

<body>

    <h2>Orders (with Delete Button)</h2>

    <table border="1" id="orderTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Status</th>
                <th>Assigned Status</th>
                <th>Assigned At</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        const token = "17|DlsWVKVlhqOkohcprxzVZRvg3wWqSWaDmbtVRjWFb5b281b1"; // Replace with real token

        function fetchOrders() {
            fetch("/api/Allorder", {
                method: "GET",
                headers: {
                    "Authorization": "Bearer " + token,
                    "Accept": "application/json"
                }
            })
                .then(response => response.json())
                .then(result => {
                    const orders = result.data;
                    const tableBody = document.querySelector("#orderTable tbody");
                    tableBody.innerHTML = "";

                    orders.forEach(order => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                        <td>${order.id}</td>
                        <td>${order.user_id}</td>
                        <td>${order.status}</td>
                        <td>${order.assigned_status}</td>
                        <td>${order.assigned_at}</td>
                        <td>${order.created_at}</td>
                        <td>
                            <button onclick="deleteOrder(${order.id}, this)">Delete</button>
                        </td>
                    `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error("Fetch error:", error));
        }

        function deleteOrder(id, buttonElement) {
            if (!confirm("Are you sure you want to delete this order?")) return;

            fetch(`/api/order/${id}`, {
                method: "DELETE",
                headers: {
                    "Authorization": "Bearer " + token,
                    "Accept": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    // Remove row from table
                    buttonElement.closest("tr").remove();
                })
                .catch(error => {
                    console.error("Delete error:", error);
                    alert("Failed to delete order.");
                });
        }

        // Call on load
        fetchOrders();
    </script>

</body>

</html>