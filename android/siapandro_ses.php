<?php
@session_start();
if ($_SESSION['siapandro_level'] == 2) {
    header('Location: ' . $docandro . 'm');
}
