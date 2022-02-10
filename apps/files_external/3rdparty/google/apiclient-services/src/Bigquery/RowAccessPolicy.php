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

namespace Google\Service\Bigquery;

class RowAccessPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $filterPredicate;
  /**
   * @var string
   */
  public $lastModifiedTime;
  protected $rowAccessPolicyReferenceType = RowAccessPolicyReference::class;
  protected $rowAccessPolicyReferenceDataType = '';

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setFilterPredicate($filterPredicate)
  {
    $this->filterPredicate = $filterPredicate;
  }
  /**
   * @return string
   */
  public function getFilterPredicate()
  {
    return $this->filterPredicate;
  }
  /**
   * @param string
   */
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param RowAccessPolicyReference
   */
  public function setRowAccessPolicyReference(RowAccessPolicyReference $rowAccessPolicyReference)
  {
    $this->rowAccessPolicyReference = $rowAccessPolicyReference;
  }
  /**
   * @return RowAccessPolicyReference
   */
  public function getRowAccessPolicyReference()
  {
    return $this->rowAccessPolicyReference;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RowAccessPolicy::class, 'Google_Service_Bigquery_RowAccessPolicy');
