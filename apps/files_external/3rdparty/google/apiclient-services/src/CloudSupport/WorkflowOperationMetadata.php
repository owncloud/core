<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudSupport;

class WorkflowOperationMetadata extends \Google\Model
{
  public $namespace;
  public $operationAction;
  public $workflowOperationType;

  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  public function getNamespace()
  {
    return $this->namespace;
  }
  public function setOperationAction($operationAction)
  {
    $this->operationAction = $operationAction;
  }
  public function getOperationAction()
  {
    return $this->operationAction;
  }
  public function setWorkflowOperationType($workflowOperationType)
  {
    $this->workflowOperationType = $workflowOperationType;
  }
  public function getWorkflowOperationType()
  {
    return $this->workflowOperationType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkflowOperationMetadata::class, 'Google_Service_CloudSupport_WorkflowOperationMetadata');
