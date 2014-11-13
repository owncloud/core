<?php

namespace Sabre\DAVACL\Property;

use Sabre\DAV;

/**
 * SupportedPrivilegeSet property
 *
 * This property encodes the {DAV:}supported-privilege-set property, as defined
 * in rfc3744. Please consult the rfc for details about it's structure.
 *
 * This class expects a structure like the one given from
 * Sabre\DAVACL\Plugin::getSupportedPrivilegeSet as the argument in its
 * constructor.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedPrivilegeSet extends DAV\Property {

    /**
     * privileges
     *
     * @var array
     */
    private $privileges;

    /**
     * Constructor
     *
     * @param array $privileges
     */
    public function __construct(array $privileges) {

        $this->privileges = $privileges;

    }

    /**
     * Serializes the property into a domdocument.
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

        $doc = $node->ownerDocument;
        $this->serializePriv($doc, $node, $this->privileges);

    }

    /**
     * Serializes a property
     *
     * This is a recursive function.
     *
     * @param \DOMDocument $doc
     * @param \DOMElement $node
     * @param array $privilege
     * @return void
     */
    private function serializePriv($doc,$node,$privilege) {

        $xsp = $doc->createElementNS('DAV:','d:supported-privilege');
        $node->appendChild($xsp);

        $xp  = $doc->createElementNS('DAV:','d:privilege');
        $xsp->appendChild($xp);

        $privParts = null;
        preg_match('/^{([^}]*)}(.*)$/',$privilege['privilege'],$privParts);

        $xp->appendChild($doc->createElementNS($privParts[1],'d:'.$privParts[2]));

        if (isset($privilege['abstract']) && $privilege['abstract']) {
            $xsp->appendChild($doc->createElementNS('DAV:','d:abstract'));
        }

        if (isset($privilege['description'])) {
            $xsp->appendChild($doc->createElementNS('DAV:','d:description',$privilege['description']));
        }

        if (isset($privilege['aggregates'])) {
            foreach($privilege['aggregates'] as $subPrivilege) {
                $this->serializePriv($doc,$xsp,$subPrivilege);
            }
        }

    }

}
