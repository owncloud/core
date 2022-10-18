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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyV1DefineCertificateRequest extends \Google\Collection
{
  protected $collection_key = 'settings';
  /**
   * @var string
   */
  public $ceritificateName;
  /**
   * @var string
   */
  public $certificate;
  protected $settingsType = GoogleChromePolicyV1NetworkSetting::class;
  protected $settingsDataType = 'array';
  /**
   * @var string
   */
  public $targetResource;

  /**
   * @param string
   */
  public function setCeritificateName($ceritificateName)
  {
    $this->ceritificateName = $ceritificateName;
  }
  /**
   * @return string
   */
  public function getCeritificateName()
  {
    return $this->ceritificateName;
  }
  /**
   * @param string
   */
  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return string
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param GoogleChromePolicyV1NetworkSetting[]
   */
  public function setSettings($settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return GoogleChromePolicyV1NetworkSetting[]
   */
  public function getSettings()
  {
    return $this->settings;
  }
  /**
   * @param string
   */
  public function setTargetResource($targetResource)
  {
    $this->targetResource = $targetResource;
  }
  /**
   * @return string
   */
  public function getTargetResource()
  {
    return $this->targetResource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1DefineCertificateRequest::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1DefineCertificateRequest');
