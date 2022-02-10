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

namespace Google\Service\IdentityToolkit;

class IdentitytoolkitRelyingpartyUploadAccountRequest extends \Google\Collection
{
  protected $collection_key = 'users';
  /**
   * @var bool
   */
  public $allowOverwrite;
  /**
   * @var int
   */
  public $blockSize;
  /**
   * @var int
   */
  public $cpuMemCost;
  /**
   * @var string
   */
  public $delegatedProjectNumber;
  /**
   * @var int
   */
  public $dkLen;
  /**
   * @var string
   */
  public $hashAlgorithm;
  /**
   * @var int
   */
  public $memoryCost;
  /**
   * @var int
   */
  public $parallelization;
  /**
   * @var int
   */
  public $rounds;
  /**
   * @var string
   */
  public $saltSeparator;
  /**
   * @var bool
   */
  public $sanityCheck;
  /**
   * @var string
   */
  public $signerKey;
  /**
   * @var string
   */
  public $targetProjectId;
  protected $usersType = UserInfo::class;
  protected $usersDataType = 'array';

  /**
   * @param bool
   */
  public function setAllowOverwrite($allowOverwrite)
  {
    $this->allowOverwrite = $allowOverwrite;
  }
  /**
   * @return bool
   */
  public function getAllowOverwrite()
  {
    return $this->allowOverwrite;
  }
  /**
   * @param int
   */
  public function setBlockSize($blockSize)
  {
    $this->blockSize = $blockSize;
  }
  /**
   * @return int
   */
  public function getBlockSize()
  {
    return $this->blockSize;
  }
  /**
   * @param int
   */
  public function setCpuMemCost($cpuMemCost)
  {
    $this->cpuMemCost = $cpuMemCost;
  }
  /**
   * @return int
   */
  public function getCpuMemCost()
  {
    return $this->cpuMemCost;
  }
  /**
   * @param string
   */
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  /**
   * @return string
   */
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  /**
   * @param int
   */
  public function setDkLen($dkLen)
  {
    $this->dkLen = $dkLen;
  }
  /**
   * @return int
   */
  public function getDkLen()
  {
    return $this->dkLen;
  }
  /**
   * @param string
   */
  public function setHashAlgorithm($hashAlgorithm)
  {
    $this->hashAlgorithm = $hashAlgorithm;
  }
  /**
   * @return string
   */
  public function getHashAlgorithm()
  {
    return $this->hashAlgorithm;
  }
  /**
   * @param int
   */
  public function setMemoryCost($memoryCost)
  {
    $this->memoryCost = $memoryCost;
  }
  /**
   * @return int
   */
  public function getMemoryCost()
  {
    return $this->memoryCost;
  }
  /**
   * @param int
   */
  public function setParallelization($parallelization)
  {
    $this->parallelization = $parallelization;
  }
  /**
   * @return int
   */
  public function getParallelization()
  {
    return $this->parallelization;
  }
  /**
   * @param int
   */
  public function setRounds($rounds)
  {
    $this->rounds = $rounds;
  }
  /**
   * @return int
   */
  public function getRounds()
  {
    return $this->rounds;
  }
  /**
   * @param string
   */
  public function setSaltSeparator($saltSeparator)
  {
    $this->saltSeparator = $saltSeparator;
  }
  /**
   * @return string
   */
  public function getSaltSeparator()
  {
    return $this->saltSeparator;
  }
  /**
   * @param bool
   */
  public function setSanityCheck($sanityCheck)
  {
    $this->sanityCheck = $sanityCheck;
  }
  /**
   * @return bool
   */
  public function getSanityCheck()
  {
    return $this->sanityCheck;
  }
  /**
   * @param string
   */
  public function setSignerKey($signerKey)
  {
    $this->signerKey = $signerKey;
  }
  /**
   * @return string
   */
  public function getSignerKey()
  {
    return $this->signerKey;
  }
  /**
   * @param string
   */
  public function setTargetProjectId($targetProjectId)
  {
    $this->targetProjectId = $targetProjectId;
  }
  /**
   * @return string
   */
  public function getTargetProjectId()
  {
    return $this->targetProjectId;
  }
  /**
   * @param UserInfo[]
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return UserInfo[]
   */
  public function getUsers()
  {
    return $this->users;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartyUploadAccountRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest');
