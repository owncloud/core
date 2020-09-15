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

class Google_Service_TrafficDirectorService_ListenersConfigDump extends Google_Collection
{
  protected $collection_key = 'staticListeners';
  protected $dynamicListenersType = 'Google_Service_TrafficDirectorService_DynamicListener';
  protected $dynamicListenersDataType = 'array';
  protected $staticListenersType = 'Google_Service_TrafficDirectorService_StaticListener';
  protected $staticListenersDataType = 'array';
  public $versionInfo;

  /**
   * @param Google_Service_TrafficDirectorService_DynamicListener
   */
  public function setDynamicListeners($dynamicListeners)
  {
    $this->dynamicListeners = $dynamicListeners;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicListener
   */
  public function getDynamicListeners()
  {
    return $this->dynamicListeners;
  }
  /**
   * @param Google_Service_TrafficDirectorService_StaticListener
   */
  public function setStaticListeners($staticListeners)
  {
    $this->staticListeners = $staticListeners;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StaticListener
   */
  public function getStaticListeners()
  {
    return $this->staticListeners;
  }
  public function setVersionInfo($versionInfo)
  {
    $this->versionInfo = $versionInfo;
  }
  public function getVersionInfo()
  {
    return $this->versionInfo;
  }
}
