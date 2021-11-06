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

namespace Google\Service\Gmail;

class MessagePart extends \Google\Collection
{
  protected $collection_key = 'parts';
  protected $bodyType = MessagePartBody::class;
  protected $bodyDataType = '';
  public $filename;
  protected $headersType = MessagePartHeader::class;
  protected $headersDataType = 'array';
  public $mimeType;
  public $partId;
  protected $partsType = MessagePart::class;
  protected $partsDataType = 'array';

  /**
   * @param MessagePartBody
   */
  public function setBody(MessagePartBody $body)
  {
    $this->body = $body;
  }
  /**
   * @return MessagePartBody
   */
  public function getBody()
  {
    return $this->body;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param MessagePartHeader[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return MessagePartHeader[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setPartId($partId)
  {
    $this->partId = $partId;
  }
  public function getPartId()
  {
    return $this->partId;
  }
  /**
   * @param MessagePart[]
   */
  public function setParts($parts)
  {
    $this->parts = $parts;
  }
  /**
   * @return MessagePart[]
   */
  public function getParts()
  {
    return $this->parts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MessagePart::class, 'Google_Service_Gmail_MessagePart');
