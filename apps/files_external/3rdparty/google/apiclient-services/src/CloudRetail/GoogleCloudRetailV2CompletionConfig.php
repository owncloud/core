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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2CompletionConfig extends \Google\Model
{
  protected $allowlistInputConfigType = GoogleCloudRetailV2CompletionDataInputConfig::class;
  protected $allowlistInputConfigDataType = '';
  /**
   * @var bool
   */
  public $autoLearning;
  protected $denylistInputConfigType = GoogleCloudRetailV2CompletionDataInputConfig::class;
  protected $denylistInputConfigDataType = '';
  /**
   * @var string
   */
  public $lastAllowlistImportOperation;
  /**
   * @var string
   */
  public $lastDenylistImportOperation;
  /**
   * @var string
   */
  public $lastSuggestionsImportOperation;
  /**
   * @var string
   */
  public $matchingOrder;
  /**
   * @var int
   */
  public $maxSuggestions;
  /**
   * @var int
   */
  public $minPrefixLength;
  /**
   * @var string
   */
  public $name;
  protected $suggestionsInputConfigType = GoogleCloudRetailV2CompletionDataInputConfig::class;
  protected $suggestionsInputConfigDataType = '';

  /**
   * @param GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function setAllowlistInputConfig(GoogleCloudRetailV2CompletionDataInputConfig $allowlistInputConfig)
  {
    $this->allowlistInputConfig = $allowlistInputConfig;
  }
  /**
   * @return GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function getAllowlistInputConfig()
  {
    return $this->allowlistInputConfig;
  }
  /**
   * @param bool
   */
  public function setAutoLearning($autoLearning)
  {
    $this->autoLearning = $autoLearning;
  }
  /**
   * @return bool
   */
  public function getAutoLearning()
  {
    return $this->autoLearning;
  }
  /**
   * @param GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function setDenylistInputConfig(GoogleCloudRetailV2CompletionDataInputConfig $denylistInputConfig)
  {
    $this->denylistInputConfig = $denylistInputConfig;
  }
  /**
   * @return GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function getDenylistInputConfig()
  {
    return $this->denylistInputConfig;
  }
  /**
   * @param string
   */
  public function setLastAllowlistImportOperation($lastAllowlistImportOperation)
  {
    $this->lastAllowlistImportOperation = $lastAllowlistImportOperation;
  }
  /**
   * @return string
   */
  public function getLastAllowlistImportOperation()
  {
    return $this->lastAllowlistImportOperation;
  }
  /**
   * @param string
   */
  public function setLastDenylistImportOperation($lastDenylistImportOperation)
  {
    $this->lastDenylistImportOperation = $lastDenylistImportOperation;
  }
  /**
   * @return string
   */
  public function getLastDenylistImportOperation()
  {
    return $this->lastDenylistImportOperation;
  }
  /**
   * @param string
   */
  public function setLastSuggestionsImportOperation($lastSuggestionsImportOperation)
  {
    $this->lastSuggestionsImportOperation = $lastSuggestionsImportOperation;
  }
  /**
   * @return string
   */
  public function getLastSuggestionsImportOperation()
  {
    return $this->lastSuggestionsImportOperation;
  }
  /**
   * @param string
   */
  public function setMatchingOrder($matchingOrder)
  {
    $this->matchingOrder = $matchingOrder;
  }
  /**
   * @return string
   */
  public function getMatchingOrder()
  {
    return $this->matchingOrder;
  }
  /**
   * @param int
   */
  public function setMaxSuggestions($maxSuggestions)
  {
    $this->maxSuggestions = $maxSuggestions;
  }
  /**
   * @return int
   */
  public function getMaxSuggestions()
  {
    return $this->maxSuggestions;
  }
  /**
   * @param int
   */
  public function setMinPrefixLength($minPrefixLength)
  {
    $this->minPrefixLength = $minPrefixLength;
  }
  /**
   * @return int
   */
  public function getMinPrefixLength()
  {
    return $this->minPrefixLength;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function setSuggestionsInputConfig(GoogleCloudRetailV2CompletionDataInputConfig $suggestionsInputConfig)
  {
    $this->suggestionsInputConfig = $suggestionsInputConfig;
  }
  /**
   * @return GoogleCloudRetailV2CompletionDataInputConfig
   */
  public function getSuggestionsInputConfig()
  {
    return $this->suggestionsInputConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CompletionConfig::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CompletionConfig');
