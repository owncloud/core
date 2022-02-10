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

namespace Google\Service\MyBusinessBusinessInformation;

class Metadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $canDelete;
  /**
   * @var bool
   */
  public $canHaveBusinessCalls;
  /**
   * @var bool
   */
  public $canHaveFoodMenus;
  /**
   * @var bool
   */
  public $canModifyServiceList;
  /**
   * @var bool
   */
  public $canOperateHealthData;
  /**
   * @var bool
   */
  public $canOperateLocalPost;
  /**
   * @var bool
   */
  public $canOperateLodgingData;
  /**
   * @var string
   */
  public $duplicateLocation;
  /**
   * @var bool
   */
  public $hasGoogleUpdated;
  /**
   * @var bool
   */
  public $hasPendingEdits;
  /**
   * @var string
   */
  public $mapsUri;
  /**
   * @var string
   */
  public $newReviewUri;
  /**
   * @var string
   */
  public $placeId;

  /**
   * @param bool
   */
  public function setCanDelete($canDelete)
  {
    $this->canDelete = $canDelete;
  }
  /**
   * @return bool
   */
  public function getCanDelete()
  {
    return $this->canDelete;
  }
  /**
   * @param bool
   */
  public function setCanHaveBusinessCalls($canHaveBusinessCalls)
  {
    $this->canHaveBusinessCalls = $canHaveBusinessCalls;
  }
  /**
   * @return bool
   */
  public function getCanHaveBusinessCalls()
  {
    return $this->canHaveBusinessCalls;
  }
  /**
   * @param bool
   */
  public function setCanHaveFoodMenus($canHaveFoodMenus)
  {
    $this->canHaveFoodMenus = $canHaveFoodMenus;
  }
  /**
   * @return bool
   */
  public function getCanHaveFoodMenus()
  {
    return $this->canHaveFoodMenus;
  }
  /**
   * @param bool
   */
  public function setCanModifyServiceList($canModifyServiceList)
  {
    $this->canModifyServiceList = $canModifyServiceList;
  }
  /**
   * @return bool
   */
  public function getCanModifyServiceList()
  {
    return $this->canModifyServiceList;
  }
  /**
   * @param bool
   */
  public function setCanOperateHealthData($canOperateHealthData)
  {
    $this->canOperateHealthData = $canOperateHealthData;
  }
  /**
   * @return bool
   */
  public function getCanOperateHealthData()
  {
    return $this->canOperateHealthData;
  }
  /**
   * @param bool
   */
  public function setCanOperateLocalPost($canOperateLocalPost)
  {
    $this->canOperateLocalPost = $canOperateLocalPost;
  }
  /**
   * @return bool
   */
  public function getCanOperateLocalPost()
  {
    return $this->canOperateLocalPost;
  }
  /**
   * @param bool
   */
  public function setCanOperateLodgingData($canOperateLodgingData)
  {
    $this->canOperateLodgingData = $canOperateLodgingData;
  }
  /**
   * @return bool
   */
  public function getCanOperateLodgingData()
  {
    return $this->canOperateLodgingData;
  }
  /**
   * @param string
   */
  public function setDuplicateLocation($duplicateLocation)
  {
    $this->duplicateLocation = $duplicateLocation;
  }
  /**
   * @return string
   */
  public function getDuplicateLocation()
  {
    return $this->duplicateLocation;
  }
  /**
   * @param bool
   */
  public function setHasGoogleUpdated($hasGoogleUpdated)
  {
    $this->hasGoogleUpdated = $hasGoogleUpdated;
  }
  /**
   * @return bool
   */
  public function getHasGoogleUpdated()
  {
    return $this->hasGoogleUpdated;
  }
  /**
   * @param bool
   */
  public function setHasPendingEdits($hasPendingEdits)
  {
    $this->hasPendingEdits = $hasPendingEdits;
  }
  /**
   * @return bool
   */
  public function getHasPendingEdits()
  {
    return $this->hasPendingEdits;
  }
  /**
   * @param string
   */
  public function setMapsUri($mapsUri)
  {
    $this->mapsUri = $mapsUri;
  }
  /**
   * @return string
   */
  public function getMapsUri()
  {
    return $this->mapsUri;
  }
  /**
   * @param string
   */
  public function setNewReviewUri($newReviewUri)
  {
    $this->newReviewUri = $newReviewUri;
  }
  /**
   * @return string
   */
  public function getNewReviewUri()
  {
    return $this->newReviewUri;
  }
  /**
   * @param string
   */
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  /**
   * @return string
   */
  public function getPlaceId()
  {
    return $this->placeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metadata::class, 'Google_Service_MyBusinessBusinessInformation_Metadata');
