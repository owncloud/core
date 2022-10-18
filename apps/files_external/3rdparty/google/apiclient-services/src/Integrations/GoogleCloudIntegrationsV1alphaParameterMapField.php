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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaParameterMapField extends \Google\Model
{
  protected $literalValueType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $literalValueDataType = '';
  /**
   * @var string
   */
  public $referenceKey;

  /**
   * @param GoogleCloudIntegrationsV1alphaValueType
   */
  public function setLiteralValue(GoogleCloudIntegrationsV1alphaValueType $literalValue)
  {
    $this->literalValue = $literalValue;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType
   */
  public function getLiteralValue()
  {
    return $this->literalValue;
  }
  /**
   * @param string
   */
  public function setReferenceKey($referenceKey)
  {
    $this->referenceKey = $referenceKey;
  }
  /**
   * @return string
   */
  public function getReferenceKey()
  {
    return $this->referenceKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaParameterMapField::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaParameterMapField');
