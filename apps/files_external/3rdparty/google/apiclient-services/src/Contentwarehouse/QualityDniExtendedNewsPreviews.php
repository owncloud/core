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

class QualityDniExtendedNewsPreviews extends \Google\Collection
{
  protected $collection_key = 'desnippetedCountryCode';
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string[]
   */
  public $desnippetedCountryCode;
  /**
   * @var string
   */
  public $policyCriteriaBase64;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string[]
   */
  public function setDesnippetedCountryCode($desnippetedCountryCode)
  {
    $this->desnippetedCountryCode = $desnippetedCountryCode;
  }
  /**
   * @return string[]
   */
  public function getDesnippetedCountryCode()
  {
    return $this->desnippetedCountryCode;
  }
  /**
   * @param string
   */
  public function setPolicyCriteriaBase64($policyCriteriaBase64)
  {
    $this->policyCriteriaBase64 = $policyCriteriaBase64;
  }
  /**
   * @return string
   */
  public function getPolicyCriteriaBase64()
  {
    return $this->policyCriteriaBase64;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityDniExtendedNewsPreviews::class, 'Google_Service_Contentwarehouse_QualityDniExtendedNewsPreviews');
