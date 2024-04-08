<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <div id="profile">
                <h1>Profile Page</h1>
                <div class="label">Email:</div>
                <div class="value email"><?php echo $data['email']; ?></div>
                <div class="label">Username:</div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>