<?php

echo view_cell('Admin::authLayout', [
    'slot' => $this->renderSection('content')
]);