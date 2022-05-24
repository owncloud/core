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

namespace Google\Service\Analytics;

class ProfileFilterLink extends \Google\Model
{
  protected $filterRefType = FilterRef::class;
  protected $filterRefDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $profileRefType = ProfileRef::class;
  protected $profileRefDataType = '';
  /**
   * @var int
   */
  public $rank;
  /**
   * @var string
   */
  public $selfLink;

  /**
   * @param FilterRef
   */
  public function setFilterRef(FilterRef $filterRef)
  {
    $this->filterRef = $filterRef;
  }
  /**
   * @return FilterRef
   */
  public function getFilterRef()
  {
    return $this->filterRef;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param ProfileRef
   */
  public function setProfileRef(ProfileRef $profileRef)
  {
    $this->profileRef = $profileRef;
  }
  /**
   * @return ProfileRef
   */
  public function getProfileRef()
  {
    return $this->profileRef;
  }
  /**
   * @param int
   */
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  /**
   * @return int
   */
  public function getRank()
  {
    return $this->rank;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProfileFilterLink::class, 'Google_Service_Analytics_ProfileFilterLink');
