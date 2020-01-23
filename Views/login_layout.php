<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
$adminTheme = service('adminTheme');

echo $adminTheme->loginLayout([
    'content' => $content
]);