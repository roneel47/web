<?php
include 'db_config.php';
// Fetch student records
$sql = "SELECT id, name, score FROM students";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $students = [];
    // Store all student records in an array
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    // Selection sort algorithm to sort by score in descending order
    $n = count($students);
    for ($i = 0; $i < $n - 1; $i++) {
        $maxIdx = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($students[$j]['score'] > $students[$maxIdx]['score']) {
                $maxIdx = $j;
            }
        }
        // Swap the elements
        $temp = $students[$i];
        $students[$i] = $students[$maxIdx];
        $students[$maxIdx] = $temp;
    }
} else {
    $students = [];
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Student Records</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Sorted Student Records</h1>
        <?php if (empty($students)): ?>
            <p>No student records found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['name']); ?></td>
                            <td><?php echo htmlspecialchars($student['score']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>