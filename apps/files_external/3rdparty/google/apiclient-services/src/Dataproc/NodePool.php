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

namespace Google\Service\Dataproc;

class NodePool extends \Google\Collection
{
  protected $collection_key = 'instanceNames';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $instanceNames;
  /**
   * @var string
   */
  public $repairAction;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setInstanceNames($instanceNames)
  {
    $this->instanceNames = $instanceNames;
  }
  /**
   * @return string[]
   */
  public function getInstanceNames()
  {
    return $this->instanceNames;
  }
  /**
   * @param string
   */
  public function setRepairAction($repairAction)
  {
    $this->repairAction = $repairAction;
  }
  /**
   * @return string
   */
  public function getRepairAction()
  {
    return $this->repairAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodePool::class, 'Google_Service_Dataproc_NodePool');
