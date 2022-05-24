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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ValidationMessage extends \Google\Collection
{
  protected $collection_key = 'resources';
  /**
   * @var string
   */
  public $detail;
  protected $resourceNamesType = GoogleCloudDialogflowCxV3ResourceName::class;
  protected $resourceNamesDataType = 'array';
  /**
   * @var string
   */
  public $resourceType;
  /**
   * @var string[]
   */
  public $resources;
  /**
   * @var string
   */
  public $severity;

  /**
   * @param string
   */
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return string
   */
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResourceName[]
   */
  public function setResourceNames($resourceNames)
  {
    $this->resourceNames = $resourceNames;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResourceName[]
   */
  public function getResourceNames()
  {
    return $this->resourceNames;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
  /**
   * @param string[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return string[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ValidationMessage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ValidationMessage');
