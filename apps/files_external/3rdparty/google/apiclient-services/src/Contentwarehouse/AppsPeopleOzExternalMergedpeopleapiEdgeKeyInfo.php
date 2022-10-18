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

class AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $containerType;
  protected $extendedDataType = AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfoExtensionData::class;
  protected $extendedDataDataType = '';
  /**
   * @var bool
   */
  public $materialized;

  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string
   */
  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return string
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfoExtensionData
   */
  public function setExtendedData(AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfoExtensionData $extendedData)
  {
    $this->extendedData = $extendedData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfoExtensionData
   */
  public function getExtendedData()
  {
    return $this->extendedData;
  }
  /**
   * @param bool
   */
  public function setMaterialized($materialized)
  {
    $this->materialized = $materialized;
  }
  /**
   * @return bool
   */
  public function getMaterialized()
  {
    return $this->materialized;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo');
