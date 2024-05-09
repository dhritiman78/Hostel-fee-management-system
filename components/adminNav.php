<style>
    .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .btn {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
            margin: 2px 2px;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .nav-links li {
            margin: 8px 8px;
            list-style: none;
        }
        .nav-links li a{
            border: 2px solid green;
            border-radius: 10px;
            padding: 4px 4px;
            text-decoration: none;
            color: green;
        }
        .nav-links li a:hover{
            background-color: green;
            color: white;
        }
</style>
<ul class="nav-links">
        <li><a href="borders.php">Borders list</a></li>
        <li><a href="paidlist.php">Paid list</a></li>
        <li><a href="unpaidlist.php">Unpaid list</a></li>
        <li><a href="adminBody.php">Admin body</a></li>
        <li><a href="control_pages.php">Controls</a></li>
    </ul>