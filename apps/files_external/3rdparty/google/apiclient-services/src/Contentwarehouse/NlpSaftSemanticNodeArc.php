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

namespace Google\Service\Contentwarehouse;

class NlpSaftSemanticNodeArc extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $implicit;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var int
   */
  public $semanticNode;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setImplicit($implicit)
  {
    $this->implicit = $implicit;
  }
  /**
   * @return bool
   */
  public function getImplicit()
  {
    return $this->implicit;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param int
   */
  public function setSemanticNode($semanticNode)
  {
    $this->semanticNode = $semanticNode;
  }
  /**
   * @return int
   */
  public function getSemanticNode()
  {
    return $this->semanticNode;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftSemanticNodeArc::class, 'Google_Service_Contentwarehouse_NlpSaftSemanticNodeArc');
