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

class ImageRepositoryVenomStatus extends \Google\Collection
{
  protected $collection_key = 'settings';
  protected $aclType = VideoAssetsVenomACL::class;
  protected $aclDataType = '';
  /**
   * @var string
   */
  public $deletionTimestampUsec;
  /**
   * @var string
   */
  public $genus;
  /**
   * @var string
   */
  public $insertionResponseTimestampUsec;
  /**
   * @var string
   */
  public $insertionTimestampUsec;
  /**
   * @var int
   */
  public $lastInsertionAttemptsNum;
  /**
   * @var string
   */
  public $reason;
  protected $settingsType = VideoAssetsVenomSettings::class;
  protected $settingsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  protected $transitionType = VideoAssetsVenomTransition::class;
  protected $transitionDataType = '';
  protected $venomIdType = VideoAssetsVenomVideoId::class;
  protected $venomIdDataType = '';
  /**
   * @var string
   */
  public $venomMutationGeneration;

  /**
   * @param VideoAssetsVenomACL
   */
  public function setAcl(VideoAssetsVenomACL $acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return VideoAssetsVenomACL
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param string
   */
  public function setDeletionTimestampUsec($deletionTimestampUsec)
  {
    $this->deletionTimestampUsec = $deletionTimestampUsec;
  }
  /**
   * @return string
   */
  public function getDeletionTimestampUsec()
  {
    return $this->deletionTimestampUsec;
  }
  /**
   * @param string
   */
  public function setGenus($genus)
  {
    $this->genus = $genus;
  }
  /**
   * @return string
   */
  public function getGenus()
  {
    return $this->genus;
  }
  /**
   * @param string
   */
  public function setInsertionResponseTimestampUsec($insertionResponseTimestampUsec)
  {
    $this->insertionResponseTimestampUsec = $insertionResponseTimestampUsec;
  }
  /**
   * @return string
   */
  public function getInsertionResponseTimestampUsec()
  {
    return $this->insertionResponseTimestampUsec;
  }
  /**
   * @param string
   */
  public function setInsertionTimestampUsec($insertionTimestampUsec)
  {
    $this->insertionTimestampUsec = $insertionTimestampUsec;
  }
  /**
   * @return string
   */
  public function getInsertionTimestampUsec()
  {
    return $this->insertionTimestampUsec;
  }
  /**
   * @param int
   */
  public function setLastInsertionAttemptsNum($lastInsertionAttemptsNum)
  {
    $this->lastInsertionAttemptsNum = $lastInsertionAttemptsNum;
  }
  /**
   * @return int
   */
  public function getLastInsertionAttemptsNum()
  {
    return $this->lastInsertionAttemptsNum;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param VideoAssetsVenomSettings[]
   */
  public function setSettings($settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return VideoAssetsVenomSettings[]
   */
  public function getSettings()
  {
    return $this->settings;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param VideoAssetsVenomTransition
   */
  public function setTransition(VideoAssetsVenomTransition $transition)
  {
    $this->transition = $transition;
  }
  /**
   * @return VideoAssetsVenomTransition
   */
  public function getTransition()
  {
    return $this->transition;
  }
  /**
   * @param VideoAssetsVenomVideoId
   */
  public function setVenomId(VideoAssetsVenomVideoId $venomId)
  {
    $this->venomId = $venomId;
  }
  /**
   * @return VideoAssetsVenomVideoId
   */
  public function getVenomId()
  {
    return $this->venomId;
  }
  /**
   * @param string
   */
  public function setVenomMutationGeneration($venomMutationGeneration)
  {
    $this->venomMutationGeneration = $venomMutationGeneration;
  }
  /**
   * @return string
   */
  public function getVenomMutationGeneration()
  {
    return $this->venomMutationGeneration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryVenomStatus::class, 'Google_Service_Contentwarehouse_ImageRepositoryVenomStatus');
