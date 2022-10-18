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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaAudienceFilterClause extends \Google\Model
{
  /**
   * @var string
   */
  public $clauseType;
  protected $sequenceFilterType = GoogleAnalyticsAdminV1alphaAudienceSequenceFilter::class;
  protected $sequenceFilterDataType = '';
  protected $simpleFilterType = GoogleAnalyticsAdminV1alphaAudienceSimpleFilter::class;
  protected $simpleFilterDataType = '';

  /**
   * @param string
   */
  public function setClauseType($clauseType)
  {
    $this->clauseType = $clauseType;
  }
  /**
   * @return string
   */
  public function getClauseType()
  {
    return $this->clauseType;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceSequenceFilter
   */
  public function setSequenceFilter(GoogleAnalyticsAdminV1alphaAudienceSequenceFilter $sequenceFilter)
  {
    $this->sequenceFilter = $sequenceFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceSequenceFilter
   */
  public function getSequenceFilter()
  {
    return $this->sequenceFilter;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceSimpleFilter
   */
  public function setSimpleFilter(GoogleAnalyticsAdminV1alphaAudienceSimpleFilter $simpleFilter)
  {
    $this->simpleFilter = $simpleFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceSimpleFilter
   */
  public function getSimpleFilter()
  {
    return $this->simpleFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAudienceFilterClause::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAudienceFilterClause');
