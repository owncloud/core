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

namespace Google\Service\CloudSupport;

class Comment extends \Google\Model
{
  /**
   * @var string
   */
  public $body;
  /**
   * @var string
   */
  public $createTime;
  protected $creatorType = Actor::class;
  protected $creatorDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $plainTextBody;

  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Actor
   */
  public function setCreator(Actor $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return Actor
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPlainTextBody($plainTextBody)
  {
    $this->plainTextBody = $plainTextBody;
  }
  /**
   * @return string
   */
  public function getPlainTextBody()
  {
    return $this->plainTextBody;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Comment::class, 'Google_Service_CloudSupport_Comment');
