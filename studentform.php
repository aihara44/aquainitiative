<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Simple Form and View Table</title>
</head>
<body>
    <h2>Input Form</h2>
    <form id="userForm">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" /><br /><br />
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" /><br /><br />
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" /><br /><br />
        <button type="button" onclick="addUser()">Add User</button>
    </form>

    <h2>View Table</h2>
    <table border="1" id="viewTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        function addUser() {
            var id = document.getElementById('id').value.trim();
            var name = document.getElementById('name').value.trim();
            var age = document.getElementById('age').value.trim();

            if(id && name && age) {
                var tbody = document.getElementById('viewTable').getElementsByTagName('tbody')[0];
                var newRow = tbody.insertRow();

                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);

                cell1.textContent = id;
                cell2.textContent = name;
                cell3.textContent = age;

                document.getElementById('userForm').reset();
            } else {
                alert('Please fill all fields');
            }
        }
    </script>
</body>
</html>
