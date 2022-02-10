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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2LDiversityEquivalenceClass extends \Google\Collection
{
  protected $collection_key = 'topSensitiveValues';
  /**
   * @var string
   */
  public $equivalenceClassSize;
  /**
   * @var string
   */
  public $numDistinctSensitiveValues;
  protected $quasiIdsValuesType = GooglePrivacyDlpV2Value::class;
  protected $quasiIdsValuesDataType = 'array';
  protected $topSensitiveValuesType = GooglePrivacyDlpV2ValueFrequency::class;
  protected $topSensitiveValuesDataType = 'array';

  /**
   * @param string
   */
  public function setEquivalenceClassSize($equivalenceClassSize)
  {
    $this->equivalenceClassSize = $equivalenceClassSize;
  }
  /**
   * @return string
   */
  public function getEquivalenceClassSize()
  {
    return $this->equivalenceClassSize;
  }
  /**
   * @param string
   */
  public function setNumDistinctSensitiveValues($numDistinctSensitiveValues)
  {
    $this->numDistinctSensitiveValues = $numDistinctSensitiveValues;
  }
  /**
   * @return string
   */
  public function getNumDistinctSensitiveValues()
  {
    return $this->numDistinctSensitiveValues;
  }
  /**
   * @param GooglePrivacyDlpV2Value[]
   */
  public function setQuasiIdsValues($quasiIdsValues)
  {
    $this->quasiIdsValues = $quasiIdsValues;
  }
  /**
   * @return GooglePrivacyDlpV2Value[]
   */
  public function getQuasiIdsValues()
  {
    return $this->quasiIdsValues;
  }
  /**
   * @param GooglePrivacyDlpV2ValueFrequency[]
   */
  public function setTopSensitiveValues($topSensitiveValues)
  {
    $this->topSensitiveValues = $topSensitiveValues;
  }
  /**
   * @return GooglePrivacyDlpV2ValueFrequency[]
   */
  public function getTopSensitiveValues()
  {
    return $this->topSensitiveValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2LDiversityEquivalenceClass::class, 'Google_Service_DLP_GooglePrivacyDlpV2LDiversityEquivalenceClass');
