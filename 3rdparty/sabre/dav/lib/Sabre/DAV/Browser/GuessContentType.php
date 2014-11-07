<?php

namespace Sabre\DAV\Browser;

use Sabre\DAV;

/**
 * GuessContentType plugin
 *
 * A lot of the built-in File objects just return application/octet-stream
 * as a content-type by default. This is a problem for some clients, because
 * they expect a correct contenttype.
 *
 * There's really no accurate, fast and portable way to determine the contenttype
 * so this extension does what the rest of the world does, and guesses it based
 * on the file extension.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class GuessContentType extends DAV\ServerPlugin {

    /**
     * List of recognized file extensions
     *
     * Feel free to add more
     *
     * @var array
     */
    public $extensionMap = array(

        // images
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',

        // groupware
        'ics' => 'text/calendar',
        'vcf' => 'text/x-vcard',

        // text
        'txt' => 'text/plain',

    );

    /**
     * Initializes the plugin
     *
     * @param DAV\Server $server
     * @return void
     */
    public function initialize(DAV\Server $server) {

        // Using a relatively low priority (200) to allow other extensions
        // to set the content-type first.
        $server->subscribeEvent('afterGetProperties',array($this,'afterGetProperties'),200);

    }

    /**
     * Handler for teh afterGetProperties event
     *
     * @param string $path
     * @param array $properties
     * @return void
     */
    public function afterGetProperties($path, &$properties) {

        if (array_key_exists('{DAV:}getcontenttype', $properties[404])) {

            list(, $fileName) = DAV\URLUtil::splitPath($path);
            $contentType = $this->getContentType($fileName);

            if ($contentType) {
                $properties[200]['{DAV:}getcontenttype'] = $contentType;
                unset($properties[404]['{DAV:}getcontenttype']);
            }

        }

    }

    /**
     * Simple method to return the contenttype
     *
     * @param string $fileName
     * @return string
     */
    protected function getContentType($fileName) {

        // Just grabbing the extension
        $extension = strtolower(substr($fileName,strrpos($fileName,'.')+1));
        if (isset($this->extensionMap[$extension]))
            return $this->extensionMap[$extension];

    }

}
