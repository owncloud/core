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

class Google_Service_CloudTalentSolution_CustomAttributeHistogramRequest extends Google_Model
{
  public $key;
  protected $longValueHistogramBucketingOptionType = 'Google_Service_CloudTalentSolution_NumericBucketingOption';
  protected $longValueHistogramBucketingOptionDataType = '';
  public $stringValueHistogram;

  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_CloudTalentSolution_NumericBucketingOption
   */
  public function setLongValueHistogramBucketingOption(Google_Service_CloudTalentSolution_NumericBucketingOption $longValueHistogramBucketingOption)
  {
    $this->longValueHistogramBucketingOption = $longValueHistogramBucketingOption;
  }
  /**
   * @return Google_Service_CloudTalentSolution_NumericBucketingOption
   */
  public function getLongValueHistogramBucketingOption()
  {
    return $this->longValueHistogramBucketingOption;
  }
  public function setStringValueHistogram($stringValueHistogram)
  {
    $this->stringValueHistogram = $stringValueHistogram;
  }
  public function getStringValueHistogram()
  {
    return $this->stringValueHistogram;
  }
}
