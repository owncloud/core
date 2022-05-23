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

class CustomBiddingAlgorithm extends \Google\Collection
{
  protected $collection_key = 'sharedAdvertiserIds';
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $customBiddingAlgorithmId;
  /**
   * @var string
   */
  public $customBiddingAlgorithmState;
  /**
   * @var string
   */
  public $customBiddingAlgorithmType;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityStatus;
  protected $modelReadinessType = CustomBiddingModelReadinessState::class;
  protected $modelReadinessDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $partnerId;
  /**
   * @var string[]
   */
  public $sharedAdvertiserIds;

  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setCustomBiddingAlgorithmId($customBiddingAlgorithmId)
  {
    $this->customBiddingAlgorithmId = $customBiddingAlgorithmId;
  }
  /**
   * @return string
   */
  public function getCustomBiddingAlgorithmId()
  {
    return $this->customBiddingAlgorithmId;
  }
  /**
   * @param string
   */
  public function setCustomBiddingAlgorithmState($customBiddingAlgorithmState)
  {
    $this->customBiddingAlgorithmState = $customBiddingAlgorithmState;
  }
  /**
   * @return string
   */
  public function getCustomBiddingAlgorithmState()
  {
    return $this->customBiddingAlgorithmState;
  }
  /**
   * @param string
   */
  public function setCustomBiddingAlgorithmType($customBiddingAlgorithmType)
  {
    $this->customBiddingAlgorithmType = $customBiddingAlgorithmType;
  }
  /**
   * @return string
   */
  public function getCustomBiddingAlgorithmType()
  {
    return $this->customBiddingAlgorithmType;
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
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
  /**
   * @return string
   */
  public function getEntityStatus()
  {
    return $this->entityStatus;
  }
  /**
   * @param CustomBiddingModelReadinessState[]
   */
  public function setModelReadiness($modelReadiness)
  {
    $this->modelReadiness = $modelReadiness;
  }
  /**
   * @return CustomBiddingModelReadinessState[]
   */
  public function getModelReadiness()
  {
    return $this->modelReadiness;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  /**
   * @return string
   */
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  /**
   * @param string[]
   */
  public function setSharedAdvertiserIds($sharedAdvertiserIds)
  {
    $this->sharedAdvertiserIds = $sharedAdvertiserIds;
  }
  /**
   * @return string[]
   */
  public function getSharedAdvertiserIds()
  {
    return $this->sharedAdvertiserIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomBiddingAlgorithm::class, 'Google_Service_DisplayVideo_CustomBiddingAlgorithm');
