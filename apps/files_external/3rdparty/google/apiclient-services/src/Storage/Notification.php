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

namespace Google\Service\Storage;

class Notification extends \Google\Collection
{
  protected $collection_key = 'event_types';
  protected $internal_gapi_mappings = [
        "customAttributes" => "custom_attributes",
        "eventTypes" => "event_types",
        "objectNamePrefix" => "object_name_prefix",
        "payloadFormat" => "payload_format",
  ];
  /**
   * @var string[]
   */
  public $customAttributes;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string[]
   */
  public $eventTypes;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $objectNamePrefix;
  /**
   * @var string
   */
  public $payloadFormat;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $topic;

  /**
   * @param string[]
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return string[]
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string[]
   */
  public function setEventTypes($eventTypes)
  {
    $this->eventTypes = $eventTypes;
  }
  /**
   * @return string[]
   */
  public function getEventTypes()
  {
    return $this->eventTypes;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setObjectNamePrefix($objectNamePrefix)
  {
    $this->objectNamePrefix = $objectNamePrefix;
  }
  /**
   * @return string
   */
  public function getObjectNamePrefix()
  {
    return $this->objectNamePrefix;
  }
  /**
   * @param string
   */
  public function setPayloadFormat($payloadFormat)
  {
    $this->payloadFormat = $payloadFormat;
  }
  /**
   * @return string
   */
  public function getPayloadFormat()
  {
    return $this->payloadFormat;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return string
   */
  public function getTopic()
  {
    return $this->topic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notification::class, 'Google_Service_Storage_Notification');
