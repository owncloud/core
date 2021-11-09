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

namespace Google\Service\Datastream;

class DestinationConfig extends \Google\Model
{
  public $destinationConnectionProfileName;
  protected $gcsDestinationConfigType = GcsDestinationConfig::class;
  protected $gcsDestinationConfigDataType = '';

  public function setDestinationConnectionProfileName($destinationConnectionProfileName)
  {
    $this->destinationConnectionProfileName = $destinationConnectionProfileName;
  }
  public function getDestinationConnectionProfileName()
  {
    return $this->destinationConnectionProfileName;
  }
  /**
   * @param GcsDestinationConfig
   */
  public function setGcsDestinationConfig(GcsDestinationConfig $gcsDestinationConfig)
  {
    $this->gcsDestinationConfig = $gcsDestinationConfig;
  }
  /**
   * @return GcsDestinationConfig
   */
  public function getGcsDestinationConfig()
  {
    return $this->gcsDestinationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DestinationConfig::class, 'Google_Service_Datastream_DestinationConfig');
