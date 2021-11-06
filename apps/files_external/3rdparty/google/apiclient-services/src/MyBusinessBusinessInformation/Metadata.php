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
  public $canDelete;
  public $canHaveFoodMenus;
  public $canModifyServiceList;
  public $canOperateHealthData;
  public $canOperateLocalPost;
  public $canOperateLodgingData;
  public $duplicateLocation;
  public $hasGoogleUpdated;
  public $hasPendingEdits;
  public $mapsUri;
  public $newReviewUri;
  public $placeId;

  public function setCanDelete($canDelete)
  {
    $this->canDelete = $canDelete;
  }
  public function getCanDelete()
  {
    return $this->canDelete;
  }
  public function setCanHaveFoodMenus($canHaveFoodMenus)
  {
    $this->canHaveFoodMenus = $canHaveFoodMenus;
  }
  public function getCanHaveFoodMenus()
  {
    return $this->canHaveFoodMenus;
  }
  public function setCanModifyServiceList($canModifyServiceList)
  {
    $this->canModifyServiceList = $canModifyServiceList;
  }
  public function getCanModifyServiceList()
  {
    return $this->canModifyServiceList;
  }
  public function setCanOperateHealthData($canOperateHealthData)
  {
    $this->canOperateHealthData = $canOperateHealthData;
  }
  public function getCanOperateHealthData()
  {
    return $this->canOperateHealthData;
  }
  public function setCanOperateLocalPost($canOperateLocalPost)
  {
    $this->canOperateLocalPost = $canOperateLocalPost;
  }
  public function getCanOperateLocalPost()
  {
    return $this->canOperateLocalPost;
  }
  public function setCanOperateLodgingData($canOperateLodgingData)
  {
    $this->canOperateLodgingData = $canOperateLodgingData;
  }
  public function getCanOperateLodgingData()
  {
    return $this->canOperateLodgingData;
  }
  public function setDuplicateLocation($duplicateLocation)
  {
    $this->duplicateLocation = $duplicateLocation;
  }
  public function getDuplicateLocation()
  {
    return $this->duplicateLocation;
  }
  public function setHasGoogleUpdated($hasGoogleUpdated)
  {
    $this->hasGoogleUpdated = $hasGoogleUpdated;
  }
  public function getHasGoogleUpdated()
  {
    return $this->hasGoogleUpdated;
  }
  public function setHasPendingEdits($hasPendingEdits)
  {
    $this->hasPendingEdits = $hasPendingEdits;
  }
  public function getHasPendingEdits()
  {
    return $this->hasPendingEdits;
  }
  public function setMapsUri($mapsUri)
  {
    $this->mapsUri = $mapsUri;
  }
  public function getMapsUri()
  {
    return $this->mapsUri;
  }
  public function setNewReviewUri($newReviewUri)
  {
    $this->newReviewUri = $newReviewUri;
  }
  public function getNewReviewUri()
  {
    return $this->newReviewUri;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metadata::class, 'Google_Service_MyBusinessBusinessInformation_Metadata');
