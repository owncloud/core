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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1PhraseMatchRule extends \Google\Model
{
  protected $configType = GoogleCloudContactcenterinsightsV1PhraseMatchRuleConfig::class;
  protected $configDataType = '';
  /**
   * @var bool
   */
  public $negated;
  /**
   * @var string
   */
  public $query;

  /**
   * @param GoogleCloudContactcenterinsightsV1PhraseMatchRuleConfig
   */
  public function setConfig(GoogleCloudContactcenterinsightsV1PhraseMatchRuleConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1PhraseMatchRuleConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param bool
   */
  public function setNegated($negated)
  {
    $this->negated = $negated;
  }
  /**
   * @return bool
   */
  public function getNegated()
  {
    return $this->negated;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1PhraseMatchRule::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1PhraseMatchRule');
