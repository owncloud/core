<?php
/**
 * Created by PhpStorm.
 * User: kucuk
 * Date: 16.02.2019
 * Time: 12:35
 */

namespace OCA\Files_Sharing\Panels\Personal;


use \OCP\Settings\ISettings;
use OCP\Template;

class PersonalPanel implements ISettings {

    /**
     * The panel controller method that returns a template to the UI
     * @since 10.0
     * @return \OCP\AppFramework\Http\TemplateResponse | \OCP\Template
     */
    public function getPanel() {
        $template = new Template('files_sharing', 'userpaneltemplate');
        return $template;
    }

    /**
     * A string to identify the section in the UI / HTML and URL
     * @since 10.0
     * @return string
     */
    public function getSectionID()
    {
        return 'storage';
    }

    /**
     * The number used to order the section in the UI.
     * @since 10.0
     * @return int between 0 and 100, with 100 being the highest priority
     */
    public function getPriority()
    {
        return 50;
    }
}