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

class GeostoreFeatureIdForwardingsProto extends \Google\Collection
{
  protected $collection_key = 'inactiveDuplicate';
  protected $duplicateOfType = GeostoreFeatureIdProto::class;
  protected $duplicateOfDataType = '';
  protected $forwardedIdType = GeostoreFeatureIdProto::class;
  protected $forwardedIdDataType = '';
  protected $inactiveDuplicateType = GeostoreFeatureIdProto::class;
  protected $inactiveDuplicateDataType = 'array';
  protected $replacedByType = GeostoreFeatureIdListProto::class;
  protected $replacedByDataType = '';
  protected $transitivelyDuplicateOfType = GeostoreFeatureIdProto::class;
  protected $transitivelyDuplicateOfDataType = '';

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setDuplicateOf(GeostoreFeatureIdProto $duplicateOf)
  {
    $this->duplicateOf = $duplicateOf;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getDuplicateOf()
  {
    return $this->duplicateOf;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setForwardedId(GeostoreFeatureIdProto $forwardedId)
  {
    $this->forwardedId = $forwardedId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getForwardedId()
  {
    return $this->forwardedId;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setInactiveDuplicate($inactiveDuplicate)
  {
    $this->inactiveDuplicate = $inactiveDuplicate;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getInactiveDuplicate()
  {
    return $this->inactiveDuplicate;
  }
  /**
   * @param GeostoreFeatureIdListProto
   */
  public function setReplacedBy(GeostoreFeatureIdListProto $replacedBy)
  {
    $this->replacedBy = $replacedBy;
  }
  /**
   * @return GeostoreFeatureIdListProto
   */
  public function getReplacedBy()
  {
    return $this->replacedBy;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setTransitivelyDuplicateOf(GeostoreFeatureIdProto $transitivelyDuplicateOf)
  {
    $this->transitivelyDuplicateOf = $transitivelyDuplicateOf;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getTransitivelyDuplicateOf()
  {
    return $this->transitivelyDuplicateOf;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFeatureIdForwardingsProto::class, 'Google_Service_Contentwarehouse_GeostoreFeatureIdForwardingsProto');
