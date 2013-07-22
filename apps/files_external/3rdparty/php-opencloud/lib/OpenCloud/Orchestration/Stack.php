<?php
/**
 * Defines an OpenStack Heat Stack
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 * @author Stephen Sugden <openstack@stephensugden.com>
 */

namespace OpenCloud\Orchestration;

use OpenCloud\AbstractClass\PersistentObject;
use OpenCloud\Exceptions\CreateError;

/**
 * The Stack class requires a CloudFormation template and may contain additional
 * parameters for that template.
 *
 * A Stack is always associated with an (Orchestration) Service.
 *
 * @api
 * @author Stephen Sugden <openstack@stephensugden.com>
 */
class Stack extends PersistentObject {
    protected static
        $json_name = "stack",
        $url_resource = "stacks",
        $required_properties = array('template', 'stack_name');

    protected
        $id,
        $stack_name,
        $parameters,
        $template,
        $disable_rollback,
        $description,
        $stack_status_reason,
        $outputs,
        $creation_time,
        $links,
        $capabilities,
        $notification_topics,
        $timeout_mins,
        $stack_status,
        $updated_time,
        $template_description;

    public function __construct(Service $service, $info) {
        parent::__construct($service, $info);
    }

    protected function CreateJson() {
        $pk = $this->PrimaryKeyField();
        if (isset($this->{$pk})) {
            throw new CreateError("Stack is already created: {$this->$pk}");
        }

        $obj = new \stdClass();
        $obj->disable_rollback = false;
        $obj->timeout_mins = 60;

        foreach (self::$required_properties as $property) {
            if (is_null($this->{$property})) {
                $message = "Cannot create Stack with null $property";
                throw new CreateError($message);
            }
            else {
                $obj->$property = $this->$property;
            }
        }
        if (!is_null($this->parameters)) {
            $obj->parameters = $this->parameters;
        }
        return $obj;
    }

    public function Name() {
        return $this->stack_name;
    }

    public function Status() {
        return $this->stack_status;
    }

    public function Resource($id=NULL) {
        return new Resource($this, $id);
    }

    public function Resources() {
        $svc = $this->Service();
        $url = $this->Url('resources');
        return $svc->Collection('\OpenCloud\Orchestration\Resource', $url, $this);
    }
}
