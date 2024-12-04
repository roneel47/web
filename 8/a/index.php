<?php
// File to store the visitor count
$counterFile = 'visitor_count.txt';
// Check if the counter file exists
if (!file_exists($counterFile)) {
    // If not, create the file and initialize the count to 0
    file_put_contents($counterFile, '0');
}
// Read the current count
$visitorCount = (int) file_get_contents($counterFile);
// Increment the count
$visitorCount++;
// Write the new count back to the file
file_put_contents($counterFile, $visitorCount);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to Our Website!</h1>
        <h2>Number of Visitors</h2>
        <p>The number of visitors to this page is: <?php echo $visitorCount; ?></p>
    </div>
</body>

</html>