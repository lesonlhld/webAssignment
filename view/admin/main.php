<?php
View('admin/header');
View($subview, ['data' => $data ?? null]);
View('admin/footer');
