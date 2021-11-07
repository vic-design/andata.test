<?php


namespace App;


class Controller
{
    /**
     * compile template from header, content and footer
     *
     * @param string $template
     */
    public function render(string $template): void
    {
        $this->header();

        require_once APP_ROOT . VIEWS_DIR . '/' . $template . '.php';

        $this->footer();
    }

    public function header(): void
    {
        require_once APP_ROOT . VIEWS_DIR . LAYOUT_DIR . '/header.php';
    }

    public function footer(): void
    {
        require_once APP_ROOT . VIEWS_DIR . LAYOUT_DIR . '/footer.php';
    }

    /**
     * sent response as json
     * @param mixed $data
     */
    public function responseJSON(mixed $data):void
    {
        try {
            header('Content-type: application/json');
            print json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            print "Wrong JSON format";
        }
    }

    //run validation
    public function validate(Validator $validator, array $data)
    {
        return $validator->check($data);
    }
}