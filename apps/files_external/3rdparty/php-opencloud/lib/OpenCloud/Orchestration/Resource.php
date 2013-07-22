<?php
/**
 * Defines an OpenStack Heat Stack
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Stephen Sugden <openstack@stephensugden.com>
 */

namespace OpenCloud\Orchestration;

use OpenCloud\AbstractClass\PersistentObject;

class Resource extends PersistentObject {
    protected static
        $url_resource = 'resources',
        $json_name = 'resource';

    protected
        $links,
        $logical_resource_id,
        $physical_resource_id,
        $resource_status,
        $resource_status_reason,
        $resource_type,
        $updated_time;

    public function Create($info=null) {
        $this->NoCreate();
    }

    public function Id() {
        return $this->physical_resource_id;
    }

    protected function PrimaryKeyField() {
        return 'physical_resource_id';
    }

    public function Name() {
        return $this->logical_resource_id;
    }

    public function Type() {
        return $this->resource_type;
    }

    public function Status() {
        return $this->resource_status;
    }

    public function Get() {
        $svc = $this->Parent()->Service();
        $conn = $svc->Connection();
        switch ($this->resource_type) {
        case 'AWS::EC2::Instance':
            $objSvc = 'Compute';
            $method = 'Server';
            $name = 'nova';
            break;
        default:
            throw new Exception("Unknown resource type {$this->resource_type}");
        }
        return $conn->$objSvc($name, $svc->Region())->$method($this->Id());
    }
}
