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

namespace Google\Service\PeopleService;

class ImClient extends \Google\Model
{
  /**
   * @var string
   */
  public $formattedProtocol;
  /**
   * @var string
   */
  public $formattedType;
  protected $metadataType = FieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $username;

  /**
   * @param string
   */
  public function setFormattedProtocol($formattedProtocol)
  {
    $this->formattedProtocol = $formattedProtocol;
  }
  /**
   * @return string
   */
  public function getFormattedProtocol()
  {
    return $this->formattedProtocol;
  }
  /**
   * @param string
   */
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  /**
   * @return string
   */
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  /**
   * @param FieldMetadata
   */
  public function setMetadata(FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImClient::class, 'Google_Service_PeopleService_ImClient');
