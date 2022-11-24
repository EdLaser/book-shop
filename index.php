<!DOCTYPE html>
<html lang="en">

<?php include './components/head.php' ?>

<body>
    <?php include './components/header.php' ?>
    <main class="bg-dark vh-100">
        <div class="d-flex flex-row">
            <?php include './components/sidebar.php' ?>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                test
            </div>
            <?php include './components/aside.php' ?>
        </div>
    </main>
    <?php include './components/footer.php' ?>
</body>

</html>