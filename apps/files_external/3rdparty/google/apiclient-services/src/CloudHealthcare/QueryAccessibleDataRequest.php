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

class QueryAccessibleDataRequest extends \Google\Model
{
  protected $gcsDestinationType = GoogleCloudHealthcareV1ConsentGcsDestination::class;
  protected $gcsDestinationDataType = '';
  public $requestAttributes;
  public $resourceAttributes;

  /**
   * @param GoogleCloudHealthcareV1ConsentGcsDestination
   */
  public function setGcsDestination(GoogleCloudHealthcareV1ConsentGcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return GoogleCloudHealthcareV1ConsentGcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
  public function setRequestAttributes($requestAttributes)
  {
    $this->requestAttributes = $requestAttributes;
  }
  public function getRequestAttributes()
  {
    return $this->requestAttributes;
  }
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryAccessibleDataRequest::class, 'Google_Service_CloudHealthcare_QueryAccessibleDataRequest');
