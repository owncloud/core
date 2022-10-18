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

class QualityActionsAppInfoSourceData extends \Google\Model
{
  protected $allowListSourceDataType = QualityActionsAppInfoSourceDataAllowListSourceData::class;
  protected $allowListSourceDataDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $install;
  /**
   * @var bool
   */
  public $isCategorical;
  protected $mediaProviderSourceDataType = QualityActionsAppInfoSourceDataMediaProviderSourceData::class;
  protected $mediaProviderSourceDataDataType = '';
  /**
   * @var string
   */
  public $source;
  protected $teleportSourceDataType = AssistantTeleportTeleportNicknameSignals::class;
  protected $teleportSourceDataDataType = '';

  /**
   * @param QualityActionsAppInfoSourceDataAllowListSourceData
   */
  public function setAllowListSourceData(QualityActionsAppInfoSourceDataAllowListSourceData $allowListSourceData)
  {
    $this->allowListSourceData = $allowListSourceData;
  }
  /**
   * @return QualityActionsAppInfoSourceDataAllowListSourceData
   */
  public function getAllowListSourceData()
  {
    return $this->allowListSourceData;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setInstall($install)
  {
    $this->install = $install;
  }
  /**
   * @return string
   */
  public function getInstall()
  {
    return $this->install;
  }
  /**
   * @param bool
   */
  public function setIsCategorical($isCategorical)
  {
    $this->isCategorical = $isCategorical;
  }
  /**
   * @return bool
   */
  public function getIsCategorical()
  {
    return $this->isCategorical;
  }
  /**
   * @param QualityActionsAppInfoSourceDataMediaProviderSourceData
   */
  public function setMediaProviderSourceData(QualityActionsAppInfoSourceDataMediaProviderSourceData $mediaProviderSourceData)
  {
    $this->mediaProviderSourceData = $mediaProviderSourceData;
  }
  /**
   * @return QualityActionsAppInfoSourceDataMediaProviderSourceData
   */
  public function getMediaProviderSourceData()
  {
    return $this->mediaProviderSourceData;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param AssistantTeleportTeleportNicknameSignals
   */
  public function setTeleportSourceData(AssistantTeleportTeleportNicknameSignals $teleportSourceData)
  {
    $this->teleportSourceData = $teleportSourceData;
  }
  /**
   * @return AssistantTeleportTeleportNicknameSignals
   */
  public function getTeleportSourceData()
  {
    return $this->teleportSourceData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsAppInfoSourceData::class, 'Google_Service_Contentwarehouse_QualityActionsAppInfoSourceData');
