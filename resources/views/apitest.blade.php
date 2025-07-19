<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Order</title>
</head>

<body>

    <h2>Create Order via API (Fetch)</h2>

    <input type="number" id="user_id" placeholder="User ID"> <br><br>
    <input type="text" id="status" placeholder="Status"> <br><br>
    <button onclick="createOrder()">Create Order</button>

    <p id="response"></p>

    <script>
        function createOrder() {
            const user_id = document.getElementById('user_id').value;
            const status = document.getElementById('status').value;

            fetch("{{ url('/api/createOrder') }}", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer 17|DlsWVKVlhqOkohcprxzVZRvg3wWqSWaDmbtVRjWFb5b281b1",
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    user_id: user_id,
                    status: status,
                    assigned_status: "assigned",
                    assigned_at: new Date().toISOString()
                })
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("response").innerText = data.message;
                    console.log(data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    </script>

</body>

</html>