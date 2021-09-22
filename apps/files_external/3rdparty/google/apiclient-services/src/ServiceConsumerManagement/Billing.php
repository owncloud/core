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

namespace Google\Service\ServiceConsumerManagement;

class Billing extends \Google\Collection
{
  protected $collection_key = 'consumerDestinations';
  protected $consumerDestinationsType = BillingDestination::class;
  protected $consumerDestinationsDataType = 'array';

  /**
   * @param BillingDestination[]
   */
  public function setConsumerDestinations($consumerDestinations)
  {
    $this->consumerDestinations = $consumerDestinations;
  }
  /**
   * @return BillingDestination[]
   */
  public function getConsumerDestinations()
  {
    return $this->consumerDestinations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Billing::class, 'Google_Service_ServiceConsumerManagement_Billing');
