<?php
View('client/header');
View($subview, ['data' => $data ?? null]);
View('client/footer');
