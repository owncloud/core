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

namespace Google\Service\CloudHealthcare;

class ValidationConfig extends \Google\Collection
{
  protected $collection_key = 'enabledImplementationGuides';
  /**
   * @var bool
   */
  public $disableFhirpathValidation;
  /**
   * @var bool
   */
  public $disableProfileValidation;
  /**
   * @var bool
   */
  public $disableReferenceTypeValidation;
  /**
   * @var bool
   */
  public $disableRequiredFieldValidation;
  /**
   * @var string[]
   */
  public $enabledImplementationGuides;

  /**
   * @param bool
   */
  public function setDisableFhirpathValidation($disableFhirpathValidation)
  {
    $this->disableFhirpathValidation = $disableFhirpathValidation;
  }
  /**
   * @return bool
   */
  public function getDisableFhirpathValidation()
  {
    return $this->disableFhirpathValidation;
  }
  /**
   * @param bool
   */
  public function setDisableProfileValidation($disableProfileValidation)
  {
    $this->disableProfileValidation = $disableProfileValidation;
  }
  /**
   * @return bool
   */
  public function getDisableProfileValidation()
  {
    return $this->disableProfileValidation;
  }
  /**
   * @param bool
   */
  public function setDisableReferenceTypeValidation($disableReferenceTypeValidation)
  {
    $this->disableReferenceTypeValidation = $disableReferenceTypeValidation;
  }
  /**
   * @return bool
   */
  public function getDisableReferenceTypeValidation()
  {
    return $this->disableReferenceTypeValidation;
  }
  /**
   * @param bool
   */
  public function setDisableRequiredFieldValidation($disableRequiredFieldValidation)
  {
    $this->disableRequiredFieldValidation = $disableRequiredFieldValidation;
  }
  /**
   * @return bool
   */
  public function getDisableRequiredFieldValidation()
  {
    return $this->disableRequiredFieldValidation;
  }
  /**
   * @param string[]
   */
  public function setEnabledImplementationGuides($enabledImplementationGuides)
  {
    $this->enabledImplementationGuides = $enabledImplementationGuides;
  }
  /**
   * @return string[]
   */
  public function getEnabledImplementationGuides()
  {
    return $this->enabledImplementationGuides;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValidationConfig::class, 'Google_Service_CloudHealthcare_ValidationConfig');
