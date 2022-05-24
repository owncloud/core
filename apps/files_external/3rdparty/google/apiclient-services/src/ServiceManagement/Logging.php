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

namespace Google\Service\ServiceManagement;

class Logging extends \Google\Collection
{
  protected $collection_key = 'producerDestinations';
  protected $consumerDestinationsType = LoggingDestination::class;
  protected $consumerDestinationsDataType = 'array';
  protected $producerDestinationsType = LoggingDestination::class;
  protected $producerDestinationsDataType = 'array';

  /**
   * @param LoggingDestination[]
   */
  public function setConsumerDestinations($consumerDestinations)
  {
    $this->consumerDestinations = $consumerDestinations;
  }
  /**
   * @return LoggingDestination[]
   */
  public function getConsumerDestinations()
  {
    return $this->consumerDestinations;
  }
  /**
   * @param LoggingDestination[]
   */
  public function setProducerDestinations($producerDestinations)
  {
    $this->producerDestinations = $producerDestinations;
  }
  /**
   * @return LoggingDestination[]
   */
  public function getProducerDestinations()
  {
    return $this->producerDestinations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Logging::class, 'Google_Service_ServiceManagement_Logging');
