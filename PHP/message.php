<?php
function showMessage($session, $type)
{
    ?>
    <div class="bs-toast toast fade show bg-<?php echo $type ?> mb-4" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Message</div>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $session; ?>
        </div>
    </div>
    <?php
}
?>