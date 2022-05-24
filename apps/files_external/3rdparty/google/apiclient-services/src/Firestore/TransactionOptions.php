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

namespace Google\Service\Firestore;

class TransactionOptions extends \Google\Model
{
  protected $readOnlyType = FirestoreReadOnly::class;
  protected $readOnlyDataType = '';
  protected $readWriteType = ReadWrite::class;
  protected $readWriteDataType = '';

  /**
   * @param FirestoreReadOnly
   */
  public function setReadOnly(FirestoreReadOnly $readOnly)
  {
    $this->readOnly = $readOnly;
  }
  /**
   * @return FirestoreReadOnly
   */
  public function getReadOnly()
  {
    return $this->readOnly;
  }
  /**
   * @param ReadWrite
   */
  public function setReadWrite(ReadWrite $readWrite)
  {
    $this->readWrite = $readWrite;
  }
  /**
   * @return ReadWrite
   */
  public function getReadWrite()
  {
    return $this->readWrite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransactionOptions::class, 'Google_Service_Firestore_TransactionOptions');
