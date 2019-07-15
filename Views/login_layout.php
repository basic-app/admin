<?php

$adminTheme = service('adminTheme');

echo $adminTheme->loginLayout([
    'content' => $content
]);