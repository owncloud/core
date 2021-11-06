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

namespace Google\Service\DisplayVideo;

class FloodlightGroup extends \Google\Model
{
  protected $activeViewConfigType = ActiveViewVideoViewabilityMetricConfig::class;
  protected $activeViewConfigDataType = '';
  public $customVariables;
  public $displayName;
  public $floodlightGroupId;
  protected $lookbackWindowType = LookbackWindow::class;
  protected $lookbackWindowDataType = '';
  public $name;
  public $webTagType;

  /**
   * @param ActiveViewVideoViewabilityMetricConfig
   */
  public function setActiveViewConfig(ActiveViewVideoViewabilityMetricConfig $activeViewConfig)
  {
    $this->activeViewConfig = $activeViewConfig;
  }
  /**
   * @return ActiveViewVideoViewabilityMetricConfig
   */
  public function getActiveViewConfig()
  {
    return $this->activeViewConfig;
  }
  public function setCustomVariables($customVariables)
  {
    $this->customVariables = $customVariables;
  }
  public function getCustomVariables()
  {
    return $this->customVariables;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFloodlightGroupId($floodlightGroupId)
  {
    $this->floodlightGroupId = $floodlightGroupId;
  }
  public function getFloodlightGroupId()
  {
    return $this->floodlightGroupId;
  }
  /**
   * @param LookbackWindow
   */
  public function setLookbackWindow(LookbackWindow $lookbackWindow)
  {
    $this->lookbackWindow = $lookbackWindow;
  }
  /**
   * @return LookbackWindow
   */
  public function getLookbackWindow()
  {
    return $this->lookbackWindow;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setWebTagType($webTagType)
  {
    $this->webTagType = $webTagType;
  }
  public function getWebTagType()
  {
    return $this->webTagType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightGroup::class, 'Google_Service_DisplayVideo_FloodlightGroup');
