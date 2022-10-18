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

class AbuseiamUserRestriction extends \Google\Model
{
  protected $ageRestrictionType = AbuseiamAgeRestriction::class;
  protected $ageRestrictionDataType = '';
  protected $andRestrictionType = AbuseiamAndRestriction::class;
  protected $andRestrictionDataType = '';
  protected $constantRestrictionType = AbuseiamConstantRestriction::class;
  protected $constantRestrictionDataType = '';
  protected $geoRestrictionType = AbuseiamGeoRestriction::class;
  protected $geoRestrictionDataType = '';
  protected $notRestrictionType = AbuseiamNotRestriction::class;
  protected $notRestrictionDataType = '';
  protected $orRestrictionType = AbuseiamOrRestriction::class;
  protected $orRestrictionDataType = '';
  protected $specialRestrictionType = AbuseiamSpecialRestriction::class;
  protected $specialRestrictionDataType = '';

  /**
   * @param AbuseiamAgeRestriction
   */
  public function setAgeRestriction(AbuseiamAgeRestriction $ageRestriction)
  {
    $this->ageRestriction = $ageRestriction;
  }
  /**
   * @return AbuseiamAgeRestriction
   */
  public function getAgeRestriction()
  {
    return $this->ageRestriction;
  }
  /**
   * @param AbuseiamAndRestriction
   */
  public function setAndRestriction(AbuseiamAndRestriction $andRestriction)
  {
    $this->andRestriction = $andRestriction;
  }
  /**
   * @return AbuseiamAndRestriction
   */
  public function getAndRestriction()
  {
    return $this->andRestriction;
  }
  /**
   * @param AbuseiamConstantRestriction
   */
  public function setConstantRestriction(AbuseiamConstantRestriction $constantRestriction)
  {
    $this->constantRestriction = $constantRestriction;
  }
  /**
   * @return AbuseiamConstantRestriction
   */
  public function getConstantRestriction()
  {
    return $this->constantRestriction;
  }
  /**
   * @param AbuseiamGeoRestriction
   */
  public function setGeoRestriction(AbuseiamGeoRestriction $geoRestriction)
  {
    $this->geoRestriction = $geoRestriction;
  }
  /**
   * @return AbuseiamGeoRestriction
   */
  public function getGeoRestriction()
  {
    return $this->geoRestriction;
  }
  /**
   * @param AbuseiamNotRestriction
   */
  public function setNotRestriction(AbuseiamNotRestriction $notRestriction)
  {
    $this->notRestriction = $notRestriction;
  }
  /**
   * @return AbuseiamNotRestriction
   */
  public function getNotRestriction()
  {
    return $this->notRestriction;
  }
  /**
   * @param AbuseiamOrRestriction
   */
  public function setOrRestriction(AbuseiamOrRestriction $orRestriction)
  {
    $this->orRestriction = $orRestriction;
  }
  /**
   * @return AbuseiamOrRestriction
   */
  public function getOrRestriction()
  {
    return $this->orRestriction;
  }
  /**
   * @param AbuseiamSpecialRestriction
   */
  public function setSpecialRestriction(AbuseiamSpecialRestriction $specialRestriction)
  {
    $this->specialRestriction = $specialRestriction;
  }
  /**
   * @return AbuseiamSpecialRestriction
   */
  public function getSpecialRestriction()
  {
    return $this->specialRestriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseiamUserRestriction::class, 'Google_Service_Contentwarehouse_AbuseiamUserRestriction');
