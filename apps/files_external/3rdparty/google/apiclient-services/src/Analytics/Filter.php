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

class Filter extends \Google\Model
{
  public $accountId;
  protected $advancedDetailsType = FilterAdvancedDetails::class;
  protected $advancedDetailsDataType = '';
  public $created;
  protected $excludeDetailsType = FilterExpression::class;
  protected $excludeDetailsDataType = '';
  public $id;
  protected $includeDetailsType = FilterExpression::class;
  protected $includeDetailsDataType = '';
  public $kind;
  protected $lowercaseDetailsType = FilterLowercaseDetails::class;
  protected $lowercaseDetailsDataType = '';
  public $name;
  protected $parentLinkType = FilterParentLink::class;
  protected $parentLinkDataType = '';
  protected $searchAndReplaceDetailsType = FilterSearchAndReplaceDetails::class;
  protected $searchAndReplaceDetailsDataType = '';
  public $selfLink;
  public $type;
  public $updated;
  protected $uppercaseDetailsType = FilterUppercaseDetails::class;
  protected $uppercaseDetailsDataType = '';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param FilterAdvancedDetails
   */
  public function setAdvancedDetails(FilterAdvancedDetails $advancedDetails)
  {
    $this->advancedDetails = $advancedDetails;
  }
  /**
   * @return FilterAdvancedDetails
   */
  public function getAdvancedDetails()
  {
    return $this->advancedDetails;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param FilterExpression
   */
  public function setExcludeDetails(FilterExpression $excludeDetails)
  {
    $this->excludeDetails = $excludeDetails;
  }
  /**
   * @return FilterExpression
   */
  public function getExcludeDetails()
  {
    return $this->excludeDetails;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param FilterExpression
   */
  public function setIncludeDetails(FilterExpression $includeDetails)
  {
    $this->includeDetails = $includeDetails;
  }
  /**
   * @return FilterExpression
   */
  public function getIncludeDetails()
  {
    return $this->includeDetails;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param FilterLowercaseDetails
   */
  public function setLowercaseDetails(FilterLowercaseDetails $lowercaseDetails)
  {
    $this->lowercaseDetails = $lowercaseDetails;
  }
  /**
   * @return FilterLowercaseDetails
   */
  public function getLowercaseDetails()
  {
    return $this->lowercaseDetails;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param FilterParentLink
   */
  public function setParentLink(FilterParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return FilterParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param FilterSearchAndReplaceDetails
   */
  public function setSearchAndReplaceDetails(FilterSearchAndReplaceDetails $searchAndReplaceDetails)
  {
    $this->searchAndReplaceDetails = $searchAndReplaceDetails;
  }
  /**
   * @return FilterSearchAndReplaceDetails
   */
  public function getSearchAndReplaceDetails()
  {
    return $this->searchAndReplaceDetails;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param FilterUppercaseDetails
   */
  public function setUppercaseDetails(FilterUppercaseDetails $uppercaseDetails)
  {
    $this->uppercaseDetails = $uppercaseDetails;
  }
  /**
   * @return FilterUppercaseDetails
   */
  public function getUppercaseDetails()
  {
    return $this->uppercaseDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Filter::class, 'Google_Service_Analytics_Filter');
