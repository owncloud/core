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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Bookshelf;
use Google\Service\Books\Bookshelves as BookshelvesModel;

/**
 * The "bookshelves" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $bookshelves = $booksService->bookshelves;
 *  </code>
 */
class Bookshelves extends \Google\Service\Resource
{
  /**
   * Retrieves metadata for a specific bookshelf for the specified user.
   * (bookshelves.get)
   *
   * @param string $userId ID of user for whom to retrieve bookshelves.
   * @param string $shelf ID of bookshelf to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Bookshelf
   */
  public function get($userId, $shelf, $optParams = [])
  {
    $params = ['userId' => $userId, 'shelf' => $shelf];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Bookshelf::class);
  }
  /**
   * Retrieves a list of public bookshelves for the specified user.
   * (bookshelves.listBookshelves)
   *
   * @param string $userId ID of user for whom to retrieve bookshelves.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return BookshelvesModel
   */
  public function listBookshelves($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BookshelvesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Bookshelves::class, 'Google_Service_Books_Resource_Bookshelves');
