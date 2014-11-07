<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Stephen Sugden <openstack@stephensugden.com>
 */

namespace OpenCloud\Orchestration;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Exceptions\CreateError;

/**
 * The Stack class requires a CloudFormation template and may contain additional
 * parameters for that template.
 *
 * A Stack is always associated with an (Orchestration) Service.
 * 
 * @codeCoverageIgnore
 */
class Stack extends PersistentObject 
{
    /**
     * Identifier of stack.
     * 
     * @var string 
     */
    protected $id;
    
    /**
     * The name associated with the stack. Must be unique within your account, 
     * contain only alphanumeric characters (case sensitive) and start with an 
     * alpha character. Maximum length of the name is 255 characters.
     * 
     * @var string 
     */
    protected $stack_name;
    
    /**
     * A list of Parameter structures that specify input parameters for the stack.
     * 
     * @var mixed 
     */
    protected $parameters;
    
    /**
     * Structure containing the template body.
     * 
     * @var string
     */
    protected $template;
    
    /**
     * Set to true to disable rollback of the stack if stack creation failed.
     * 
     * @var bool 
     */
    protected $disable_rollback;
    
    /**
     * Description of stack.
     * 
     * @var string 
     */
    protected $description;
    
    /**
     * @var type 
     */
    protected $stack_status_reason;
    
    /**
     * @var type 
     */
    protected $outputs;
    
    /**
     * @var type 
     */
    protected $creation_time;
    
    /**
     * Array of stack lists.
     * 
     * @var array 
     */
    protected $links;
    
    /**
     * The list of capabilities that you want to allow in the stack.
     * 
     * @var mixed 
     */
    protected $capabilities;
    
    /**
     * The Simple Notification Service topic ARNs to publish stack related events.
     * 
     * @var mixed 
     */
    protected $notification_topics;
    
    /**
     * The amount of time that can pass before the stack status becomes 
     * CREATE_FAILED; if DisableRollback is not set or is set to false, the 
     * stack will be rolled back.
     * 
     * @var string 
     */
    protected $timeout_mins;
    
    /**
     * @var type
     */
    protected $stack_status;
    
    /**
     * @var type
     */
    protected $updated_time;
    
    /**
     * @var type
     */
    protected $template_description;
    
    protected static $json_name = "stack";
    protected static $url_resource = "stacks";
    protected $createKeys = array(
        'template', 
        'stack_name'
    );

    /**
     * {@inheritDoc}
     */
    protected function createJson() 
    {
        $pk = $this->primaryKeyField();
        
        if (!empty($this->{$pk})) {
            throw new CreateError(sprintf(
                'Stack is already created and has ID of %s',
                $this->$pk
            ));
        }

        $object = (object) array('disable_rollback' => false, 'timeout_mins' => 60);

        foreach ($this->createKeys as $property) {
            if (empty($this->$property)) {
                throw new CreateError(sprintf(
                    'Cannot create Stack with null %s', 
                    $property
                ));
            } else {
                $object->$property = $this->$property;
            }
        }
        
        if (null !== $this->parameters) {
            $object->parameters = $this->parameters;
        }
        
        return $object;
    }

    public function name() 
    {
        return $this->stack_name;
    }

    public function status() 
    {
        return $this->stack_status;
    }

    public function resource($id = null) 
    {
        $resource = new Resource($this->getService());
        $resource->setParent($this);
        $resource->populate($id);
        return $resource;
    }

    public function resources() 
    {
        return $this->getService()->collection(
            'OpenCloud\Orchestration\Resource', 
            $this->url('resources'), 
            $this
        );
    }
}
