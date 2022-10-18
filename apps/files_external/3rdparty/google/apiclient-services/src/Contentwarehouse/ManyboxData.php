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

class ManyboxData extends \Google\Model
{
  protected $componentsType = Proto2BridgeMessageSet::class;
  protected $componentsDataType = '';
  /**
   * @var int
   */
  public $dataSummary;
  /**
   * @var string
   */
  public $debug;

  /**
   * @param Proto2BridgeMessageSet
   */
  public function setComponents(Proto2BridgeMessageSet $components)
  {
    $this->components = $components;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getComponents()
  {
    return $this->components;
  }
  /**
   * @param int
   */
  public function setDataSummary($dataSummary)
  {
    $this->dataSummary = $dataSummary;
  }
  /**
   * @return int
   */
  public function getDataSummary()
  {
    return $this->dataSummary;
  }
  /**
   * @param string
   */
  public function setDebug($debug)
  {
    $this->debug = $debug;
  }
  /**
   * @return string
   */
  public function getDebug()
  {
    return $this->debug;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManyboxData::class, 'Google_Service_Contentwarehouse_ManyboxData');
