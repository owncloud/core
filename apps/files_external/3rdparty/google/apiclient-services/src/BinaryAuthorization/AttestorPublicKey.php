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

namespace Google\Service\BinaryAuthorization;

class AttestorPublicKey extends \Google\Model
{
  /**
   * @var string
   */
  public $asciiArmoredPgpPublicKey;
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $id;
  protected $pkixPublicKeyType = PkixPublicKey::class;
  protected $pkixPublicKeyDataType = '';

  /**
   * @param string
   */
  public function setAsciiArmoredPgpPublicKey($asciiArmoredPgpPublicKey)
  {
    $this->asciiArmoredPgpPublicKey = $asciiArmoredPgpPublicKey;
  }
  /**
   * @return string
   */
  public function getAsciiArmoredPgpPublicKey()
  {
    return $this->asciiArmoredPgpPublicKey;
  }
  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
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
   * @param PkixPublicKey
   */
  public function setPkixPublicKey(PkixPublicKey $pkixPublicKey)
  {
    $this->pkixPublicKey = $pkixPublicKey;
  }
  /**
   * @return PkixPublicKey
   */
  public function getPkixPublicKey()
  {
    return $this->pkixPublicKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttestorPublicKey::class, 'Google_Service_BinaryAuthorization_AttestorPublicKey');
