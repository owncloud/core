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

namespace Google\Service\Books;

class FamilyInfoMembership extends \Google\Model
{
  public $acquirePermission;
  public $ageGroup;
  public $allowedMaturityRating;
  public $isInFamily;
  public $role;

  public function setAcquirePermission($acquirePermission)
  {
    $this->acquirePermission = $acquirePermission;
  }
  public function getAcquirePermission()
  {
    return $this->acquirePermission;
  }
  public function setAgeGroup($ageGroup)
  {
    $this->ageGroup = $ageGroup;
  }
  public function getAgeGroup()
  {
    return $this->ageGroup;
  }
  public function setAllowedMaturityRating($allowedMaturityRating)
  {
    $this->allowedMaturityRating = $allowedMaturityRating;
  }
  public function getAllowedMaturityRating()
  {
    return $this->allowedMaturityRating;
  }
  public function setIsInFamily($isInFamily)
  {
    $this->isInFamily = $isInFamily;
  }
  public function getIsInFamily()
  {
    return $this->isInFamily;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FamilyInfoMembership::class, 'Google_Service_Books_FamilyInfoMembership');
