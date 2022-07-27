<?php
if (!empty($_SESSION['alert'])) {
    foreach ($_SESSION['alert'] as $alert) {
        echo "<div class='alert " . $alert['type'] . "' role='alert'>
                        " . $alert['message'] . "
                    </div><style>.alert{margin:0.625rem;
                    font-size:23px;color:cyan}</style>";
    }
    unset($_SESSION['alert']);
}
?>