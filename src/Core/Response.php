<?php
namespace App\Core;

/**
 * Class Response
 * @package App\Core
 */
class Response
{
    /**
     * @param string $view
     * @param string $layout
     * @param array $data
     * @return false|string
     */
    function renderView(string $view, string $layout, array $data = [])
    {
        extract($data);

        ob_start();
        require __DIR__ . "/../../views/$view.view.php";
        $mainContent = ob_get_clean();

        ob_start();
        require __DIR__ . "/../../views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * @param $element
     * @return false|string
     */
    public function jsonResponse($element)
    {
        header('Content-Type: application/json; charset=UTF-8');
        return json_encode($element);

    }

}