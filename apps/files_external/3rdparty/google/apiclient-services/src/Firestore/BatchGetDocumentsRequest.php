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

class BatchGetDocumentsRequest extends \Google\Collection
{
  protected $collection_key = 'documents';
  /**
   * @var string[]
   */
  public $documents;
  protected $maskType = DocumentMask::class;
  protected $maskDataType = '';
  protected $newTransactionType = TransactionOptions::class;
  protected $newTransactionDataType = '';
  /**
   * @var string
   */
  public $readTime;
  /**
   * @var string
   */
  public $transaction;

  /**
   * @param string[]
   */
  public function setDocuments($documents)
  {
    $this->documents = $documents;
  }
  /**
   * @return string[]
   */
  public function getDocuments()
  {
    return $this->documents;
  }
  /**
   * @param DocumentMask
   */
  public function setMask(DocumentMask $mask)
  {
    $this->mask = $mask;
  }
  /**
   * @return DocumentMask
   */
  public function getMask()
  {
    return $this->mask;
  }
  /**
   * @param TransactionOptions
   */
  public function setNewTransaction(TransactionOptions $newTransaction)
  {
    $this->newTransaction = $newTransaction;
  }
  /**
   * @return TransactionOptions
   */
  public function getNewTransaction()
  {
    return $this->newTransaction;
  }
  /**
   * @param string
   */
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  /**
   * @return string
   */
  public function getReadTime()
  {
    return $this->readTime;
  }
  /**
   * @param string
   */
  public function setTransaction($transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return string
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchGetDocumentsRequest::class, 'Google_Service_Firestore_BatchGetDocumentsRequest');
