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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $lastMatchedIntent;
  protected $parametersType = GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfoIntentParameterValue::class;
  protected $parametersDataType = 'map';

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setLastMatchedIntent($lastMatchedIntent)
  {
    $this->lastMatchedIntent = $lastMatchedIntent;
  }
  /**
   * @return string
   */
  public function getLastMatchedIntent()
  {
    return $this->lastMatchedIntent;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfoIntentParameterValue[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfoIntentParameterValue[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfo::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1WebhookRequestIntentInfo');
