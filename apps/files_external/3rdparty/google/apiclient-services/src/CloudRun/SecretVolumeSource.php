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

namespace Google\Service\CloudRun;

class SecretVolumeSource extends \Google\Collection
{
  protected $collection_key = 'items';
  public $defaultMode;
  protected $itemsType = KeyToPath::class;
  protected $itemsDataType = 'array';
  public $optional;
  public $secretName;

  public function setDefaultMode($defaultMode)
  {
    $this->defaultMode = $defaultMode;
  }
  public function getDefaultMode()
  {
    return $this->defaultMode;
  }
  /**
   * @param KeyToPath[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return KeyToPath[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setOptional($optional)
  {
    $this->optional = $optional;
  }
  public function getOptional()
  {
    return $this->optional;
  }
  public function setSecretName($secretName)
  {
    $this->secretName = $secretName;
  }
  public function getSecretName()
  {
    return $this->secretName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecretVolumeSource::class, 'Google_Service_CloudRun_SecretVolumeSource');
