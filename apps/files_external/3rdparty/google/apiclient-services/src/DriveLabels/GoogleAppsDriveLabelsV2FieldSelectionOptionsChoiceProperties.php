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

namespace Google\Service\DriveLabels;

class GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties extends \Google\Model
{
  protected $badgeConfigType = GoogleAppsDriveLabelsV2BadgeConfig::class;
  protected $badgeConfigDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $insertBeforeChoice;

  /**
   * @param GoogleAppsDriveLabelsV2BadgeConfig
   */
  public function setBadgeConfig(GoogleAppsDriveLabelsV2BadgeConfig $badgeConfig)
  {
    $this->badgeConfig = $badgeConfig;
  }
  /**
   * @return GoogleAppsDriveLabelsV2BadgeConfig
   */
  public function getBadgeConfig()
  {
    return $this->badgeConfig;
  }
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
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setInsertBeforeChoice($insertBeforeChoice)
  {
    $this->insertBeforeChoice = $insertBeforeChoice;
  }
  /**
   * @return string
   */
  public function getInsertBeforeChoice()
  {
    return $this->insertBeforeChoice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties');
