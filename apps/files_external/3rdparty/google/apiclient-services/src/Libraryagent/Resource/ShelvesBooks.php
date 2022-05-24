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

namespace Google\Service\Libraryagent\Resource;

use Google\Service\Libraryagent\GoogleExampleLibraryagentV1Book;
use Google\Service\Libraryagent\GoogleExampleLibraryagentV1ListBooksResponse;

/**
 * The "books" collection of methods.
 * Typical usage is:
 *  <code>
 *   $libraryagentService = new Google\Service\Libraryagent(...);
 *   $books = $libraryagentService->books;
 *  </code>
 */
class ShelvesBooks extends \Google\Service\Resource
{
  /**
   * Borrow a book from the library. Returns the book if it is borrowed
   * successfully. Returns NOT_FOUND if the book does not exist in the library.
   * Returns quota exceeded error if the amount of books borrowed exceeds
   * allocation quota in any dimensions. (books.borrow)
   *
   * @param string $name Required. The name of the book to borrow.
   * @param array $optParams Optional parameters.
   * @return GoogleExampleLibraryagentV1Book
   */
  public function borrow($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('borrow', [$params], GoogleExampleLibraryagentV1Book::class);
  }
  /**
   * Gets a book. Returns NOT_FOUND if the book does not exist. (books.get)
   *
   * @param string $name Required. The name of the book to retrieve.
   * @param array $optParams Optional parameters.
   * @return GoogleExampleLibraryagentV1Book
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleExampleLibraryagentV1Book::class);
  }
  /**
   * Lists books in a shelf. The order is unspecified but deterministic. Newly
   * created books will not necessarily be added to the end of this list. Returns
   * NOT_FOUND if the shelf does not exist. (books.listShelvesBooks)
   *
   * @param string $parent Required. The name of the shelf whose books we'd like
   * to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Server may return fewer books
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListBooksResponse.next_page_token. returned from the previous call to
   * `ListBooks` method.
   * @return GoogleExampleLibraryagentV1ListBooksResponse
   */
  public function listShelvesBooks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleExampleLibraryagentV1ListBooksResponse::class);
  }
  /**
   * Return a book to the library. Returns the book if it is returned to the
   * library successfully. Returns error if the book does not belong to the
   * library or the users didn't borrow before. (books.returnShelvesBooks)
   *
   * @param string $name Required. The name of the book to return.
   * @param array $optParams Optional parameters.
   * @return GoogleExampleLibraryagentV1Book
   */
  public function returnShelvesBooks($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('return', [$params], GoogleExampleLibraryagentV1Book::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShelvesBooks::class, 'Google_Service_Libraryagent_Resource_ShelvesBooks');
