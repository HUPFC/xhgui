<?php
require dirname(__DIR__) . '/bootstrap.php';

$db = new Xhgui_Db();

$result = $db->getAll(array(
    'sort' => isset($_GET['sort']) ? $_GET['sort'] : null,
    'page' => isset($_GET['page']) ? $_GET['page'] : null,
    'perPage' => Xhgui_Config::read('page.limit'),
));


$template = load_template('runs/list.twig');
echo $template->render(array(
    'runs' => $result['results'],
    'page' => $result['page'],
    'sort' => $result['sort'],
    'total_pages' => $result['totalPages'],
    'date_format' => Xhgui_Config::read('date.format')
));
