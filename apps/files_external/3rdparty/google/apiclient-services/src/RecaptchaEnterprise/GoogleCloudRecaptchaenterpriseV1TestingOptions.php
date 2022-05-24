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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1TestingOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $testingChallenge;
  /**
   * @var float
   */
  public $testingScore;

  /**
   * @param string
   */
  public function setTestingChallenge($testingChallenge)
  {
    $this->testingChallenge = $testingChallenge;
  }
  /**
   * @return string
   */
  public function getTestingChallenge()
  {
    return $this->testingChallenge;
  }
  /**
   * @param float
   */
  public function setTestingScore($testingScore)
  {
    $this->testingScore = $testingScore;
  }
  /**
   * @return float
   */
  public function getTestingScore()
  {
    return $this->testingScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1TestingOptions::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TestingOptions');
