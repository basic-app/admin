<?php

$adminTheme = service('adminTheme');

echo $adminTheme->pager(['pager' => $pager]);